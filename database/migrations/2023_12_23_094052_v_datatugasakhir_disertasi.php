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
        DB::statement("DROP VIEW IF EXISTS v_data_disertasi");

        DB::statement("
        CREATE VIEW v_data_disertasi AS 
            SELECT DISTINCT
                ta.*, m.nama_mahasiswa, df.*, k.nama_kategori,
                d1.nama_dosen AS nama_promotor1,
                d2.nama_dosen AS nama_promotor2,
                d3.nama_dosen AS nama_promotor3

            FROM tugas_akhirs ta
            JOIN mahasiswas m ON ta.author = m.NIM

            JOIN dosenpembimbings pr1 ON ta.author = pr1.NIM AND pr1.status_pembimbing = 'promotor1'
            JOIN dosenpembimbings pr2 ON ta.author = pr2.NIM AND pr2.status_pembimbing = 'promotor2'
            JOIN dosenpembimbings pr3 ON ta.author = pr3.NIM AND pr3.status_pembimbing = 'promotor3'

            JOIN dosens d1 ON pr1.kode_dosen = d1.kode_dosen
            JOIN dosens d2 ON pr2.kode_dosen = d2.kode_dosen
            JOIN dosens d3 ON pr3.kode_dosen = d3.kode_dosen

            JOIN dokumen_files df ON ta.id_tugasakhir = df.tugasakhir_id

            JOIN kategoris k ON ta.kategori_id = k.id_kategori
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
