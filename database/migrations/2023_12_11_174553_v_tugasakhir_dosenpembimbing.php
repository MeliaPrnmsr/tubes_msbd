<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_tugasakhir_dospem");

        DB::statement("
        CREATE VIEW v_tugasakhir_dospem AS
        SELECT ta.id_tugasakhir, ta.judul, ta.abstrak, ta.sampul, ta.date_added, ta.tahun_terbit, ta.tipe_ta, ta.author, dp.kode_dosen
        FROM tugas_akhirs ta
        INNER JOIN dosenpembimbings dp ON ta.author = dp.NIM
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
