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
        CREATE TRIGGER trg_after_insert_like
        AFTER INSERT ON likes
        FOR EACH ROW
        BEGIN
            DECLARE uname VARCHAR(255);
            DECLARE judul_ta VARCHAR(255);

            SELECT username INTO uname
            FROM users
            WHERE id_user = NEW.user_id;

            SELECT judul INTO judul_ta
            FROM tugas_akhirs
            WHERE id_tugasakhir = NEW.tugasakhir_id;

            INSERT INTO log_likes (username, judul, waktu_dibuat)
            VALUES (uname, judul_ta, NOW());
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
