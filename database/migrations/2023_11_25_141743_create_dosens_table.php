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
        Schema::create('dosens', function (Blueprint $table) {
            $table->char('kode_dosen', 5)->primary();
            $table->char('NIP', 20)->unique();
            $table->char('NIDN', 12)->unique();
            $table->string('nama_dosen');
            $table->string('foto')->nullable();
            
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id_user')->on('users')->onUpdate('cascade');

            $table->unsignedInteger('prodi_id');
            $table->foreign('prodi_id')->references('id_prodi')->on('prodis')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
