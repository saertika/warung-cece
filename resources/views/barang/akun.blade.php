@extends('layouts.app')

@section('title', 'Akun - Warung Cece')

@section('content')
    {{-- HEADER --}}

    {{-- HEADER: Garis bawah dipertebal dan dipertegas --}}
    <div class="backdrop-blur-md bg-white/95 p-6 rounded-b-[35px] shadow-md mb-8 border-b-2 border-[#4F6F52]/20 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto flex items-center gap-4">
            <a href="javascript:history.back()" class="text-xl font-black text-[#4F6F52] hover:scale-110 transition-transform cursor-pointer">←</a>
            <h1 class="text-xl font-black tracking-tight text-[#4F6F52]">Pengaturan Akun</h1>
        </div>
    </div>

    {{-- KONTEN UTAMA --}}
    <div class="max-w-6xl mx-auto px-6 pb-32">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            
            {{-- KOLOM KIRI: Info Warung & Data Pengguna --}}
            <div class="md:col-span-2 space-y-6">
                
                {{-- CARD INFO WARUNG: Warna putih diperpekat, border dipertegas (border-2) + Shadow Tebal --}}
                <div class="bg-white/95 p-6 rounded-[28px] flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_10px_30px_rgba(0,0,0,0.08)] border-2 border-[#4F6F52]/25 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-[#B2D2A4]/30 rounded-full blur-xl"></div>
                    <div class="flex items-center gap-4 relative z-10">
                        <div class="text-3xl bg-white p-3 rounded-2xl shadow-sm border-2 border-[#4F6F52]/20">🏪</div>
                        <div>
                            <h3 class="font-black text-[#4F6F52] text-lg">Warung Cece</h3>
                            <p class="text-[10px] text-[#739072] font-black tracking-wider uppercase mt-1">Gedung Comlab Lt.1</p>
                            <p class="text-xs text-[#B2D2A4] font-bold">Universitas Sriwijaya</p>
                        </div>
                    </div>
                    <button class="bg-[#4F6F52] text-white text-[10px] font-black uppercase tracking-wider px-4 py-2.5 rounded-xl shadow-md hover:bg-[#3A533C] transition-all active:scale-95 relative z-10 sm:self-center self-start">
                        Edit Toko
                    </button>
                </div>

                {{-- CARD DATA PENGGUNA: Border dipertegas + Shadow Tebal --}}
                <div class="bg-white/95 p-6 rounded-[28px] shadow-[0_10px_30px_rgba(0,0,0,0.08)] border-2 border-[#4F6F52]/25">
                    <h2 class="text-[10px] font-black text-[#739072] uppercase tracking-[0.2em] mb-4">Data Pengguna</h2>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-tr from-pink-400 to-rose-300 rounded-2xl flex items-center justify-center text-white font-black text-2xl shadow-sm border-2 border-white/60">
                                C
                            </div>
                            <div>
                                <h3 class="font-black text-[#4F6F52] text-base">Celia Amara</h3>
                                <p class="text-xs text-[#739072] font-semibold mt-0.5">celia.amara@gmail.com</p>
                            </div>
                        </div>
                        <a href="{{ route('profil.edit') }}" class="bg-white hover:bg-gray-50 text-[#4F6F52] text-[10px] font-black uppercase tracking-wider px-4 py-2.5 rounded-xl border-2 border-[#4F6F52]/20 shadow-sm transition-all active:scale-95 text-center">
                            Edit Profil
                        </a>
                    </div>
                </div>

            </div>

            {{-- KOLOM KANAN: Laporan Keuangan (Biar layoutnya seimbang di layar lebar) --}}
            <div class="md:col-span-1">
                <div class="backdrop-blur-xl bg-white/85 p-6 rounded-[28px] shadow-[0_10px_25px_rgba(79,111,82,0.05)] border border-white/80">
                    <h2 class="text-[10px] font-black text-[#739072] uppercase tracking-[0.2em] mb-4">Laporan Keuangan</h2>
                    <a href="/laporan" class="block bg-gradient-to-br from-[#4F6F52] to-[#364F38] p-5 rounded-[24px] shadow-lg shadow-[#4F6F52]/15 border border-white/10 relative overflow-hidden group transition-transform duration-300 hover:scale-[1.02]">
                        <div class="absolute right-0 bottom-0 w-24 h-24 bg-white/5 rounded-full translate-x-4 translate-y-4 pointer-events-none"></div>
                        <div class="flex justify-between items-center relative z-10">
                            <div>
                                <p class="text-[9px] font-black text-[#B2D2A4] uppercase tracking-wider">Klik untuk detail</p>
                                <p class="text-sm font-black text-white mt-2 leading-tight">
                                    Estimasi Profit:
                                </p>
                                <p class="text-xl font-black text-[#B2D2A4] mt-0.5 tracking-tight">
                                    Rp {{ number_format($keuntungan ?? 19564, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="bg-white/15 text-white w-8 h-8 rounded-xl flex items-center justify-center text-xs group-hover:translate-x-1 transition-transform border border-white/10 backdrop-blur-sm self-start">
                                ❯
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>

    </div>

    {{-- NAVIGASI BAWAH: Sekarang lebar proporsional di laptop --}}
    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-xl backdrop-blur-2xl bg-white/85 h-16 rounded-[24px] shadow-[0_15px_35px_rgba(79,111,82,0.15)] flex justify-around items-center border border-white/60 z-50 px-6">
        <a href="/" class="p-2.5 rounded-xl text-[#739072] opacity-50 hover:opacity-100 hover:text-[#4F6F52] transition-all text-xl">🏠</a>
        <a href="/inventory" class="p-2.5 rounded-xl text-[#739072] opacity-50 hover:opacity-100 hover:text-[#4F6F52] transition-all text-xl">🛍️</a>
        <a href="/kasir" class="p-2.5 rounded-xl text-[#739072] opacity-50 hover:opacity-100 hover:text-[#4F6F52] transition-all text-xl">🛒</a>
        <a href="/laporan" class="p-2.5 rounded-xl text-[#739072] opacity-50 hover:opacity-100 hover:text-[#4F6F52] transition-all text-xl">📊</a>
        <a href="/akun" class="p-2.5 rounded-xl bg-[#4F6F52] text-white shadow-md shadow-[#4F6F52]/20 scale-105 transition-all text-xl">👤</a>
    </div>

