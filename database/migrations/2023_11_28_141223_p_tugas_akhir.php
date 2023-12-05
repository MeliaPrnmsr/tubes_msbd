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
        $p_tambah_tugasakhir = "DROP PROCEDURE IF EXISTS `p_tambah_tugas_akhir`;
        CREATE PROCEDURE `p_tambah_tugas_akhir`(IN `p_judul` VARCHAR(255),
        IN `p_abstrak` TEXT,
        IN `p_sampul` VARCHAR(255),
        IN `p_tipe_ta` VARCHAR(50),
        IN `p_author` CHAR(9),
        IN `p_kategori` INT(11),
        IN `p_dospem1` CHAR(5),
        IN `p_dospem2` CHAR(5),
        IN `p_tahun_terbit` INT(5),
        IN `p_file_metodologi` VARCHAR(255), IN `p_file_pustaka` VARCHAR(255), IN `p_file_tugasakhir` VARCHAR(255))
        BEGIN
            DECLARE tugas_akhir_id INT(10);

            INSERT INTO tugas_akhirs (judul, abstrak, sampul, date_added, tahun_terbit, tipe_ta, author, kategori_id)
            VALUES (p_judul, p_abstrak, p_sampul, NOW(), p_tahun_terbit, p_tipe_ta, p_author, p_kategori);

            SET tugas_akhir_id = LAST_INSERT_ID();

            INSERT INTO dosenpembimbings (NIM, kode_dosen, status_pembimbing)
            VALUES (p_author, p_dospem1, 'dospem1'), (p_author, p_dospem2, 'dospem2');

            INSERT INTO dokumen_files (file_metodologi, file_tugasakhir, file_daftarpustaka, tugasakhir_id)
            VALUES (p_file_metodologi, p_file_tugasakhir, p_file_pustaka, tugas_akhir_id);

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
