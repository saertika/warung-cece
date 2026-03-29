<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-[#F9FBE7] min-h-screen pb-10">
    <div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-white p-4 rounded-2xl shadow-sm text-center">
        <p class="text-[10px] font-bold text-gray-400">OMZET</p>
        <p class="font-bold text-blue-600">Rp {{ number_format($pendapatan) }}</p>
    </div>
    <div class="bg-white p-4 rounded-2xl shadow-sm text-center">
        <p class="text-[10px] font-bold text-gray-400">MODAL</p>
        <p class="font-bold text-red-400">Rp {{ number_format($modal) }}</p>
    </div>
    <div class="bg-white p-4 rounded-2xl shadow-sm text-center border-2 border-green-200">
        <p class="text-[10px] font-bold text-gray-400">LABA</p>
        <p class="font-bold text-green-600">Rp {{ number_format($laba) }}</p>
    </div>
</div>

<div class="bg-white p-6 rounded-3xl shadow-sm mb-6">
    <h3 class="font-bold text-gray-800 mb-4 text-sm">Monitoring Stok Barang</h3>
    <div class="h-64">
        <canvas id="stokChart"></canvas>
    </div>
</div>

<script>
    const ctx = document.getElementById('stokChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // Pakai batang sesuai keinginan
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Sisa Stok (Pcs)',
                data: {!! json_encode($stokData) !!},
                backgroundColor: '#B2D2A4', // Hijau sesuai tema Warung Cece
                borderRadius: 8
            }]
        },
        options: {
            scales: { y: { beginAtZero: true } }
        }
    });
</script>

</body>
</html>