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
        $p_editprofil_dosen = "DROP PROCEDURE IF EXISTS `p_editprofil_dosen`;
        CREATE PROCEDURE `p_editprofil_dosen`(
            IN `user_id_update` INT(11), 
            IN `email_baru` VARCHAR(255),
            IN `nama_baru` VARCHAR(255),
            IN `foto_baru` VARCHAR(255))
        BEGIN
            UPDATE users
            SET email = email_baru
            WHERE id_user = user_id_update;
            UPDATE dosens
            SET nama_dosen = nama_baru,
                foto = foto_baru
            WHERE user_id = user_id_update;
        END";
        \DB::unprepared( $p_editprofil_dosen );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
