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
        
            CREATE VIEW judul_baru_ditambahkan AS
            SELECT
                id_tugasakhir, judul, date_added
            FROM
                tugas_akhirs
            ORDER BY
                date_added DESC
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
