<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        DB::statement("DROP VIEW IF EXISTS tampil_tugas_akhir");

        DB::statement("
            CREATE VIEW tampil_tugas_akhir AS 
            SELECT t.id_tugasakhir AS id,
                   t.judul AS judul,
                   t.abstrak AS abstrak,
                   t.tahun_terbit AS tahun_terbit,
                   t.tipe_ta AS tipe_ta,
                   t.date_added AS date_added,
                   k.nama_kategori AS kategori, 
                   m.NIM AS NIM,
                   m.nama_mahasiswa AS nama_mahasiswa,
                   p.jenjang AS jenjang,
                   p.nama_prodi AS nama_prodi
            FROM tugas_akhirs t JOIN kategoris k ON t.kategori_id = k.id_kategori 
                 JOIN mahasiswas m ON t.author = m.NIM 
                 JOIN prodis p ON m.prodi_id = p.id_prodi;
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
