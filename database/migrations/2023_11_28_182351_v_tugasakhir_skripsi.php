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
        DB::statement("DROP VIEW IF EXISTS v_tugasakhir_skripsi");

        DB::statement("
            CREATE VIEW v_tugasakhir_skripsi AS
            SELECT t.*, m.nama_mahasiswa AS nama_penulis
            FROM tugas_akhirs t
            JOIN mahasiswas m ON t.author = m.NIM
            WHERE t.tipe_ta = 'skripsi'
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
