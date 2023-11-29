<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_tugasakhir_kategori");

        DB::statement("
        CREATE VIEW v_tugasakhir_kategori AS
        SELECT t.*, m.nama_mahasiswa AS nama_penulis, k.nama_kategori AS nama_kategori
        FROM tugas_akhirs t
        JOIN mahasiswas m ON t.author = m.NIM
        JOIN kategoris k ON t.kategori_id = k.id_kategori
        WHERE t.kategori_id IS NOT NULL
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
