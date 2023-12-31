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
        DROP PROCEDURE IF EXISTS p_perbarui_tugas;
        CREATE PROCEDURE p_perbarui_tugas(
            IN p_judul VARCHAR(255),
            IN p_abstrak TEXT,
            IN p_sampul VARCHAR(255),
            IN p_tipe_ta VARCHAR(50),
            IN p_author CHAR(9),
            IN p_kategori INT,
            IN p_tahun_terbit INT(5),
            IN p_file_pustaka VARCHAR(255), 
            IN `p_bab1` VARCHAR(255),
            IN `p_bab2` VARCHAR(255),
            IN `p_bab3` VARCHAR(255),
            IN `p_bab4` VARCHAR(255),
            IN `p_bab5` VARCHAR(255),
            IN p_id_tugasakhir INT
        )
        BEGIN
            UPDATE tugas_akhirs 
            SET
                judul = p_judul,
                abstrak = p_abstrak,
                sampul = p_sampul,
                tahun_terbit = p_tahun_terbit,
                tipe_ta = p_tipe_ta,
                author = p_author,
                kategori_id = p_kategori
            WHERE
                id_tugasakhir = p_id_tugasakhir;
            UPDATE dokumen_files 
            SET
                bab1 = p_bab1,
                bab2 = p_bab2,
                bab3 = p_bab3,
                bab4 = p_bab4,
                bab5 = p_bab5,
                file_daftarpustaka = p_file_pustaka
            WHERE
                tugasakhir_id = p_id_tugasakhir;
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