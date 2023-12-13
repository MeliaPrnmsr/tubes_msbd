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
            SELECT t.id_tugasakhir AS id_tugasakhir,
            t.judul AS judul,
            t.abstrak AS abstrak,
            t.sampul AS sampul,
            t.date_added AS data_added,
            t.tahun_terbit AS tahun_terbit,
            t.tipe_ta AS tipe_ta,
            m.nama_mahasiswa AS author,
            k.nama_kategori AS nama_kategori

            FROM tugas_akhirs t JOIN mahasiswas m ON t.author = m.nim
            JOIN kategoris k ON t.kategori_id = k.id_kategori

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
