<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #F9FBE7; }
        .card-shadow { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body class="pb-24">

    <div class="bg-[#D1E6AD] p-8 rounded-b-[40px] shadow-sm mb-6">
        <div class="flex items-center gap-4">
            <div class="text-2xl font-bold">←</div>
            <h1 class="text-2xl font-extrabold text-gray-800">Daftar Barang</h1>
        </div>
    </div>

    <div class="px-6 mb-6">
        <div class="relative">
            <input type="text" placeholder="Cari Barang" class="w-full p-4 rounded-2xl border-none shadow-md focus:ring-2 focus:ring-[#A5B68D] pl-12">
            <span class="absolute left-4 top-4 opacity-30">🔍</span>
        </div>
    </div>

    <div class="px-6 space-y-4">
        
        <div class="bg-white p-4 rounded-3xl flex justify-between items-center card-shadow">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-[#F5F5F5] rounded-2xl flex items-center justify-center text-3xl text-orange-800">🍫</div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Chocolate DairyMilk</h3>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-bold italic">⚠️ Stock hampir habis</span>
                        <span class="text-[10px] bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full font-bold">Menipis</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#E6EE9C] px-4 py-2 rounded-2xl font-black text-gray-800 text-sm">
                Rp. 10.000
            </div>
        </div>

        <div class="bg-white p-4 rounded-3xl flex justify-between items-center card-shadow">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-[#F5F5F5] rounded-2xl flex items-center justify-center text-3xl">🍜</div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Indomie Pop Mie</h3>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-bold italic">⚠️ Stock hampir habis</span>
                        <span class="text-[10px] bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full font-bold">Menipis</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#E6EE9C] px-4 py-2 rounded-2xl font-black text-gray-800 text-sm">
                Rp. 8.000
            </div>
        </div>

        <div class="bg-white p-4 rounded-3xl flex justify-between items-center card-shadow border-2 border-[#D1E6AD]">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-[#F5F5F5] rounded-2xl flex items-center justify-center text-3xl">💧</div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Minerale</h3>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-[10px] bg-[#D1E6AD] text-green-800 px-2 py-0.5 rounded-full font-bold italic">Stock : 20 pcs</span>
                        <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-bold">Aman</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#E6EE9C] px-4 py-2 rounded-2xl font-black text-gray-800 text-sm">
                Rp. 5.000
            </div>
        </div>

    </div>

    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] bg-white h-20 rounded-[30px] shadow-2xl flex justify-around items-center border border-gray-100">
        <button class="text-2xl">🏠</button>
        <button class="text-2xl opacity-30">📦</button>
        <button class="text-2xl opacity-30">🕒</button>
        <button class="text-2xl opacity-30">👤</button>
    </div>

</body>
</html>