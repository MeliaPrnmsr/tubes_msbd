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
        CREATE TRIGGER log_mahasiswa_after_update AFTER UPDATE ON mahasiswas
        FOR EACH ROW
        BEGIN
            INSERT INTO log_akuns (action, waktu, sebelum, sesudah, deskripsi)
            VALUES ("UPDATE",NOW(), 
            CONCAT("NIM: ", OLD.NIM, ", Nama: ", OLD.nama_mahasiswa, ", Foto: ", OLD.foto, ", User ID: ", OLD.user_id, ", Prodi ID: ", OLD.prodi_id), 
            CONCAT("NIM: ", NEW.NIM, ", Nama: ", NEW.nama_mahasiswa, ", Foto: ", NEW.foto, ", User ID: ", NEW.user_id, ", Prodi ID: ", NEW.prodi_id),
            "UPDATE data mahasiswa");
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS log_mahasiswa_after_update');
    }
};
