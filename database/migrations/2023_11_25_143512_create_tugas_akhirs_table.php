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
        Schema::create('tugas_akhirs', function (Blueprint $table) {
            $table->increments('id_tugasakhir');
            $table->string('judul');
            $table->text('abstrak');
            $table->timestamp('date_added')->useCurrent();
            $table->year('tahun_terbit');
            $table->enum('tipe_ta', ['skripsi', 'tesis', 'disertasi']);

            $table->char('author', 9);
            $table->foreign('author')->references('NIM')->on('mahasiswas')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('id_kategori')->on('kategoris')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_akhirs');
    }
};
