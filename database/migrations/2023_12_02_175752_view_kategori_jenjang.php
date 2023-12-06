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
        DB::statement("
        CREATE VIEW view_kategori_jenjang AS
        SELECT k.id_kategori, k.nama_kategori, p.jenjang, p.nama_prodi
        FROM kategoris k
        JOIN prodis p ON k.prodi_id = p.id_prodi
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
