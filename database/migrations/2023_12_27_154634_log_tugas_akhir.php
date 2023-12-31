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
        Schema::create('log_tugas_akhirs', function (Blueprint $table) {
            $table->string('action');
            $table->date('waktu');
            $table->text('deskripsi');
            $table->string('sebelum')->nullable();
            $table->string('sesudah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
