<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        $p_user_staff = "DROP PROCEDURE IF EXISTS `p_tambah_user_staff`;
        CREATE PROCEDURE `p_tambah_user_staff`(IN `p_username` VARCHAR(255), IN `p_email` VARCHAR(255), IN `p_password` VARCHAR(255), IN `p_role` VARCHAR(50), IN `p_kode_staff` CHAR(5), IN `p_nama_staff` VARCHAR(255), IN `p_prodi_id` INT(11))
        BEGIN
            DECLARE user_id INT;

            INSERT INTO users(username, email, password, role)
            VALUES (p_username, p_email, p_password, p_role);

            SET user_id = LAST_INSERT_ID();

            INSERT INTO staff(kode_staff, nama_staff, user_id, prodi_id)
            VALUES (p_kode_staff, p_nama_staff, user_id, p_prodi_id);
        END";
        \DB::unprepared($p_user_staff);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
    }
};
