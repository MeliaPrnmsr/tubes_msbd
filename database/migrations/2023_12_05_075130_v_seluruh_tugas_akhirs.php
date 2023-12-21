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
        DB::statement("DROP VIEW IF EXISTS v_seluruh_tugas_akhirs");

        DB::statement("
        CREATE VIEW v_seluruh_tugas_akhirs AS 
        SELECT DISTINCT
            ta.*, m.nama_mahasiswa, df.*, k.nama_kategori,
            d1.nama_dosen AS nama_dosen_dospem1,
            d2.nama_dosen AS nama_dosen_dospem2
        FROM tugas_akhirs ta
        JOIN mahasiswas m ON ta.author = m.NIM
        JOIN dosenpembimbings dp1 ON ta.author = dp1.NIM AND dp1.status_pembimbing = 'dospem1'
        JOIN dosenpembimbings dp2 ON ta.author = dp2.NIM AND dp2.status_pembimbing = 'dospem2'
        JOIN dosens d1 ON dp1.kode_dosen = d1.kode_dosen
        JOIN dosens d2 ON dp2.kode_dosen = d2.kode_dosen
        JOIN dokumen_files df ON ta.id_tugasakhir = df.tugasakhir_id
        JOIN kategoris k ON ta.kategori_id = k.id_kategori;
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
