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
        DB::statement("
        CREATE VIEW view_staff_admin AS
        SELECT staff.kode_staff,staff.nama_staff, staff.foto, prodis.nama_prodi, users.username
        FROM staff
        JOIN prodis ON staff.prodi_id = prodis.id_prodi
        JOIN users ON staff.user_id = users.id_user
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
