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
        //pengunjung
            //tabel
            DB::statement(" GRANT SELECT ON tubes_repository.tugas_akhirs TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.dosenpembimbings TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.dokumen_files TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.kategoris TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.prodis TO 'pengunjung'@'localhost' ");
            //view
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_terpopuler TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_semua_tugasakhir TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_tugasakhir TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_disertasi TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_pertahunterbit TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_kategori TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_skripsi TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_tesis TO 'pengunjung'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_disertasi TO 'pengunjung'@'localhost' ");

        //mahasiswa
            //view
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_terpopuler TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_semua_tugasakhir TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_tugasakhir TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_disertasi TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_pertahunterbit TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_kategori TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_skripsi TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_tesis TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_disertasi TO 'mahasiswa'@'localhost' ");

            //tabel
            DB::statement(" GRANT SELECT ON tubes_repository.tugas_akhirs TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.kategoris TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.prodis TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.likes TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.bookmarks TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT, UPDATE ON tubes_repository.users TO 'mahasiswa'@'localhost' ");
            DB::statement(" GRANT SELECT, UPDATE ON tubes_repository.mahasiswas TO 'mahasiswa'@'localhost' ");

            //procedure
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_update_profilMhs TO 'mahasiswa'@'localhost' ");
        
        
        

        //dosen
            //view
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_terpopuler TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_semua_tugasakhir TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_tugasakhir TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_disertasi TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_pertahunterbit TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_kategori TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_skripsi TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_tesis TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_disertasi TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_dosen TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_tugasakhir_dospem TO 'dosen'@'localhost' ");

            //tabel
            DB::statement(" GRANT SELECT ON tubes_repository.tugas_akhirs TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.kategoris TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.prodis TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.likes TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.bookmarks TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT, UPDATE ON tubes_repository.users TO 'dosen'@'localhost' ");
            DB::statement(" GRANT SELECT, UPDATE ON tubes_repository.dosens TO 'dosen'@'localhost' ");

            //procedure
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_editprofil_dosen TO 'dosen'@'localhost' ");

        //staff
            //tabel
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.tugas_akhirs TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.users TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.mahasiswas TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.dosens TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.dosenpembimbings TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_repository.dokumen_files TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.staff TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.kategoris TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.prodis TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.likes TO 'staff'@'localhost' ");

            //view
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_dosen TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_mahasiswa TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_tugasakhir TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.v_data_disertasi TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.top_like_tugas_akhir TO 'staff'@'localhost' ");
            DB::statement(" GRANT SELECT ON tubes_repository.log_likes TO 'staff'@'localhost' ");

            //procedure
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_tambah_user_mahasiswa TO 'staff'@'localhost' ");
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_perbarui_mahasiswa TO 'staff'@'localhost' ");
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_tambah_user_dosen TO 'staff'@'localhost' ");
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_perbarui_dosen TO 'staff'@'localhost' ");
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_tambah_tugas_akhir TO 'staff'@'localhost' ");
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_tambah_tugas_akhir_s3 TO 'staff'@'localhost' ");
            DB::statement(" GRANT EXECUTE ON PROCEDURE tubes_repository.p_perbarui_tugas TO 'staff'@'localhost' ");


        //admin
            DB::statement(" GRANT ALL PRIVILEGES ON tubes_repository.* TO 'admin'@'localhost' ");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
