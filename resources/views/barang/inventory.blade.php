@extends('layouts.app')

@section('title', 'Akun - Warung Cece')

@section('content')
    {{-- HEADER --}}

    <div class="px-6 pt-10 pb-8 flex justify-between items-center">
        <div>
            <h3 class="font-extrabold text-3xl text-[#4F6F52]">Persediaan</h3>
            <p class="text-xs text-[#739072] font-semibold">Warung Cece Management</p>
        </div>
        <a href="/tambah-barang" class="bg-[#B2D2A4] text-white px-6 py-3 rounded-2xl font-bold shadow-md hover:bg-[#86A789] transition-all">
            + TAMBAH
        </a>
    </div>
    <div class="px-6 mb-6">
    <form action="/inventory" method="GET" class="relative">
        <input type="text" 
               name="search" 
               value="{{ request('search') }}"
               placeholder="Cari Pop Mie, Chitato..." 
               class="w-full bg-white border border-[#E1E6D1] py-3 px-12 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#86A789] text-sm font-medium transition-all">
        
        <div class="absolute left-4 top-1/2 -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#739072]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        @if(request('search'))
            <a href="/inventory" class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-red-400 font-bold hover:text-red-600">RESET</a>
        @endif
    </form>
</div>

    <div class="px-4 grid grid-cols-3 md:grid-cols-5 gap-3">
        @foreach($barangs as $barang)
        <div class="bg-white rounded-[24px] shadow-sm overflow-hidden border border-[#E1E6D1] flex flex-col relative transition-transform hover:scale-95">
            
            <div class="absolute top-2 left-2 z-10">
                @if($barang->stok <= 5)
                    <span class="bg-red-500 text-white text-[7px] px-1.5 py-0.5 rounded-full font-black">!</span>
                @else
                    <span class="bg-[#4F6F52] text-white text-[7px] px-1.5 py-0.5 rounded-full font-black">✓</span>
                @endif
            </div>

            <div class="w-full aspect-square bg-[#F9FBE7] flex items-center justify-center overflow-hidden border-b border-[#E1E6D1]">
                @if($barang->foto)
                    <img src="{{ asset('storage/barangs/' . $barang->foto) }}" class="w-full h-full object-contain p-2">
                @else
                    <span class="text-[8px] text-[#B2D2A4] font-black">N/A</span>
                @endif
            </div>

            <div class="p-2 flex flex-col flex-grow">
                <h4 class="font-bold text-[#4F6F52] text-[10px] truncate">{{ $barang->nama_barang }}</h4>
                <p class="text-[9px] font-black text-[#739072]">Rp{{ number_format($barang->harga_jual, 0, ',', '.') }}</p>
                <p class="text-[8px] text-gray-400">Stok: {{ $barang->stok }}</p>

                <div class="flex space-x-1 mt-2">
                    <a href="/edit-barang/{{ $barang->id }}" 
                       class="flex-1 bg-[#86A789]/10 text-[#4F6F52] py-1 rounded-lg text-[8px] font-black text-center">
                        EDIT
                    </a>
                    <a href="/hapus-barang/{{ $barang->id }}" 
                       onclick="return confirm('Hapus?')"
                       class="flex-1 bg-red-50 text-red-600 py-1 rounded-lg text-[8px] font-black text-center border border-red-50">
                        DEL
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-sm bg-white h-20 rounded-[35px] shadow-[0_20px_50px_rgba(0,0,0,0.1)] flex justify-around items-center border border-gray-100 z-50 px-4">
        <a href="/" class="flex flex-col items-center transition-all duration-300 {{ Request::is('/') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
            <span class="text-2xl">🏠</span>
        </a>
        <a href="/inventory" class="flex flex-col items-center transition-all duration-300 {{ Request::is('inventory*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
            <span class="text-2xl">🛍️</span>
        </a>
        <a href="/kasir" class="flex flex-col items-center transition-all duration-300 {{ Request::is('kasir*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
            <span class="text-2xl">🛒</span>
        </a>
        <a href="/laporan" class="flex flex-col items-center transition-all duration-300 {{ Request::is('laporan*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
            <span class="text-2xl">📊</span>
        </a>
        <a href="/akun" class="flex flex-col items-center transition-all duration-300 {{ Request::is('akun*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
            <span class="text-2xl">👤</span>
        </a>
    </div>

</body>
</html>