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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments('id_boomark');
            $table->date('tanggal');
           
            $table->unsignedInteger('tugasakhir_id');
            $table->foreign('tugasakhir_id')->references('id_tugasakhir')->on('tugas_akhirs')->onUpdate('cascade');

            $table->unsignedInteger('user_id');            
            $table->foreign('user_id')->references('id_user')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
