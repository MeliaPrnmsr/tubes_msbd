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
        Schema::create('dosenpembimbings', function (Blueprint $table) {
            $table->increments('id_dosen_pembimbing');
            $table->char('NIM', 9);
            $table->foreign('NIM')->references('NIM')->on('mahasiswas')->onUpdate('cascade')->onDelete('restrict'); //reference ke tbl_mahasiswas
            
            $table->char('kode_dosen', 5);
            $table->foreign('kode_dosen')->references('kode_dosen')->on('dosens')->onUpdate('cascade')->onDelete('restrict');
            
            $table->enum('status_pembimbing', ['dospem1', 'dospem2']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosenpembimbings');
    }
};
