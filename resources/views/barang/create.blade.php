@extends('layouts.app')

@section('title', 'Akun - Warung Cece')

@section('content')
    {{-- HEADER --}}

    <div class="max-w-md w-full bg-white p-8 rounded-[40px] shadow-sm">
        <h2 class="text-2xl font-black text-gray-800 mb-6 text-center">Tambah Stok Baru</h2>
        
        <form action="/simpan-barang" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div>
                <label class="text-xs font-bold text-gray-400 uppercase">Nama Produk</label>
                <input type="text" name="nama_barang" class="w-full p-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#B2D2A4]" placeholder="Contoh: Chitato Sapi Panggang" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase">Harga Beli</label>
                    <input type="number" name="harga_beli" class="w-full p-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-red-100" placeholder="7500" required>
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase">Harga Jual</label>
                    <input type="number" name="harga_jual" class="w-full p-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-green-100" placeholder="10000" required>
                </div>
            </div>

            <div>
                <label class="text-xs font-bold text-gray-400 uppercase">Jumlah Stok</label>
                <input type="number" name="stok" class="w-full p-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-[#B2D2A4]" placeholder="50" required>
            </div>

            <div>
                <label class="text-xs font-bold text-gray-400 uppercase">Foto Produk</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-2xl bg-gray-50">
                    <input type="file" name="foto" class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#B2D2A4] file:text-gray-700 hover:file:bg-opacity-80" accept="image/*">
                </div>
            </div>

            <button type="submit" class="w-full bg-[#B2D2A4] text-gray-800 font-bold p-4 rounded-2xl shadow-lg hover:bg-opacity-80 transition mt-4">
                Simpan 
            </button>
            <a href="/inventory" class="block text-center text-xs text-gray-400 mt-2 hover:underline">Batal</a>
        </form>
    </div>
        
        
    </div>
</body>
</html>