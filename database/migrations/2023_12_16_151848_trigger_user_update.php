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
        CREATE TRIGGER tr_update_user AFTER UPDATE ON users
        FOR EACH ROW
        BEGIN
            INSERT INTO log_akuns (action, waktu, deskripsi, sebelum, sesudah)
            VALUES (
                "update",
                NOW(),
                CONCAT("Perubahan pada user dengan username = ", OLD.username),
                CONCAT("Username: ", OLD.username, ", Role: ", OLD.role, ", Email: ", OLD.email),
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
    DB::unprepared('DROP TRIGGER IF EXISTS tr_update_user');
}

};
