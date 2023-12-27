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
        DB::unprepared('
            DROP TRIGGER IF EXISTS trigger_ta_insert;
            CREATE TRIGGER trigger_ta_insert AFTER INSERT ON tugas_akhirs FOR EACH ROW
            BEGIN 
            INSERT INTO log_tugas_akhir (action, waktu, deskripsi, sebelum, sesudah)
                VALUES (
                    "INSERT", NOW(),
                    CONCAT("Penambahan Tugas Akhir = ", NEW.tipe_ta),
                    NULL,
                    CONCAT("Judul : ", NEW.judul,
                           "Abstrak : ", NEW.abstrak,
                           "Sampul : ", NEW.sampul,
                           "Tahun Terbit : ", NEW.tahun_terbit,
                           "Author : ", NEW.author)
                );
            END
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
