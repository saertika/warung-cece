<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Laku - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background-color: white !important; }
            .report-container { border: none !important; box-shadow: none !important; width: 100% !important; margin: 0 !important; }
        }
    </style>
</head>
<body class="bg-[#F9FBE7] min-h-screen p-4 md:p-12">

    <div class="max-w-4xl mx-auto mb-6 flex justify-between items-center no-print">
        <a href="/" class="text-[#4F6F52] font-bold flex items-center gap-2 text-sm uppercase tracking-wider">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Dashboard
        </a>
        <button onclick="window.print()" class="bg-[#4F6F52] text-white px-6 py-2 rounded-xl font-bold shadow-lg text-sm hover:bg-[#3A533C] transition-all">
            Cetak Laporan
        </button>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-12 shadow-2xl report-container rounded-sm border border-gray-200">
        
        <div class="text-center mb-10">
            <h2 class="text-lg font-bold uppercase tracking-[0.2em] text-gray-800">Warung Mini SD</h2>
            <h1 class="text-2xl font-black text-red-700 mt-1 uppercase">Laba/Rugi (Standar)</h1>
            <p class="text-sm text-gray-500 font-medium italic">Periode: 01 April 2026 s/d 30 April 2026</p>
            <div class="flex justify-between text-[10px] text-gray-400 mt-6 border-b border-gray-100 pb-1 uppercase font-bold">
                <span>Cabang: [Semua Cabang]</span>
                <span>Mata Uang: IDR (Indonesian Rupiah)</span>
            </div>
        </div>

        <table class="w-full text-sm border-collapse">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="text-left py-3 font-bold uppercase tracking-tighter">Deskripsi Akun</th>
                    <th class="text-right py-3 font-bold uppercase tracking-tighter">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr class="font-bold"><td colspan="2" class="pt-6 pb-2 text-gray-800 uppercase tracking-tight">PENDAPATAN</td></tr>
                <tr>
                    <td class="pl-6 py-1 italic">Penjualan Barang Laku</td>
                    <td class="text-right py-1 border-t border-gray-200 font-mono">{{ number_format($totalPenjualan, 0, ',', '.') }}</td>
                </tr>
                <tr class="font-bold border-t border-black bg-gray-50">
                    <td class="py-2">JUMLAH PENDAPATAN</td>
                    <td class="text-right py-2">{{ number_format($totalPenjualan, 0, ',', '.') }}</td>
                </tr>

                <tr class="font-bold"><td colspan="2" class="pt-8 pb-2 text-gray-800 uppercase tracking-tight">BEBAN POKOK PENJUALAN</td></tr>
                <tr>
                    <td class="pl-6 py-1 italic">Harga Pokok Penjualan (HPP)</td>
                    <td class="text-right py-1 border-t border-gray-200 font-mono">({{ number_format($totalHPP, 0, ',', '.') }})</td>
                </tr>
                <tr class="font-bold border-t border-black bg-gray-50">
                    <td class="py-2">JUMLAH BEBAN POKOK PENJUALAN</td>
                    <td class="text-right py-2">({{ number_format($totalHPP, 0, ',', '.') }})</td>
                </tr>

                <tr class="font-bold text-base bg-gray-100">
                    <td class="py-4 uppercase tracking-wider">LABA KOTOR</td>
                    <td class="text-right py-4 border-t-2 border-black">{{ number_format($labaKotor, 0, ',', '.') }}</td>
                </tr>

                <tr class="font-black text-xl border-b-4 border-double border-black pt-10">
                    <td class="py-6 uppercase">LABA BERSIH</td>
                    <td class="text-right py-6 text-green-700 font-mono">{{ number_format($labaBersih, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-20 flex justify-end">
            <div class="text-center w-64">
                <p class="italic text-sm mb-24">Palembang, {{ date('d F Y') }}</p>
                <div class="border-t border-black pt-2">
                    <p class="font-bold text-lg text-black">Celia Amara (Cece)</p>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Pemilik Warung</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>