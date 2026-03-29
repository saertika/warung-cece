<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9FBE7] min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="bg-white w-full max-w-md p-8 rounded-[40px] shadow-sm border border-[#E1E6D1]">
        <div class="mb-8 text-center">
            <h3 class="font-extrabold text-2xl text-[#4F6F52]">Edit Barang</h3>
            <p class="text-xs text-[#739072] font-semibold uppercase tracking-widest mt-1">Perbarui Data {{ $barang->nama_barang }}</p>
        </div>

        <form action="/update-barang/{{ $barang->id }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-[10px] font-black text-[#739072] uppercase mb-1 ml-4">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" required
                    class="w-full bg-[#F9FBE7] border-none rounded-2xl px-5 py-3.5 text-sm font-bold text-[#4F6F52] focus:ring-2 focus:ring-[#B2D2A4] outline-none">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-[#739072] uppercase mb-1 ml-4">Harga Beli</label>
                    <input type="number" name="harga_beli" value="{{ $barang->harga_beli }}" required
                        class="w-full bg-[#F9FBE7] border-none rounded-2xl px-5 py-3.5 text-sm font-bold text-[#4F6F52] focus:ring-2 focus:ring-[#B2D2A4] outline-none">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-[#739072] uppercase mb-1 ml-4">Harga Jual</label>
                    <input type="number" name="harga_jual" value="{{ $barang->harga_jual }}" required
                        class="w-full bg-[#F9FBE7] border-none rounded-2xl px-5 py-3.5 text-sm font-bold text-[#4F6F52] focus:ring-2 focus:ring-[#B2D2A4] outline-none">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-[#739072] uppercase mb-1 ml-4">Stok Barang</label>
                <input type="number" name="stok" value="{{ $barang->stok }}" required
                    class="w-full bg-[#F9FBE7] border-none rounded-2xl px-5 py-3.5 text-sm font-bold text-[#4F6F52] focus:ring-2 focus:ring-[#B2D2A4] outline-none">
            </div>

            <div>
                <label class="block text-[10px] font-black text-[#739072] uppercase mb-1 ml-4">Ganti Foto (Kosongkan jika tetap)</label>
                <div class="relative">
                    <input type="file" name="foto" 
                        class="w-full bg-[#F9FBE7] border-none rounded-2xl px-5 py-3 text-xs font-bold text-[#739072] file:hidden cursor-pointer">
                </div>
                @if($barang->foto)
                    <p class="mt-2 ml-4 text-[9px] text-[#B2D2A4] font-bold italic">* Foto saat ini: {{ $barang->foto }}</p>
                @endif
            </div>

            <div class="pt-4 flex flex-col space-y-3">
                <button type="submit" 
                    class="w-full bg-[#86A789] text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-md hover:bg-[#4F6F52] transition-all">
                    Update Data Barang
                </button>
                <a href="/inventory" class="text-center text-[10px] font-black text-[#739072] hover:text-[#4F6F52] uppercase tracking-widest">
                    Batal & Kembali
                </a>
            </div>
        </form>
    </div>

</body>
</html>