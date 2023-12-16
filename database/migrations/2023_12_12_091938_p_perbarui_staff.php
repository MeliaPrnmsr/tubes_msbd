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
        $procedure = " DROP PROCEDURE IF EXISTS p_perbarui_staff;
        CREATE PROCEDURE p_perbarui_staff(
            IN p_kode_staff CHAR(5),
            IN p_nama_staff VARCHAR(255),
            IN p_email VARCHAR(255),
            IN p_prodi_id INT,
            IN p_id_user INT
        )
        BEGIN
            UPDATE staff
            SET
                kode_staff = p_kode_staff,
                nama_staff = p_nama_staff,
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
