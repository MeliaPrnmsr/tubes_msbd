<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_user_insert AFTER INSERT ON users
            FOR EACH ROW
            BEGIN
                INSERT INTO log_akuns (action, waktu, deskripsi, sebelum, sesudah)
                VALUES (
                    "INSERT",
                    NOW(),
                    CONCAT("Penambahan user dengan role = ", NEW.role),
                    NULL,
                    CONCAT("Username: ", NEW.username, ", Role: ", NEW.role, ", Email: ", NEW.email)
                );
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_insert_user');
    }
};
