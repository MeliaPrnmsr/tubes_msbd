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
        $p_tambah_tugasakhir = "DROP PROCEDURE IF EXISTS `p_tambah_tugas_akhir_s3`;
        CREATE PROCEDURE `p_tambah_tugas_akhir_s3`(
        IN `p_judul` VARCHAR(255),
        IN `p_abstrak` TEXT,
        IN `p_sampul` VARCHAR(255),
        IN `p_tipe_ta` VARCHAR(50),
        IN `p_author` CHAR(9),
        IN `p_kategori` INT(11),
        IN `p_promotor1` CHAR(5),
        IN `p_promotor2` CHAR(5),
        IN `p_promotor3` CHAR(5),
        IN `p_tahun_terbit` INT(5),
        IN `p_file_metodologi` VARCHAR(255),
        IN `p_file_pustaka` VARCHAR(255),
        IN `p_bab1` VARCHAR(255),
        IN `p_bab2` VARCHAR(255),
        IN `p_bab3` VARCHAR(255),
        IN `p_bab4` VARCHAR(255),
        IN `p_bab5` VARCHAR(255))
        BEGIN
            DECLARE tugas_akhir_id INT(10);

            INSERT INTO tugas_akhirs (judul, abstrak, sampul, date_added, tahun_terbit, tipe_ta, author, kategori_id)
            VALUES (p_judul, p_abstrak, p_sampul, NOW(), p_tahun_terbit, p_tipe_ta, p_author, p_kategori);

            SET tugas_akhir_id = LAST_INSERT_ID();

            INSERT INTO dosenpembimbings (NIM, kode_dosen, status_pembimbing)
            VALUES (p_author, p_promotor1, 'promotor1'), (p_author, p_promotor2, 'promotor2'), (p_author, p_promotor3, 'promotor3');

            INSERT INTO dokumen_files (file_metodologi, bab1, bab2, bab3, bab4, bab5, file_daftarpustaka, tugasakhir_id)
            VALUES (p_file_metodologi, p_bab1, p_bab2, p_bab3, p_bab4, p_bab5, p_file_pustaka, tugas_akhir_id);

        END";
        \DB::unprepared($p_tambah_tugasakhir);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
