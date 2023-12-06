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
                IN new_namadosen VARCHAR(255),
                IN new_email VARCHAR(255)
                )

                BEGIN 

                UPDATE users SET email = new_email WHERE id_user = id;
                UPDATE dosens SET nama_dosen = new_namadosen WHERE user_id = id;

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
