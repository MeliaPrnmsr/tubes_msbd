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
        DB::statement("DROP VIEW IF EXISTS v_tugasakhir_terpopuler");

        DB::statement("
        CREATE VIEW v_tugasakhir_terpopuler AS
        SELECT 
            t.id_tugasakhir,
            t.judul,
            t.tahun_terbit,
            t.author AS NIM,
            m.nama_mahasiswa,
            COUNT(l.id_like) AS jumlah_like
        FROM 
            tugas_akhirs t
        JOIN 
            mahasiswas m ON t.author = m.NIM
        LEFT JOIN 
            likes l ON t.id_tugasakhir = l.tugasakhir_id
        GROUP BY 
            t.id_tugasakhir, t.judul, t.tahun_terbit, t.author, m.nama_mahasiswa
        ORDER BY 
            COUNT(l.id_like) DESC;
    
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
