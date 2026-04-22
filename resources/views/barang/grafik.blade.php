<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Grafik Analisis - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background-color: white !important; }
            .report-box { border: none !important; box-shadow: none !important; width: 100% !important; margin: 0 !important; }
        }
    </style>
</head>
<body class="bg-[#F9FBE7] min-h-screen p-4 md:p-12">

    <div class="max-w-4xl mx-auto mb-6 flex justify-between items-center no-print">
        <a href="/" class="text-[#4F6F52] font-bold flex items-center gap-2">← Dashboard</a>
        <div class="flex gap-2">
            <a href="/laporan" class="bg-white border border-[#4F6F52] text-[#4F6F52] px-4 py-2 rounded-xl font-bold text-sm">Lihat Laba/Rugi</a>
            <button onclick="window.print()" class="bg-[#4F6F52] text-white px-6 py-2 rounded-xl font-bold shadow-lg text-sm">Cetak Grafik</button>
        </div>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-12 shadow-xl rounded-[32px] border border-[#E1E6D1] report-box">
        <div class="text-center mb-12">
            <h2 class="text-lg font-bold uppercase tracking-[0.3em] text-[#4F6F52]">Warung Kantin Fasilkom</h2>
            <h1 class="text-3xl font-black text-red-600 mt-2 uppercase">Grafik Performa Bisnis</h1>
           
        </div>

        <div class="h-[450px] w-full">
            <canvas id="incomeChart"></canvas>
        </div>

        <div class="mt-12 flex justify-center gap-10 border-t border-gray-50 pt-8">
            <div class="text-center">
                <p class="text-[10px] font-bold text-gray-400 uppercase">Total Omzet</p>
                <p class="text-xl font-black text-[#4F6F52]">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
            </div>
            <div class="text-center">
                <p class="text-[10px] font-bold text-gray-400 uppercase">Total Biaya</p>
                <p class="text-xl font-black text-red-500">Rp {{ number_format($totalHPP, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('incomeChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($dataGrafik['labels']) !!},
                datasets: [
                    { label: 'Pendapatan', data: {!! json_encode($dataGrafik['pendapatan']) !!}, backgroundColor: '#4F6F52', borderRadius: 10 },
                    { label: 'HPP', data: {!! json_encode($dataGrafik['biaya']) !!}, backgroundColor: '#B2D2A4', borderRadius: 10 }
                ]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom', labels: { font: { weight: 'bold' } } } }
            }
        });
    </script>
</body>
</html>