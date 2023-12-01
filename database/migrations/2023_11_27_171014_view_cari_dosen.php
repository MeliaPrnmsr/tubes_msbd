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
        CREATE VIEW view_cari_dosen AS
        SELECT
            dosens.NIP,
            dosens.nama_dosen,
            prodis.nama_prodi
        FROM
            dosens
        JOIN
            prodis ON dosens.prodi_id = prodis.id_prodi
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
