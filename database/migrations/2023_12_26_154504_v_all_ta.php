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
        DB::statement("DROP VIEW IF EXISTS v_semua_tugasakhir");

        DB::statement("
        CREATE VIEW v_semua_tugasakhir AS 
            SELECT DISTINCT
                ta.*, m.nama_mahasiswa, df.*, k.nama_kategori, p.nama_prodi, p.jenjang
            FROM tugas_akhirs ta
            JOIN mahasiswas m ON ta.author = m.NIM
            JOIN dokumen_files df ON ta.id_tugasakhir = df.tugasakhir_id
            JOIN kategoris k ON ta.kategori_id = k.id_kategori
            JOIN prodis p ON k.prodi_id = p.id_prodi;
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
