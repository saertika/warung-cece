<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Cece - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9FBE7] min-h-screen font-sans p-6 pb-32">

    <div class="mb-10 pt-6">
        <h2 class="text-3xl font-extrabold text-[#4F6F52]">Halo, Cece! 👋</h2>
        <p class="text-[#739072] font-semibold mt-1 uppercase text-[10px] tracking-[0.2em]">Ringkasan Warung Hari Ini</p>
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
                <a href="/inventory" class="bg-[#C24914] text-white px-4 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest shadow-sm">Cek</a>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <h5 class="text-[10px] font-black text-[#739072] uppercase tracking-[0.2em] mb-4">Aksi Cepat</h5>
        <div class="space-y-3">
            <a href="/kasir" class="flex items-center justify-between bg-[#B2D2A4] p-5 rounded-[24px] text-white shadow-md">
                <span class="font-bold text-sm uppercase tracking-wider">Buka Kasir Baru</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor font-bold"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </a>
        </div>
    </div>

    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-sm bg-white/80 backdrop-blur-md rounded-[32px] shadow-xl border border-white p-4 flex justify-around items-center z-50">
        
        <a href="/" class="p-3 bg-[#4F6F52] text-white rounded-2xl shadow-lg transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011-1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
        </a>

        <a href="/kasir" class="p-3 text-[#739072] hover:bg-gray-50 rounded-2xl transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
        </a>

        <a href="/inventory" class="p-3 text-[#739072] hover:bg-gray-50 rounded-2xl transition-all text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
        </a>

        <a href="/laporan" class="p-3 text-[#739072] hover:bg-gray-50 rounded-2xl transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
        </a>

    </div>

</body>
</html>