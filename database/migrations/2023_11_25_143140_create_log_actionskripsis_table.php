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
        Schema::create('log_actionskripsis', function (Blueprint $table) {
            $table->string('action');
            $table->date('waktu');
            $table->string('sebelum')->nullable();
            $table->string('sesudah')->nullable();
            $table->text('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_actionskripsis');
    }
};
