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
        $procedure = "
        CREATE PROCEDURE p_perbarui_mahasiswa(
            IN p_nim_mahasiswa CHAR(9),
            IN p_nama_mahasiswa VARCHAR(255),
            IN p_email VARCHAR(255),
            IN p_prodi_id INT,
            IN p_id_user INT
        )
        BEGIN
            UPDATE mahasiswas
            SET
                NIM = p_nim_mahasiswa,
                nama_mahasiswa = p_nama_mahasiswa,
                prodi_id = p_prodi_id
            WHERE user_id= p_id_user;
            UPDATE users
            SET
                email = p_email
            WHERE id_user = p_id_user;
        END";

        \DB::unprepared( $procedure );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
