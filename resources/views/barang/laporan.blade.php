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
<body class="bg-[#F9FBE7] min-h-screen p-4 md:p-12">

    <div class="max-w-4xl mx-auto mb-6 flex justify-between items-center no-print">
        <a href="/" class="text-[#4F6F52] font-bold flex items-center gap-2">← Dashboard</a>
        <div class="flex gap-2">
            <a href="/grafik" class="bg-white border border-[#4F6F52] text-[#4F6F52] px-4 py-2 rounded-xl font-bold text-sm">Lihat Grafik</a>
            <button onclick="window.print()" class="bg-[#4F6F52] text-white px-6 py-2 rounded-xl font-bold shadow-lg text-sm">Cetak Laporan</button>
        </div>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-12 shadow-xl report-container rounded-sm border border-gray-200">
        <div class="text-center mb-10">
            <h2 class="text-lg font-bold uppercase tracking-widest text-gray-800">Warung Mini SD</h2>
            <h1 class="text-2xl font-black text-red-700 mt-1 uppercase">Laba/Rugi (Standar)</h1>
            <p class="text-sm text-gray-500 font-medium italic">Periode: 01 Agustus 2025 s/d 31 Oktober 2025</p>
            <div class="flex justify-between text-[10px] text-gray-400 mt-6 border-b border-gray-100 pb-1 uppercase font-bold text-left">
                <span>Cabang: [Semua Cabang]</span>
                <span>Mata Uang: IDR</span>
            </div>
        </div>

        <table class="w-full text-sm border-collapse">
            <thead>
                <tr class="border-b-2 border-black">
                    <th class="text-left py-3 font-bold">Deskripsi</th>
                    <th class="text-right py-3 font-bold">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr class="font-bold"><td colspan="2" class="pt-6 pb-2 uppercase text-gray-800">PENDAPATAN</td></tr>
                <tr><td class="pl-6 py-1 italic">Penjualan Barang</td><td class="text-right py-1">{{ number_format($totalPenjualan, 2, ',', '.') }}</td></tr>
                <tr class="font-bold border-t border-black bg-gray-50"><td>TOTAL PENDAPATAN</td><td class="text-right">{{ number_format($totalPenjualan, 2, ',', '.') }}</td></tr>

                <tr class="font-bold"><td colspan="2" class="pt-8 pb-2 uppercase text-gray-800">BEBAN POKOK PENJUALAN</td></tr>
                <tr><td class="pl-6 py-1 italic">Harga Pokok Penjualan (HPP)</td><td class="text-right py-1">({{ number_format($totalHPP, 2, ',', '.') }})</td></tr>
                <tr class="font-bold border-t border-black bg-gray-50"><td>TOTAL BEBAN POKOK PENJUALAN</td><td class="text-right">({{ number_format($totalHPP, 2, ',', '.') }})</td></tr>

                <tr class="font-bold text-base bg-gray-100"><td class="py-4 uppercase">LABA KOTOR</td><td class="text-right py-4 border-t-2 border-black">{{ number_format($labaKotor, 2, ',', '.') }}</td></tr>

                <tr class="font-bold"><td colspan="2" class="pt-8 pb-2 uppercase text-gray-800">BEBAN OPERASIONAL</td></tr>
                <tr><td class="pl-6 py-1 italic text-gray-400">Listrik, Sewa, Gaji (Subsidi Kampus)</td><td class="text-right text-gray-400">0,00</td></tr>
                <tr class="font-bold border-t border-black"><td>TOTAL BEBAN OPERASIONAL</td><td class="text-right">0,00</td></tr>

                <tr class="font-black text-xl border-b-4 border-double border-black pt-10">
                    <td class="py-6 uppercase">LABA BERSIH</td>
                    <td class="text-right py-6 text-green-700">{{ number_format($labaBersih, 2, ',', '.') }}</td>
                </tr>
            </tbody>
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