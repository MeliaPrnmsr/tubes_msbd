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
        DB::statement('
        CREATE VIEW view_cari_mahasiswa AS
        SELECT
            mahasiswas.NIM,
            mahasiswas.nama_mahasiswa,
            prodis.nama_prodi
        FROM
            mahasiswas
        JOIN
            prodis ON mahasiswas.prodi_id = prodis.id_prodi
        ');
    }


    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
