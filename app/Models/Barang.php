<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    // Bagian ini yang krusial, harus daftar semua kolom yang boleh diisi
    protected $fillable = [
        'nama_barang',
        'foto',
        'harga_beli',
        'harga_jual',
        'stok',
    ];
    //
}
