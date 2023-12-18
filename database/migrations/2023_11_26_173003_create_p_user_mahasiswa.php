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
        $p_user_mahasiswa = "DROP PROCEDURE IF EXISTS `p_tambah_user_mahasiswa`;
                CREATE PROCEDURE `p_tambah_user_mahasiswa`(
                IN `p_NIM` CHAR(9),
                IN `p_nama_mahasiswa` VARCHAR(255),
                IN `p_username` VARCHAR(255),
                IN `p_email` VARCHAR(255),
                IN `p_password` VARCHAR(255),
                IN `p_role` VARCHAR(20),
                IN `p_prodi_id` INT(11))
                BEGIN
                    DECLARE id_user_baru INT;
                
                    INSERT INTO users (username, email, password, role, created_at, updated_at)
                    VALUES (p_username, p_email, p_password, p_role, NOW(), NOW());
                    SET id_user_baru = LAST_INSERT_ID();
                
                    INSERT INTO mahasiswas (NIM, nama_mahasiswa, user_id, prodi_id)
                    VALUES (p_NIM, p_nama_mahasiswa, id_user_baru, p_prodi_id);
                END";
                \DB::unprepared($p_user_mahasiswa);
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_user_mahasiswa');
    }
};
