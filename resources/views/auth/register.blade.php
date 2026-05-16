@extends('layouts.app')

@section('title', 'Daftar Akun - Warung Cece')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center px-4">
    
    {{-- KARTU WADAH UTAMA (Sama persis ukurannya dengan kartu Login agar konsisten) --}}
    <div class="bg-white p-8 rounded-[35px] shadow-[0_20px_50px_rgba(79,111,82,0.1)] border-2 border-[#4F6F52]/10 w-full max-w-sm relative overflow-hidden">
        
        {{-- JUDUL UTAMA & SUBTITLE --}}
        <div class="text-center mb-6">
            <h1 class="text-2xl font-black tracking-tight text-[#4F6F52]">Warung Cece</h1>
            <p class="text-xs font-semibold text-gray-400 mt-1">Buat akun baru untuk mulai mengelola</p>
        </div>

        {{-- FORM REGISTER --}}
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            {{-- INPUT NAMA --}}
            <div>
                <label class="block text-xs font-black text-[#4F6F52] uppercase tracking-wider mb-1.5 ml-1">Nama Lengkap</label>
                <input type="text" name="name" required placeholder="Masukkan nama lengkap"
                    class="w-full bg-[#ECF2E8] border-2 border-transparent focus:border-[#4F6F52]/30 focus:bg-white text-sm text-gray-800 rounded-2xl px-4 py-3 outline-none transition-all font-medium">
            </div>

            {{-- INPUT EMAIL --}}
            <div>
                <label class="block text-xs font-black text-[#4F6F52] uppercase tracking-wider mb-1.5 ml-1">Email</label>
                <input type="email" name="email" required placeholder="Contoh: admin@rt.test"
                    class="w-full bg-[#ECF2E8] border-2 border-transparent focus:border-[#4F6F52]/30 focus:bg-white text-sm text-gray-800 rounded-2xl px-4 py-3 outline-none transition-all font-medium">
            </div>

            {{-- INPUT PASSWORD --}}
            <div>
                <label class="block text-xs font-black text-[#4F6F52] uppercase tracking-wider mb-1.5 ml-1">Password</label>
                <input type="password" name="password" required placeholder="Minimal 8 karakter"
                    class="w-full bg-[#ECF2E8] border-2 border-transparent focus:border-[#4F6F52]/30 focus:bg-white text-sm text-gray-800 rounded-2xl px-4 py-3 outline-none transition-all font-medium">
            </div>

            {{-- INPUT KONFIRMASI PASSWORD --}}
            <div>
                <label class="block text-xs font-black text-[#4F6F52] uppercase tracking-wider mb-1.5 ml-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required placeholder="Ulangi password"
                    class="w-full bg-[#ECF2E8] border-2 border-transparent focus:border-[#4F6F52]/30 focus:bg-white text-sm text-gray-800 rounded-2xl px-4 py-3 outline-none transition-all font-medium">
            </div>

            {{-- TOMBOL DAFTAR SEKARANG --}}
            <div class="pt-2">
                <button type="submit" 
                    class="w-full bg-[#4F6F52] text-white font-black text-sm uppercase tracking-wider py-3.5 rounded-2xl shadow-md hover:bg-[#3A533C] transition-all active:scale-95">
                    Daftar Sekarang
                </button>
            </div>
        </form>

        {{-- LINK KEMBALI KE LOGIN --}}
        <div class="text-center mt-6 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-400 font-medium">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-[#4F6F52] font-black hover:underline ml-0.5">Masuk di sini</a>
            </p>
        </div>

    </div>
</div>
@endsection