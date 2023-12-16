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
        $procedure = " DROP PROCEDURE IF EXISTS p_perbarui_dosen;
        CREATE PROCEDURE p_perbarui_dosen(
            IN p_kode_dosen CHAR(5),
            IN p_nama_dosen VARCHAR(255),
            IN p_NIP CHAR(20),
            IN p_NIDN CHAR(12),
            IN p_email VARCHAR(255),
            IN p_prodi_id INT,
            IN p_id_user INT
        )
        BEGIN
            UPDATE dosens
            SET
                kode_dosen = p_kode_dosen,
                nama_dosen = p_nama_dosen,
                NIP = p_NIP,
                NIDN = p_NIDN,
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
