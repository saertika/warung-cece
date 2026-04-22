<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Warung Cece</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F9FBE7] flex items-center justify-center h-screen">
    <div class="bg-white p-10 rounded-[32px] shadow-xl w-full max-w-md border border-[#E1E6D1]">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black text-[#4F6F52]">Warung Cece</h1>
            <p class="text-gray-500">Silakan login untuk kelola warung</p>
        </div>
        @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg text-sm">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-[#4F6F52] mb-2">Email</label>
                <input type="email" name="email" class="w-full p-4 rounded-2xl border border-gray-200 focus:outline-[#4F6F52]" placeholder="cece@warung.com" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-[#4F6F52] mb-2">Password</label>
                <input type="password" name="password" class="w-full p-4 rounded-2xl border border-gray-200 focus:outline-[#4F6F52]" placeholder="******" required>
            </div>
            <button type="submit" class="w-full bg-[#4F6F52] text-white p-4 rounded-2xl font-bold shadow-lg hover:bg-[#3A533C] transition-all">
                Masuk Sekarang
            </button>
        </form>
    </div>
</body>
</html>