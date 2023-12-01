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
        CREATE VIEW view_cari_tugas AS
        SELECT
           id_tugasakhir, judul, tipe_ta, tahun_terbit
        FROM
            tugas_akhirs
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