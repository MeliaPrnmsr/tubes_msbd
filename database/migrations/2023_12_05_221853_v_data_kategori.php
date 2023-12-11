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
        DB::statement("DROP VIEW IF EXISTS v_data_kategori");

        DB::statement("
        CREATE VIEW v_data_kategori AS
        SELECT k.*, p.jenjang, p.nama_prodi
        FROM kategoris k
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
