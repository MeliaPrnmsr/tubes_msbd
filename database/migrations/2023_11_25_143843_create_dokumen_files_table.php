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
        Schema::create('dokumen_files', function (Blueprint $table) {
            $table->increments('id_file');
            $table->string('file_metodologi');

            $table->string('bab1');
            $table->string('bab2');
            $table->string('bab3');
            $table->string('bab4');
            $table->string('bab5');

            $table->string('file_daftarpustaka');
            
            $table->unsignedInteger('tugasakhir_id');
            $table->foreign('tugasakhir_id')->references('id_tugasakhir')->on('tugas_akhirs')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_files');
    }
};
