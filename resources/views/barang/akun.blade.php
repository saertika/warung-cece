<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9FBE7] min-h-screen pb-24">

    <div class="bg-[#D1E6AD] p-8 rounded-b-[40px] shadow-sm mb-6 flex items-center gap-4">
        <span class="text-2xl font-bold">←</span>
        <h1 class="text-2xl font-extrabold text-gray-800">Akun</h1>
    </div>

    <div class="px-6 space-y-6">
        <div class="bg-[#B2D2A4] p-4 rounded-3xl flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <div class="text-4xl">🏪</div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Warung Cece</h3>
                    <p class="text-[10px] text-gray-700 leading-tight">Universitas Sriwijaya<br>Gedung Comlab lt.1</p>
                </div>
            </div>
            <button class="bg-[#FFF9C4] text-[10px] font-bold px-3 py-1 rounded-lg border border-yellow-200">Edit Toko</button>
        </div>

        <section>
            <h2 class="text-lg font-bold text-gray-800 mb-3">Info Pengguna</h2>
            <div class="bg-white p-4 rounded-3xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-pink-300 rounded-full flex items-center justify-center text-white font-bold text-xl">C</div>
                    <div>
                        <h3 class="font-bold text-gray-800">Celia Amara</h3>
                        <p class="text-[10px] text-gray-400">celia.amara@gmail.com</p>
                    </div>
                </div>
                <button class="bg-[#D1E6AD] text-[10px] font-bold px-3 py-1 rounded-lg">Edit Profil</button>
            </div>
        </section>

       <section>
    <h2 class="text-lg font-bold text-gray-800 mb-3">Laporan Keuangan</h2>
    <a href="/laporan" class="bg-[#B2D2A4] bg-opacity-40 p-6 rounded-3xl flex justify-between items-center group cursor-pointer hover:bg-opacity-60 transition">
        <div>
            <p class="text-gray-600 text-sm">Klik untuk Melihat Laporan</p>
            <p class="text-xs font-bold text-green-700 mt-1">Estimasi Profit: Rp. {{ number_format($keuntungan, 0, ',', '.') }}</p>
        </div>
        <div class="text-2xl text-gray-400 group-hover:translate-x-2 transition-transform">❯</div>
    </a>
</section>

    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-sm bg-white h-20 rounded-[35px] shadow-[0_20px_50px_rgba(0,0,0,0.1)] flex justify-around items-center border border-gray-100 z-50 px-4">
    
    <a href="/" class="flex flex-col items-center transition-all duration-300 {{ Request::is('/') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">🏠</span>
        @if(Request::is('/')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/inventory" class="flex flex-col items-center transition-all duration-300 {{ Request::is('inventory*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">🛍️</span>
        @if(Request::is('inventory*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/kasir" class="flex flex-col items-center transition-all duration-300 {{ Request::is('kasir*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">🛒</span>
        @if(Request::is('kasir*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/laporan" class="flex flex-col items-center transition-all duration-300 {{ Request::is('laporan*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">📊</span>
        @if(Request::is('laporan*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/akun" class="flex flex-col items-center transition-all duration-300 {{ Request::is('akun*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">👤</span>
        @if(Request::is('akun*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

</div>

</body>
</html>