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
        // DB::statement("CREATE USER 'new_user'@'localhost' IDENTIFIED BY 'password'"); -> examples
        DB::statement("DROP USER IF EXISTS 'pengunjung'@'localhost' ");
        DB::statement("CREATE USER 'pengunjung'@'localhost' IDENTIFIED BY 'rahasia_pengunjung'");

        DB::statement("DROP USER IF EXISTS 'mahasiswa'@'localhost' ");
        DB::statement("CREATE USER 'mahasiswa'@'localhost' IDENTIFIED BY 'rahasia_mahasiswa'");

        DB::statement("DROP USER IF EXISTS 'dosen'@'localhost' ");
        DB::statement("CREATE USER 'dosen'@'localhost' IDENTIFIED BY 'rahasia_dosen'");

        DB::statement("DROP USER IF EXISTS 'staff'@'localhost' ");
        DB::statement("CREATE USER 'staff'@'localhost' IDENTIFIED BY 'rahasia_staff'");

        DB::statement("DROP USER IF EXISTS 'admin'@'localhost' ");  
        DB::statement("CREATE USER 'admin'@'localhost' IDENTIFIED BY 'rahasia_admin'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
