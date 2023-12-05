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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('NIM', 9)->primary();
            $table->string('nama_mahasiswa');
            $table->string('foto')->nullable();
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('alamat');

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
        Schema::dropIfExists('mahasiswas');
    }
};
