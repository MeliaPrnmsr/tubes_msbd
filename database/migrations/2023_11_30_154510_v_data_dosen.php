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
        DB::statement("DROP VIEW IF EXISTS v_data_dosen");

        DB::statement("
        CREATE VIEW v_data_dosen AS
        SELECT d.*, p.nama_prodi, p.jenjang, u.email
        FROM dosens d
        JOIN prodis p ON d.prodi_id = p.id_prodi
        JOIN users u ON d.user_id = u.id_user;

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
