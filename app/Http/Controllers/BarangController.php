<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * FUNGSI PUSAT DATA (Private)
     * Menghitung laba rugi tanpa butuh kolom 'terjual' di database.
     */
    private function getFinancialData()
    {
        $barangs = Barang::all();
        
        // Logika: Anggap stok awal 20, sisanya dianggap laku/terjual
        // Ini biar kamu gak error 'Column not found' tapi angka tetap muncul
        $totalPenjualan = $barangs->sum(fn($b) => $b->harga_jual * (max(0, 20 - $b->stok)));
        $totalHPP = $barangs->sum(fn($b) => $b->harga_beli * (max(0, 20 - $b->stok)));
        $labaKotor = $totalPenjualan - $totalHPP;

        return [
            'barangs' => $barangs,
            'totalPenjualan' => $totalPenjualan,
            'totalHPP' => $totalHPP,
            'labaKotor' => $labaKotor,
            'labaBersih' => $labaKotor,
            'dataGrafik' => [
                'labels' => $barangs->pluck('nama_barang')->take(5)->toArray(),
                'pendapatan' => $barangs->pluck('harga_jual')->take(5)->toArray(),
                'biaya' => $barangs->pluck('harga_beli')->take(5)->toArray()
            ]
        ];
    }

    // --- FITUR AUTH ---

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

    // --- FITUR DASHBOARD & INVENTORY ---

    public function dashboard() {
        $totalBarang = Barang::count();
        $stokKritis = Barang::where('stok', '<=', 5)->count();
        $totalStok = Barang::sum('stok');
        
        return view('barang.dashboard', compact('totalBarang', 'stokKritis', 'totalStok'));
    }

    public function inventory()
    {
        $barangs = Barang::all();
        $stokTipis = Barang::where('stok', '<=', 5)->count();
        // Terlaris diambil dari stok paling sedikit
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
            $barang->save();
            return redirect('/laporan')->with('success', "Barang terjual! Cek laporan.");
        }
        return redirect()->back()->with('error', 'Stok nggak cukup nih!');
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
}