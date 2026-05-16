<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Fungsi untuk menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register'); // Pastikan file kamu ada di resources/views/auth/register.blade.php
    }

    // 2. Fungsi untuk memproses pendaftaran akun baru
    public function register(Request $request)
    {
        // Validasi data inputan dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' ini otomatis mengecek field password_confirmation
        ]);

        // Memasukkan data ke dalam tabel 'users' di database
        $user = User.create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password wajib di-hash/diacak biar aman
        ]);

        // Setelah berhasil daftar, otomatis loginkan user-nya
        Auth::login($user);

        // Lempar user ke halaman dashboard utama (route '/')
        return redirect('/')->with('success', 'Akun berhasil didaftarkan!');
    }
}