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
        DB::unprepared('
        CREATE TRIGGER log_mahasiswa_after_insert AFTER INSERT ON mahasiswas
        FOR EACH ROW
        BEGIN
            INSERT INTO log_akuns (waktu, deskripsi, sebelum, sesudah)
            VALUES (NOW(), "INSERT data mahasiswa", NULL, 
            CONCAT("NIM: ", NEW.NIM, ", Nama: ", NEW.nama_mahasiswa, ", Foto: ", NEW.foto, ", User ID: ", NEW.user_id, ", Prodi ID: ", NEW.prodi_id));
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
