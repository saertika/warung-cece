<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9FBE7] min-h-screen pb-24 font-sans">

    <div class="px-6 pt-10 pb-6 flex justify-between items-center">
        <div>
            <h3 class="font-extrabold text-3xl text-[#4F6F52]">Inventory</h3>
            <p class="text-xs text-[#739072] font-semibold">Warung Cece Management</p>
        </div>
        <a href="/tambah-barang" class="bg-[#B2D2A4] text-white px-6 py-3 rounded-2xl font-bold shadow-sm hover:bg-[#86A789] transition-all">
            + TAMBAH
        </a>
    </div>

    <div class="px-6 space-y-4">
        @foreach($barangs as $barang)
        <div class="bg-white p-5 rounded-[32px] shadow-sm flex items-center justify-between border border-[#E1E6D1]">
            
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-[#F9FBE7] rounded-2xl overflow-hidden border border-[#B2D2A4]/20 flex items-center justify-center">
                    @if($barang->foto)
                        <img src="{{ asset('storage/barangs/' . $barang->foto) }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-[9px] text-[#B2D2A4] font-black">NO IMAGE</span>
                    @endif
                </div>

                <div>
                    <h4 class="font-bold text-lg text-[#4F6F52] capitalize leading-tight">{{ $barang->nama_barang }}</h4>
                    <p class="text-[10px] font-bold text-[#739072] uppercase mt-1 tracking-wider">
                        Rp {{ number_format($barang->harga_jual) }} <span class="mx-1">|</span> Stok: {{ $barang->stok }}
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-2">
                
                @if($barang->stok <= 5)
                    <span class="bg-red-100 text-red-600 text-[9px] px-3 py-1.5 rounded-full font-black uppercase border border-red-200">KRITIS</span>
                @else
                    <span class="bg-[#D2E3C8] text-[#4F6F52] text-[9px] px-3 py-1.5 rounded-full font-black uppercase border border-[#B2D2A4]/30">AMAN</span>
                @endif

                <a href="/edit-barang/{{ $barang->id }}" 
                   class="bg-[#86A789] text-white px-4 py-2 rounded-xl text-[10px] font-black hover:bg-[#4F6F52] transition-colors shadow-sm">
                   EDIT
                </a>
                

                <a href="/hapus-barang/{{ $barang->id }}" 
                   onclick="return confirm('Hapus {{ $barang->nama_barang }}?')"
                   class="bg-[#C24914] text-white px-4 py-2 rounded-xl text-[10px] font-black hover:bg-[#A63D0D] transition-colors shadow-sm">
                   HAPUS
                </a>
                
            </div>
            
        </div>
        @endforeach
    </div>
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-[#E1E6D1] px-6 py-4 flex justify-around items-center z-50 rounded-t-[32px] shadow-[0_-4px_10px_rgba(0,0,0,0.02)]">
    
    <a href="/inventory" class="flex flex-col items-center text-[#4F6F52]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
        </svg>
        <span class="text-[10px] font-black uppercase mt-1">Stok</span>
    </a>

    <a href="/kasir" class="flex flex-col items-center text-[#739072] hover:text-[#4F6F52]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="text-[10px] font-black uppercase mt-1">Kasir</span>
    </a>

    <a href="/laporan" class="flex flex-col items-center text-[#739072] hover:text-[#4F6F52]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        <span class="text-[10px] font-black uppercase mt-1">Laporan</span>
    </a>

</div>

</body>
</html>