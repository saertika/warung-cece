<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9FBE7] min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="bg-white w-full max-w-md p-8 rounded-[40px] shadow-sm border border-[#E1E6D1]">
        <div class="mb-8 text-center">
            <h3 class="font-extrabold text-2xl text-[#4F6F52]">Kasir Warung</h3>
            <p class="text-xs text-[#739072] font-semibold uppercase tracking-widest mt-1">Catat Penjualan Barang</p>
        </div>

        <form action="/proses-jual" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-[10px] font-black text-[#739072] uppercase mb-2 ml-4">Pilih Barang</label>
                <select name="barang_id" required 
                    class="w-full bg-[#F9FBE7] border-none rounded-2xl px-5 py-3.5 text-sm font-bold text-[#4F6F52] focus:ring-2 focus:ring-[#B2D2A4] outline-none appearance-none">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_barang }} (Sisa: {{ $b->stok }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-[10px] font-black text-[#739072] uppercase mb-2 ml-4">Jumlah Terjual</label>
                <input type="number" name="jumlah" min="1" placeholder="Contoh: 5" required
                    class="w-full bg-[#F9FBE7] border-none rounded-2xl px-5 py-3.5 text-sm font-bold text-[#4F6F52] focus:ring-2 focus:ring-[#B2D2A4] outline-none">
            </div>

            <div class="pt-4 flex flex-col space-y-3">
                <button type="submit" 
                    class="w-full bg-[#B2D2A4] text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-md hover:bg-[#86A789] transition-all">
                    Konfirmasi Penjualan
                </button>
                <a href="/inventory" class="text-center text-[10px] font-black text-[#739072] hover:text-[#4F6F52] uppercase tracking-widest">
                    Batal & Kembali
                </a>
            </div>
        </form>
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