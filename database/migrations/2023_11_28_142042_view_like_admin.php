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
            CREATE VIEW top_like_tugas_akhir AS
            SELECT
                t.id_tugasakhir,
                t.judul,
                COUNT(l.id_like) AS total_likes
            FROM
                tugas_akhirs t
            LEFT JOIN
                likes l ON t.id_tugasakhir = l.tugasakhir_id
            GROUP BY
                t.id_tugasakhir, t.judul
            ORDER BY
                total_likes DESC
            LIMIT 3
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

