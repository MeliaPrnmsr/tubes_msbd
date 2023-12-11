<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        DB::statement("DROP VIEW IF EXISTS profil_dosen");

        DB::statement("
            CREATE VIEW profil_dosen AS 
            SELECT d.*,
                   u.email AS email,
                   p.nama_prodi AS nama_prodi,
                   dp.NIM AS NIM, 
                   m.nama_mahasiswa AS nama_mahasiswa,   
                   ta.judul AS judul,
                   ta.tahun_terbit AS tahun_terbit
            FROM dosens d JOIN users u ON d.user_id = u.id_user 
                 JOIN prodis p ON d.prodi_id = p.id_prodi 
                 JOIN dosenpembimbings dp ON d.kode_dosen = dp.kode_dosen
                 JOIN mahasiswas m ON m.prodi_id = p.id_prodi
                 JOIN tugas_akhirs ta ON m.NIM = ta.author;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
