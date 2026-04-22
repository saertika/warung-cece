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