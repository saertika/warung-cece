@extends('layouts.app')

@section('title', 'Akun - Warung Cece')

@section('content')
    {{-- HEADER --}}
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-6">
        
        <div class="flex-grow">
            <div class="mb-6">
                <h3 class="font-extrabold text-2xl text-[#4F6F52]">Kasir Warung Cece</h3>
                <p class="text-xs text-[#739072] font-semibold uppercase tracking-widest">Pilihan snack</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @foreach($barangs as $b)
                <div class="bg-white p-3 rounded-[30px] shadow-sm border border-[#E1E6D1] flex flex-col items-center">
                    <img src="{{ asset('storage/barangs/' . $b->foto) }}" class="w-24 h-24 object-contain mb-2 rounded-xl">
                    <h4 class="font-bold text-[#4F6F52] text-sm text-center">{{ $b->nama_barang }}</h4>
                    <p class="text-[10px] text-gray-400 mb-3">Stok: {{ $b->stok }}</p>
                    
                    <div class="flex items-center gap-3 bg-[#F9FBE7] px-3 py-1.5 rounded-full border border-[#B2D2A4]">
                        <button onclick="updateQty({{ $b->id }}, -1, '{{ $b->nama_barang }}', {{ $b->harga_jual }})" class="font-black text-[#4F6F52]">-</button>
                        <span id="qty-{{ $b->id }}" class="text-xs font-bold text-[#4F6F52]">0</span>
                        <button onclick="updateQty({{ $b->id }}, 1, '{{ $b->nama_barang }}', {{ $b->harga_jual }})" class="font-black text-[#4F6F52]">+</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="w-full md:w-80">
            <div class="bg-white p-6 rounded-[40px] shadow-md border border-[#E1E6D1] sticky top-6">
                <h4 class="font-black text-[#4F6F52] text-sm uppercase mb-4 text-center">Rincian Belanja</h4>
                
                <div id="keranjang-list" class="space-y-3 mb-6 min-h-[100px] text-sm text-gray-500">
                    <p class="text-center italic py-4">Belum ada barang dipilih...</p>
                </div>

                <div class="border-t border-dashed border-gray-200 pt-4">
                    <div class="flex justify-between font-black text-[#4F6F52] mb-6">
                        <span>TOTAL</span>
                        <span id="total-harga">Rp 0</span>
                    </div>

                    <form action="/proses-jual-massal" method="POST" id="form-checkout">
                        @csrf
                        <input type="hidden" name="item_belanja" id="input-item-belanja">
                        <button type="button" onclick="submitBelanja()" class="w-full bg-[#B2D2A4] text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-md hover:bg-[#86A789] transition-all">
                            Konfirmasi Penjualan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let keranjang = {};

        function updateQty(id, change, nama, harga) {
            if (!keranjang[id]) {
                keranjang[id] = { nama: nama, qty: 0, harga: harga };
            }

            keranjang[id].qty += change;
            if (keranjang[id].qty < 0) keranjang[id].qty = 0;

            // Update angka di tombol
            document.getElementById(`qty-${id}`).innerText = keranjang[id].qty;
            renderKeranjang();
        }

        function renderKeranjang() {
            let html = '';
            let total = 0;
            
            for (let id in keranjang) {
                if (keranjang[id].qty > 0) {
                    let subtotal = keranjang[id].qty * keranjang[id].harga;
                    total += subtotal;
                    html += `
                        <div class="flex justify-between items-center bg-[#F9FBE7] p-2 rounded-xl">
                            <span class="font-bold text-[#4F6F52]">${keranjang[id].nama} <span class="text-xs text-gray-400">x${keranjang[id].qty}</span></span>
                            <span class="font-bold text-[#4F6F52]">Rp ${subtotal.toLocaleString()}</span>
                        </div>`;
                }
            }

            document.getElementById('keranjang-list').innerHTML = html || '<p class="text-center italic py-4">Belum ada barang dipilih...</p>';
            document.getElementById('total-harga').innerText = `Rp ${total.toLocaleString()}`;
            document.getElementById('input-item-belanja').value = JSON.stringify(keranjang);
        }

        function submitBelanja() {
            if (document.getElementById('total-harga').innerText === 'Rp 0') {
                alert('Pilih barang dulu Ce!');
                return;
            }
            document.getElementById('form-checkout').submit();
        }
    </script>
    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-sm bg-white h-20 rounded-[35px] shadow-[0_20px_50px_rgba(0,0,0,0.1)] flex justify-around items-center border border-gray-100 z-50 px-4">
    
    <a href="/" class="flex flex-col items-center transition-all duration-300 {{ Request::is('/') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">🏠</span>
        @if(Request::is('/')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/inventory" class="flex flex-col items-center transition-all duration-300 {{ Request::is('inventory*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">🛍️</span>
        @if(Request::is('inventory*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/kasir" class="flex flex-col items-center transition-all duration-300 {{ Request::is('kasir*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">🛒</span>
        @if(Request::is('kasir*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/laporan" class="flex flex-col items-center transition-all duration-300 {{ Request::is('laporan*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">📊</span>
        @if(Request::is('laporan*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

    <a href="/akun" class="flex flex-col items-center transition-all duration-300 {{ Request::is('akun*') ? 'scale-125' : 'opacity-30 hover:opacity-60' }}">
        <span class="text-2xl">👤</span>
        @if(Request::is('akun*')) <div class="w-1 h-1 bg-[#4F6F52] rounded-full mt-1"></div> @endif
    </a>

</div>

</body>
</html>