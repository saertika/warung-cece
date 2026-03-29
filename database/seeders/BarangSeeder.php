<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataBarang = [
            [
                'nama_barang' => 'Chocolate DairyMilk',
                'harga' => 10000,
                'stok' => 10,
                'status' => 'Menipis'
            ],
            [
                'nama_barang' => 'Indomie Pop Mie',
                'harga' => 8000,
                'stok' => 12,
                'status' => 'Menipis'
            ],
            [
                'nama_barang' => 'Minerale',
                'harga' => 5000,
                'stok' => 20,
                'status' => 'Aman'
            ],
            [
                'nama_barang' => 'Chitato Snack',
                'harga' => 8000,
                'stok' => 20,
                'status' => 'Aman'
            ],
            [
                'nama_barang' => 'Roti Keju',
                'harga' => 5000,
                'stok' => 20,
                'status' => 'Aman'
            ],
        ];

        foreach ($dataBarang as $item) {
            Barang::create($item);
        }
        //
    }
}
