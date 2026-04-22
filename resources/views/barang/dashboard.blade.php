<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Cece - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9FBE7] min-h-screen font-sans p-6 pb-32">

    <div class="flex justify-between items-start mb-10 pt-6">
        <div>
            <h2 class="text-3xl font-extrabold text-[#4F6F52]">Halo, Cece! 👋</h2>
            <p class="text-[#739072] font-semibold mt-1 uppercase text-[10px] tracking-[0.2em]">Ringkasan Warung Hari Ini</p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-100 text-red-600 p-3 rounded-2xl hover:bg-red-200 transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </form>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-[32px] shadow-sm border border-[#E1E6D1]">
            <p class="text-[9px] font-black text-[#739072] uppercase">Total Produk</p>
            <h4 class="text-3xl font-black text-[#4F6F52] mt-2">{{ $totalBarang }}</h4>
            <p class="text-[9px] text-[#B2D2A4] mt-1">Jenis Barang</p>
        </div>
        <div class="bg-white p-6 rounded-[32px] shadow-sm border border-[#E1E6D1]">
            <p class="text-[9px] font-black text-[#739072] uppercase">Total Stok</p>
            <h4 class="text-3xl font-black text-[#4F6F52] mt-2">{{ $totalStok }}</h4>
            <p class="text-[9px] text-[#B2D2A4] mt-1">Pcs Tersedia</p>
        </div>
        
        <div class="col-span-2 bg-[#C24914]/10 p-6 rounded-[32px] border border-[#C24914]/20">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-[9px] font-black text-[#C24914] uppercase text-opacity-70">Perhatian</p>
                    <h4 class="text-xl font-black text-[#C24914] mt-1">{{ $stokKritis }} Produk Kritis</h4>
                </div>
                <a href="/inventory" class="bg-[#C24914] text-white px-4 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm hover:scale-105 transition-transform">Cek</a>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <h5 class="text-[10px] font-black text-[#739072] uppercase tracking-[0.2em] mb-4">Aksi Cepat</h5>
        <div class="space-y-3">
            <a href="/kasir" class="flex items-center justify-between bg-[#B2D2A4] p-5 rounded-[24px] text-white shadow-md hover:bg-[#a1c492] transition-all">
                <span class="font-bold text-sm uppercase tracking-wider">Buka Kasir Baru</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor font-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
            <a href="/grafik" class="flex items-center justify-between bg-[#4F6F52] p-5 rounded-[24px] text-white shadow-md hover:bg-[#3A533C] transition-all">
                <span class="font-bold text-sm uppercase tracking-wider">Lihat Grafik Performa</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor font-bold">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </a>
        </div>
    </div>

    <div class="fixed bottom-8 left-1/2 -translate-x-1/2 w-[280px] bg-white h-16 rounded-[24px] shadow-lg flex justify-around items-center border border-gray-100 z-50 px-2">
        
        <a href="/" class="p-2.5 rounded-xl transition-all {{ Request::is('/') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75v4.5a.75.75 0 01-.75.75H5.719c-1.035 0-1.875-.84-1.875-1.875v-6.198c.03-.028.06-.057.091-.086L12 5.432z" />
            </svg>
        </a>

        <a href="/kasir" class="p-2.5 rounded-xl transition-all {{ Request::is('kasir*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
        </a>

        <a href="/inventory" class="p-2.5 rounded-xl transition-all {{ Request::is('inventory*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </a>

        <a href="/laporan" class="p-2.5 rounded-xl transition-all {{ Request::is('laporan*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
        </a>

        <a href="/akun" class="p-2.5 rounded-xl transition-all {{ Request::is('akun*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-gray-400 hover:text-[#4F6F52]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </a>

    </div>

</body>
</html>