<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Laba Rugi - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background-color: white !important; }
            .report-container { border: none !important; box-shadow: none !important; width: 100% !important; margin: 0 !important; }
        }
    </style>
</head>
<div class="relative z-[100] max-w-4xl mx-auto mb-6 flex justify-between items-center no-print">
    <a href="/" class="text-[#4F6F52] font-bold flex items-center gap-2 text-sm uppercase">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Dashboard
    </a>

    <div class="flex gap-3">
        <a href="/grafik" style="background-color: #86A789; color: white;" class="px-6 py-2 rounded-xl font-bold shadow-lg text-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
            </svg>
            Lihat Grafik
        </a>

        <button onclick="window.print()" class="bg-[#4F6F52] text-white px-6 py-2 rounded-xl font-bold shadow-lg text-sm">
            Cetak Laporan
        </button>
    </div>
</div>
    

    <div class="max-w-4xl mx-auto bg-white p-12 shadow-xl report-container rounded-sm border border-gray-200">
        <div class="text-center mb-10">
            <h2 class="text-lg font-bold uppercase tracking-widest text-gray-800">Warung Cece</h2>
            <h1 class="text-2xl font-black text-red-700 mt-1 uppercase">Laba/Rugi (Standar)</h1>
            <p class="text-sm text-gray-500 font-medium italic">Periode: 01 Agustus 2025 s/d 31 Oktober 2025</p>
            <div class="flex justify-between text-[10px] text-gray-400 mt-6 border-b border-gray-100 pb-1 uppercase font-bold text-left">
                <span>Cabang: [Semua Cabang]</span>
                <span>Mata Uang: IDR</span>
            </div>
        </div>

        <table class="w-full text-left border-collapse">
    <thead>
        <tr class="border-b-2 border-[#4F6F52]">
            <th class="py-2 text-[#4F6F52]">Nama Barang</th>
            <th class="py-2 text-right text-[#4F6F52]">Terjual</th>
            <th class="py-2 text-right text-[#4F6F52]">Pendapatan</th>
            <th class="py-2 text-right text-[#4F6F52]">HPP</th>
            <th class="py-2 text-right text-[#4F6F52]">Laba</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $b)
        @if($b->terjual > 0)
        <tr class="border-b border-gray-100">
            <td class="py-3 font-medium">{{ $b->nama_barang }}</td>
            <td class="py-3 text-right">{{ $b->terjual }}</td>
            <td class="py-3 text-right text-green-600">Rp {{ number_format($b->harga_jual * $b->terjual) }}</td>
            <td class="py-3 text-right text-red-500">Rp {{ number_format($b->harga_beli * $b->terjual) }}</td>
            <td class="py-3 text-right font-bold">Rp {{ number_format(($b->harga_jual - $b->harga_beli) * $b->terjual) }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
    <tfoot>
        <tr class="bg-[#F9FBE7] font-black">
            <td colspan="2" class="py-4 px-2 text-[#4F6F52]">TOTAL KESELURUHAN</td>
            <td class="py-4 text-right text-green-700">Rp {{ number_format($totalPenjualan) }}</td>
            <td class="py-4 text-right text-red-700">Rp {{ number_format($totalHPP) }}</td>
            <td class="py-4 text-right text-[#4F6F52]">Rp {{ number_format($labaKotor) }}</td>
        </tr>
    </tfoot>
</table>
        <div class="mt-20 flex justify-end">
    <div class="text-center w-64">
        <p class="italic text-sm mb-24">Palembang, {{ date('d F Y') }}</p>
        
        <div class="border-t border-black pt-2">
            <p class="font-bold text-lg">Celia Amara (Cece)</p>
            <p class="text-xs text-gray-500 uppercase tracking-widest">Pemilik Warung</p>
        </div>
    </div>
</div>
    </div>
    
</body>
</html>