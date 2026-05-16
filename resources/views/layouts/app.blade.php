<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Warung Cece')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen font-sans bg-[#E3EAE0] text-[#4F6F52] relative overflow-x-hidden">

    {{-- KONTEN UTAMA --}}
    <main class="relative z-10">
        @yield('content')
    </main>

    {{-- BUNGKUS PAKAI @auth BIAR NAV BAWAH HANYA MUNCUL JIKA SUDAH LOGIN --}}
    @auth
        <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-xl bg-white h-16 rounded-[24px] shadow-[0_15px_35px_rgba(79,111,82,0.12)] flex justify-around items-center border-2 border-[#4F6F52]/20 z-50 px-6">
            <a href="/" class="p-2.5 rounded-xl text-xl {{ Request::is('/') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-[#739072] opacity-60 hover:opacity-100' }}">🏠</a>
            <a href="/inventory" class="p-2.5 rounded-xl text-xl {{ Request::is('inventory*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-[#739072] opacity-60 hover:opacity-100' }}">🛍️</a>
            <a href="/kasir" class="p-2.5 rounded-xl text-xl {{ Request::is('kasir*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-[#739072] opacity-60 hover:opacity-100' }}">🛒</a>
            <a href="/laporan" class="p-2.5 rounded-xl text-xl {{ Request::is('laporan*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-[#739072] opacity-60 hover:opacity-100' }}">📊</a>
            <a href="/akun" class="p-2.5 rounded-xl text-xl {{ Request::is('akun*') ? 'bg-[#4F6F52] text-white shadow-md' : 'text-[#739072] opacity-60 hover:opacity-100' }}">👤</a>
        </div>
    @endauth

</body>
</html>