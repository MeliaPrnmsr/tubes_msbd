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
        $p_user_dosen = "DROP PROCEDURE IF EXISTS `p_tambah_user_dosen`;
        CREATE PROCEDURE `p_tambah_user_dosen`(IN `p_username` VARCHAR(255),
        IN `p_email` VARCHAR(255),
        IN `p_password` VARCHAR(255),
        IN `p_role` VARCHAR(20),
        IN `p_kode_dosen` CHAR(5),
        IN `p_NIP` CHAR(20),
        IN `p_NIDN` CHAR(10),
        IN `p_nama_dosen` VARCHAR(255),
        IN `p_prodi_id` INT(11))

        BEGIN
            DECLARE user_id INT;

            INSERT INTO users(username, email, password, role)
            VALUES (p_username, p_email, p_password, p_role);

            SET user_id = LAST_INSERT_ID();

            INSERT INTO dosens(kode_dosen, NIP, NIDN, nama_dosen, user_id, prodi_id)
            VALUES (p_kode_dosen, p_NIP, p_NIDN, p_nama_dosen, user_id, p_prodi_id);
        END";
        \DB::unprepared($p_user_dosen);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
