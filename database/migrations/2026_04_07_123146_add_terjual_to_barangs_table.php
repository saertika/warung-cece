<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ganti 'create' jadi 'table' biar dia cuma modifikasi
        Schema::table('barangs', function (Blueprint $table) {
            // Cek dulu biar nggak dobel kolomnya
            if (!Schema::hasColumn('barangs', 'terjual')) {
                $table->integer('terjual')->default(0)->after('stok');
            }
        });
    }

    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn('terjual');
        });
    }
};