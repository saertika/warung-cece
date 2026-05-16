<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

// --- RUTE PUBLIK (Bisa dibuka tanpa login) ---
Route::get('/login', [BarangController::class, 'showLogin'])->name('login');
Route::post('/login', [BarangController::class, 'login']);
Route::post('/logout', [BarangController::class, 'logout'])->name('logout');

// Jalur Register (Sudah disatukan ke BarangController biar gak error)
Route::get('/register', [BarangController::class, 'showRegister'])->name('register');
Route::post('/register', [BarangController::class, 'register']);


// --- RUTE TERPROTEKSI (Wajib Login) ---
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Utama
    Route::get('/', [BarangController::class, 'dashboard'])->name('dashboard');

    // Inventory & Barang (CRUD)
    Route::get('/inventory', [BarangController::class, 'inventory'])->name('inventory');
    
    // Tambah Barang
    Route::get('/tambah-barang', function () {
        return view('barang.create');
    })->name('barang.create');
    Route::post('/simpan-barang', [BarangController::class, 'store'])->name('barang.store');
    
    // Edit Barang
    Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::post('/update-barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    
    // Hapus Barang
    Route::get('/hapus-barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Kasir & Penjualan
    Route::get('/kasir', [BarangController::class, 'kasir'])->name('kasir');
    Route::post('/proses-jual', [BarangController::class, 'prosesJual'])->name('proses.jual');

    // Laporan & Grafik
    Route::get('/laporan', [BarangController::class, 'barangLaku'])->name('laporan');
    Route::get('/grafik', [BarangController::class, 'tampilkanGrafik'])->name('grafik');
    
    // Akun & Keuntungan
    Route::get('/akun', [BarangController::class, 'akun'])->name('akun');
    Route::post('/proses-jual-massal', [BarangController::class, 'prosesJualMassal']);
    
    // Edit Profil User
    Route::get('/edit-profil', [BarangController::class, 'editProfil'])->name('profil.edit');
    Route::post('/update-profil', [BarangController::class, 'updateProfil'])->name('profil.update');
});