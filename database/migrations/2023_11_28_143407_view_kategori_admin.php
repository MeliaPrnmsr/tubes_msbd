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

        CREATE VIEW view_kategori_admin AS
        SELECT
        p.jenjang,
        p.nama_prodi,
        k.nama_kategori
    FROM
        prodis p
    JOIN
        kategoris k ON k.prodi_id = p.id_prodi
    WHERE
        p.id_prodi IN 
        (
            SELECT
            DISTINCT 
            prodi_id
            FROM 
            kategoris
        )
        
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
