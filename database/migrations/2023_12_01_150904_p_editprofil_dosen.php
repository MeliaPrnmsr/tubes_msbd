<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("DROP PROCEDURE IF EXISTS editprofil_dosen");

        DB::statement("
            CREATE PROCEDURE p_editprofil_dosen(
                IN id INT,
                IN new_namadosen VARCHAR(255) NOT NULL,
                IN new_email VARCHAR(255) NOT NULL)

                BEGIN 

                UPDATE users SET email = new_email WHERE id = id_user;
                UPDATE dosens SET nama_dosen = new_namadosen WHERE id = user_id;

                END
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
