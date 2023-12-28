<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS trigger_ta_update;
            CREATE TRIGGER trigger_ta_update AFTER UPDATE ON tugas_akhirs FOR EACH ROW
            BEGIN 
            INSERT INTO log_tugas_akhir (action, waktu, deskripsi, sebelum, sesudah)
                VALUES (
                    "UPDATE", NOW(),
                    CONCAT("Perubahan Tugas Akhir = ", OLD.tipe_ta),
                    CONCAT("Judul : ", OLD.judul,
                           "Abstrak : ", OLD.abstrak,
                           "Sampul : ", OLD.sampul,
                           "Tahun Terbit : ", OLD.tahun_terbit,
                           "Author : ", OLD.author),
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
