<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function inventory()
    {
        $barangs = Barang::all();
        $stokTipis = Barang::where('stok', '<=', 5)->count();
        $terlaris = Barang::first(); 

        return view('barang.inventory', compact('barangs', 'stokTipis', 'terlaris'));
    }
    public function akun()
{
    // Mengambil semua data barang untuk hitung keuntungan
    $barangs = \App\Models\Barang::all();

    // Logika hitung: (Harga Jual - Harga Beli) x Stok yang ada
    $keuntungan = $barangs->sum(function($item) {
        return ($item->harga_jual - $item->harga_beli) * $item->stok;
    });

    // Menampilkan halaman akun sambil membawa data keuntungan
    return view('barang.akun', compact('keuntungan'));
}

    // CREATE: Simpan Barang Baru
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
        return redirect('/inventory')->with('success', 'Barang Berhasil Ditambah!');
    }

    // UPDATE: Form Edit & Simpan Perubahan
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
            // Hapus foto lama biar folder storage gak penuh
            if ($barang->foto) {
                Storage::disk('public')->delete('barangs/' . $barang->foto);
            }
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('barangs', $nama_foto, 'public');
            $barang->foto = $nama_foto;
        }

        $barang->save();
        return redirect('/inventory')->with('success', 'Data Berhasil Diubah!');
    }

    // DELETE: Hapus Barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        if ($barang->foto) {
            Storage::disk('public')->delete('barangs/' . $barang->foto);
        }
        $barang->delete();
        return redirect('/inventory')->with('success', 'Barang Berhasil Dihapus!');
    }
   public function kasir()
{
    $barangs = Barang::where('stok', '>', 0)->get(); // Cuma munculin barang yang ada stoknya
    return view('barang.kasir', compact('barangs'));
}

public function prosesJual(Request $request)
{
    $barang = Barang::findOrFail($request->barang_id);
    $jumlah = $request->jumlah;

    if ($barang->stok >= $jumlah) {
        $barang->stok -= $jumlah;
        $barang->save();
        return redirect('/inventory')->with('success', "Berhasil! $jumlah pcs $barang->nama_barang telah terjual.");
    }

    return redirect()->back()->with('error', 'Stok tidak mencukupi!');
}
public function dashboard() {
    $totalBarang = \App\Models\Barang::count();
    $stokKritis = \App\Models\Barang::where('stok', '<=', 5)->count();
    $totalStok = \App\Models\Barang::sum('stok');
    
    return view('barang.dashboard', compact('totalBarang', 'stokKritis', 'totalStok'));
}
}