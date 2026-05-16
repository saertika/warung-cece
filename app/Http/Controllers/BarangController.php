<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User; // Ditambahkan untuk proses Register
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Ditambahkan untuk mengacak password keamanan

class BarangController extends Controller
{ 
    /**
     * FUNGSI PUSAT DATA (Private)
     * Menghitung laba rugi tanpa butuh kolom 'terjual' di database.
     */
   private function getFinancialData()
    {
        // Ambil semua barang yang sudah pernah terjual (terjual > 0)
        $barangs = Barang::where('terjual', '>', 0)->get();
        
        // Hitung Total Global untuk ringkasan di bawah
        $totalPenjualan = $barangs->sum(fn($b) => $b->harga_jual * $b->terjual);
        $totalHPP = $barangs->sum(fn($b) => $b->harga_beli * $b->terjual);
        $labaKotor = $totalPenjualan - $totalHPP;

        return [
            'barangs' => $barangs, // Ini penting biar nama produk muncul
            'totalPenjualan' => $totalPenjualan,
            'totalHPP' => $totalHPP,
            'labaKotor' => $labaKotor,
            'labaBersih' => $labaKotor,
            'dataGrafik' => [
                'labels' => $barangs->pluck('nama_barang')->toArray(), // Nama snack buat label bawah
                'pendapatan' => $barangs->map(fn($b) => $b->harga_jual * $b->terjual)->toArray(), // Batang Pendapatan
                'biaya' => $barangs->map(fn($b) => $b->harga_beli * $b->terjual)->toArray() // Batang HPP
            ]
        ];
    }

    // --- FITUR AUTH (LOGIN, LOGOUT, & REGISTER) ---

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Email atau Password salah ya Cece!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Fungsi menampilkan halaman Register akun baru
    public function showRegister() {
        return view('auth.register'); // Mengarah ke resources/views/auth/register.blade.php
    }

    // Fungsi memproses data pendaftaran akun baru
    public function register(Request $request) {
        // 1. Validasi Inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' otomatis cek field password_confirmation
        ]);

        // 2. Simpan Data User Baru ke Database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Otomatis Login setelah berhasil daftar dan lempar ke Dashboard Utama
        Auth::login($user);
        return redirect('/')->with('success', 'Akun Warung Cece berhasil didaftarkan!');
    }

    // --- FITUR DASHBOARD & INVENTORY ---

    public function dashboard() 
    {
        // 1. Hitung total jenis barang
        $totalBarang = Barang::count();

        // 2. Hitung total seluruh stok (penjumlahan kolom stok)
        $totalStok = Barang::sum('stok');

        // 3. Hitung berapa produk yang stoknya kritis (misal <= 5)
        $stokKritis = Barang::where('stok', '<=', 5)->count();
        
        // 4. Ambil data keuangan
        $dataFinance = $this->getFinancialData(); 

        // 5. Kirim SEMUA variabel ke view
        return view('barang.dashboard', compact(
            'totalBarang', 
            'totalStok', 
            'stokKritis', 
            'dataFinance'
        ));
    }

    public function inventory(Request $request)
    {
        $query = Barang::query();

        // 1. Logika Pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $barangs = $query->get();

        // 2. Logika statistik (biar dashboard inventory tetap jalan)
        $stokTipis = Barang::where('stok', '<=', 5)->count();
        
        // Pakai optional (?) biar gak error kalau database masih kosong
        $terlaris = Barang::orderBy('stok', 'asc')->first(); 

        return view('barang.inventory', compact('barangs', 'stokTipis', 'terlaris'));
    }
        
    public function akun()
    {
        $data = $this->getFinancialData();
        $keuntungan = $data['labaKotor']; 
        return view('barang.akun', compact('keuntungan'));
    }

    // --- FITUR KASIR ---

    public function kasir()
    {
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('barang.kasir', compact('barangs'));
    }

    public function prosesJual(Request $request)
    {
        $barang = Barang::findOrFail($request->barang_id);
        $jumlah = $request->jumlah;

        if ($barang->stok >= $jumlah) {
            $barang->stok -= $jumlah;      
            $barang->terjual += $jumlah;   
            $barang->save();
            
            return redirect()->back()->with('success', "Barang {$barang->nama_barang} berhasil dicatat!");
        }
        
        return redirect()->back()->with('error', 'Stok nggak cukup nih!');
    }

    public function prosesJualMassal(Request $request)
    {
        $items = json_decode($request->item_belanja, true);

        foreach ($items as $id => $data) {
            if ($data['qty'] > 0) {
                $barang = Barang::find($id);
                if ($barang && $barang->stok >= $data['qty']) {
                    $barang->stok -= $data['qty'];
                    $barang->terjual += $data['qty'];
                    $barang->save();
                }
            }
        }

        return redirect('/kasir')->with('success', 'Penjualan berhasil dicatat, mantap Ce!');
    }

    // --- FITUR LAPORAN & GRAFIK ---

    public function barangLaku() 
    {
        return view('barang.baranglaku', $this->getFinancialData());
    }

    public function tampilkanGrafik() 
    {
        return view('barang.grafik', $this->getFinancialData());
    }

    // --- FITUR CRUD BARANG ---

    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok = $request->stok;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('barangs', $nama_foto, 'public');
            $barang->foto = $nama_foto;
        }

        $barang->save();
        return redirect('/inventory')->with('success', 'Barang baru berhasil ditambah!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->stok = $request->stok;

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::disk('public')->delete('barangs/' . $barang->foto);
            }
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('barangs', $nama_foto, 'public');
            $barang->foto = $nama_foto;
        }

        $barang->save();
        return redirect('/inventory')->with('success', 'Data barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        if ($barang->foto) {
            Storage::disk('public')->delete('barangs/' . $barang->foto);
        }
        $barang->delete();
        return redirect('/inventory')->with('success', 'Barang sudah dihapus ya!');
    }

    // --- FITUR PROFIL ---

    public function editProfil()
    {
        $user = Auth::user();
        return view('barang.edit_profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/akun')->with('success', 'Profil Berhasil diupdate, Cece!');
    }
}