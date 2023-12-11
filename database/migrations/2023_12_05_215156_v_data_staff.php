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
        DB::statement("DROP VIEW IF EXISTS v_data_staff");

        DB::statement("
        CREATE VIEW v_data_staff AS
        SELECT s.*, p.nama_prodi, p.jenjang, u.email
        FROM staff s
        JOIN prodis p ON s.prodi_id = p.id_prodi
        JOIN users u ON s.user_id = u.id_user;

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
