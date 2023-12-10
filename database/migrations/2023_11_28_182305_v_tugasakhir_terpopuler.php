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
            SELECT `likes`.`tugasakhir_id` AS `tugasakhir_id`, COUNT(`likes`.`id_like`) AS `jumlah_like`
            FROM `likes`
            GROUP BY `likes`.`tugasakhir_id`
            ORDER BY COUNT(`likes`.`id_like`) DESC
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
