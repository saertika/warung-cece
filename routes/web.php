<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

// Baris ini sangat penting! 
// Ini artinya: Kalau orang buka alamat utama (localhost:8000), 
// arahkan ke fungsi 'index' yang ada di BarangController.
Route::get('/', [BarangController::class, 'index']);
Route::get('/inventory', [BarangController::class, 'inventory']);
Route::get('/akun', [BarangController::class, 'akun']);
Route::get('/tambah-barang', function () {
    return view('barang.create');
});
Route::post('/simpan-barang', [BarangController::class, 'store']);
// Edit & Update
Route::get('/edit-barang/{id}', [BarangController::class, 'edit']);
Route::post('/update-barang/{id}', [BarangController::class, 'update']);

// Hapus
Route::get('/hapus-barang/{id}', [BarangController::class, 'destroy']);
// Halaman untuk memilih barang yang mau dijual
Route::get('/kasir', [BarangController::class, 'kasir']);

// Proses pengurangannya (pakai POST karena kirim data form)
Route::post('/proses-jual', [BarangController::class, 'prosesJual']);
Route::get('/', [BarangController::class, 'dashboard']);