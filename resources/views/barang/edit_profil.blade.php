<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-[#F8FAF5] flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white p-10 rounded-[40px] shadow-2xl shadow-[#4F6F52]/10 border border-[#E1E6D1]">
        
        {{-- Header dengan nuansa Hijau Cece --}}
        <div class="text-center mb-8">
            <div class="bg-[#B2D2A4]/20 w-16 h-16 rounded-3xl flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl">🌿</span>
            </div>
            <h2 class="text-2xl font-black text-[#4F6F52] tracking-tight">Profil Cece</h2>
            <p class="text-[10px] font-bold text-[#739072] uppercase tracking-[0.2em] mt-1">Update Data Pengguna</p>
        </div>

        <form action="{{ route('profil.update') }}" method="POST" class="space-y-6">
            @csrf
            
            {{-- Input Nama --}}
            <div class="group">
                <label class="block text-[10px] font-black text-[#739072] uppercase tracking-widest mb-2 ml-4">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}" 
                    class="w-full bg-[#F8FAF5] border-2 border-transparent focus:border-[#B2D2A4] focus:bg-white rounded-2xl p-4 text-sm text-[#4F6F52] transition-all outline-none"
                    placeholder="Nama Cece...">
            </div>
            
            {{-- Input Email --}}
            <div class="group">
                <label class="block text-[10px] font-black text-[#739072] uppercase tracking-widest mb-2 ml-4">Email Aktif</label>
                <input type="email" name="email" value="{{ $user->email }}" 
                    class="w-full bg-[#F8FAF5] border-2 border-transparent focus:border-[#B2D2A4] focus:bg-white rounded-2xl p-4 text-sm text-[#4F6F52] transition-all outline-none"
                    placeholder="email@warungcece.com">
            </div>
            
            {{-- Tombol Save yang "Warung Cece" Banget --}}
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-[#4F6F52] hover:bg-[#3A533E] text-white py-4 rounded-2xl text-[11px] font-bold uppercase tracking-[0.3em] shadow-xl shadow-[#4F6F52]/30 transition-all active:scale-[0.98]">
                    Simpan Perubahan
                </button>
                
                <a href="/akun" class="block text-center mt-6 text-[10px] font-bold text-[#739072] uppercase tracking-widest hover:text-[#4F6F52] transition-colors">
                    ← Kembali ke Akun
                </a>
            </div>
        </form>
    </div>
</div>