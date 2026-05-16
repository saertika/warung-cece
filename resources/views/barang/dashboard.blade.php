@extends('layouts.app')

@section('title', 'Akun - Warung Cece')

@section('content')
    {{-- HEADER --}}

    {{-- TOP BAR & PROFIL --}}
    <div class="flex justify-between items-center mb-8 pt-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="text-xl">✨</span>
                <h2 class="text-2xl font-black tracking-tight text-[#4F6F52]">Halo, Cece! 👋</h2>
            </div>
            <p class="text-[#739072] font-black mt-1 uppercase text-[9px] tracking-[0.25em] ml-1">Ringkasan Warung Hari Ini</p>
        </div>
        
        {{-- Tombol Logout Minimalis --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-white text-red-500 w-12 h-12 rounded-2xl hover:bg-red-50 hover:text-red-600 transition-all shadow-sm border border-gray-100 flex items-center justify-center group active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </form>
    </div>

    {{-- KARTU UTAMA RANGKUMAN (GRID SISTEM MODERN) --}}
    <div class="grid grid-cols-2 gap-4">
        
        {{-- Total Produk --}}
        <div class="bg-white p-5 rounded-[28px] shadow-[0_4px_20px_rgba(79,111,82,0.03)] border border-[#E1E6D1]/60 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-[#B2D2A4]/10 rounded-full blur-xl group-hover:scale-150 transition-all"></div>
            <p class="text-[9px] font-black text-[#739072] uppercase tracking-wider">Total Produk</p>
            <div class="flex items-baseline gap-1 mt-2">
                <h4 class="text-4xl font-black text-[#4F6F52] tracking-tight">{{ $totalBarang }}</h4>
                <span class="text-xs font-bold text-[#739072]">Item</span>
            </div>
            <p class="text-[9px] text-[#B2D2A4] font-medium mt-1">Jenis Snack & Barang</p>
        </div>

        {{-- Total Stok --}}
        <div class="bg-white p-5 rounded-[28px] shadow-[0_4px_20px_rgba(79,111,82,0.03)] border border-[#E1E6D1]/60 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-[#4F6F52]/5 rounded-full blur-xl group-hover:scale-150 transition-all"></div>
            <p class="text-[9px] font-black text-[#739072] uppercase tracking-wider">Total Stok</p>
            <div class="flex items-baseline gap-1 mt-2">
                <h4 class="text-4xl font-black text-[#4F6F52] tracking-tight">{{ $totalStok }}</h4>
                <span class="text-xs font-bold text-[#739072]">Pcs</span>
            </div>
            <p class="text-[9px] text-[#B2D2A4] font-medium mt-1">Stok Siap Jual</p>
        </div>

        {{-- Estimasi Keuntungan Finansial (Menggunakan dataFinance dari private function kamu) --}}
        <div class="col-span-2 bg-gradient-to-br from-[#4F6F52] to-[#3A533C] p-6 rounded-[32px] shadow-lg shadow-[#4F6F52]/10 text-white relative overflow-hidden">
            <div class="absolute right-0 top-0 w-32 h-32 bg-white/5 rounded-full translate-x-8 -translate-y-8 pointer-events-none"></div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-[9px] font-black text-[#B2D2A4] uppercase tracking-widest text-opacity-80">Estimasi Keuntungan</p>
                    <h4 class="text-2xl font-black tracking-tight mt-1">
                        Rp {{ number_format($dataFinance['labaKotor'] ?? 0, 0, ',', '.') }}
                    </h4>
                </div>
                <div class="bg-white/10 px-3 py-1.5 rounded-xl text-[9px] font-bold uppercase tracking-wider border border-white/10 backdrop-blur-sm">
                    Kasir Aktif
                </div>
            </div>
        </div>

        {{-- Kondisi Stok Kritis --}}
        @if($stokKritis > 0)
        <div class="col-span-2 bg-[#C24914]/5 p-5 rounded-[28px] border border-[#C24914]/20 animate-pulse">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <span class="text-xl">⚠️</span>
                    <div>
                        <p class="text-[9px] font-black text-[#C24914] uppercase tracking-wider">Perhatian Utama</p>
                        <h4 class="text-sm font-black text-[#C24914] mt-0.5">{{ $stokKritis }} Produk Mau Habis!</h4>
                    </div>
                </div>
                <a href="/inventory" class="bg-[#C24914] hover:bg-[#A03B0F] text-white px-4 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm transition-all active:scale-95">Cek</a>
            </div>
        </div>
        @else
        <div class="col-span-2 bg-[#4F6F52]/5 p-5 rounded-[28px] border border-[#B2D2A4]/20 flex items-center gap-3">
            <span class="text-lg">✅</span>
            <div>
                <p class="text-[9px] font-black text-[#739072] uppercase tracking-wider">Kondisi Gudang</p>
                <p class="text-xs font-bold text-[#4F6F52] mt-0.5">Semua stok barang aman dan terkendali, Ce!</p>
            </div>
        </div>
        @endif
    </div>

    {{-- MENU AKSIL / MENU GRID UTAMA --}}
    <div class="mt-8">
        <h5 class="text-[10px] font-black text-[#739072] uppercase tracking-[0.25em] mb-4 ml-1">Pintasan Menu</h5>
        <div class="grid grid-cols-2 gap-3">
            
            {{-- Tombol Kasir --}}
            <a href="/kasir" class="flex flex-col justify-between bg-white p-5 rounded-[24px] border border-[#E1E6D1]/60 shadow-sm hover:scale-[1.02] active:scale-98 transition-all group">
                <div class="bg-[#B2D2A4]/20 w-10 h-10 rounded-xl flex items-center justify-center text-lg group-hover:scale-110 transition-transform">🛒</div>
                <div class="mt-4">
                    <span class="font-black text-xs uppercase tracking-wider block">Buka Kasir</span>
                    <span class="text-[9px] text-[#739072] mt-0.5 block">Catat Penjualan</span>
                </div>
            </a>

            {{-- Tombol Grafik --}}
            <a href="/grafik" class="flex flex-col justify-between bg-white p-5 rounded-[24px] border border-[#E1E6D1]/60 shadow-sm hover:scale-[1.02] active:scale-98 transition-all group">
                <div class="bg-[#4F6F52]/10 w-10 h-10 rounded-xl flex items-center justify-center text-lg group-hover:scale-110 transition-transform">📈</div>
                <div class="mt-4">
                    <span class="font-black text-xs uppercase tracking-wider block">Grafik Performa</span>
                    <span class="text-[9px] text-[#739072] mt-0.5 block">Analisis Keuntungan</span>
                </div>
            </a>

        </div>
    </div>

    {{-- DOCK BAR MENU (NAVIGASI BAWAH MODERN) --}}
    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[310px] bg-white/90 backdrop-blur-md h-16 rounded-[24px] shadow-[0_10px_30px_rgba(79,111,82,0.1)] flex justify-around items-center border border-[#E1E6D1]/50 z-50 px-3">
        
        <a href="/" class="p-2.5 rounded-xl transition-all {{ Request::is('/') ? 'bg-[#4F6F52] text-white shadow-md shadow-[#4F6F52]/20 scale-105' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75v4.5a.75.75 0 01-.75.75H5.719c-1.035 0-1.875-.84-1.875-1.875v-6.198c.03-.028.06-.057.091-.086L12 5.432z" />
            </svg>
        </a>

        <a href="/kasir" class="p-2.5 rounded-xl transition-all {{ Request::is('kasir*') ? 'bg-[#4F6F52] text-white shadow-md shadow-[#4F6F52]/20 scale-105' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </a>

        <a href="/inventory" class="p-2.5 rounded-xl transition-all {{ Request::is('inventory*') ? 'bg-[#4F6F52] text-white shadow-md shadow-[#4F6F52]/20 scale-105' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </a>

        <a href="/laporan" class="p-2.5 rounded-xl transition-all {{ Request::is('laporan*') ? 'bg-[#4F6F52] text-white shadow-md shadow-[#4F6F52]/20 scale-105' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
        </a>

        <a href="/akun" class="p-2.5 rounded-xl transition-all {{ Request::is('akun*') ? 'bg-[#4F6F52] text-white shadow-md shadow-[#4F6F52]/20 scale-105' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </a>
    </div>

</body>
</html>