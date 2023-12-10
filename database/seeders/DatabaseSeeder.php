<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kategori;
use App\Models\TugasAkhir;
use App\Models\Dosenpembimbing;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => "SerafimSitorus", 
            'email' => "edgar@gmail.com",
            'password' => bcrypt('serafim'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "MeliaSihombing", 
            'email' => "melia@gmail.com",
            'password' => bcrypt('melia'),
            'role' => "admin"
        ]);

        User::create([
            'username' => "DeddyArisandi", 
            'email' => "deddy@gmail.com",
            'password' => bcrypt('deddy'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "SabrinaSiahaan", 
            'email' => "sabrina@gmail.com",
            'password' => bcrypt('sabrina'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "GylbertSitorus", 
            'email' => "chrismiguel@gmail.com",
            'password' => bcrypt('miguel'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "Yeni Aulia Sinaga", 
            'email' => "yeni@gmail.com",
            'password' => bcrypt('serafim'),
            'role' => "mahasiswa"
        ]);

        
        Prodi::create([
            'jenjang' => "S1",
            'nama_prodi' => "Teknologi Informasi",
            'alamat_prodi' => "Gedung C Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155"
        ]); 
        
        Prodi::create([
            'jenjang' => "S1",
            'nama_prodi' => "Ilmu Komputer",
            'alamat_prodi' => "Gedung D Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155"
        ]);
        
        Mahasiswa::create([
            'nim' => "221402078",
            'nama_mahasiswa' => "Sabrina Marisi Siahaan",
            'user_id' => "2",
            'prodi_id' => "1"
        ]);
        
        Mahasiswa::create([
            'nim' => "221402133",
            'nama_mahasiswa' => "Serafim Edgar Pandamei Sitorus",
            'user_id' => "1",
            'prodi_id' => "1"
        ]);

        Dosen::create([
            'kode_dosen' => "DDY",
            'NIP' => "197908312009121002",
            'NIDN' => "0031087905",
            'nama_dosen' => "Deddy Arisandi",
            'user_id' => 3,
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Data Science",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Software Engineer",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Computer Vision",
            'prodi_id' => 1
        ]);
            
        TugasAkhir::create([
            'judul' => "Kesadaran banyak orang akan teknologi iron dome",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2002,
            'tipe_ta' => "skripsi",
            'author' => "221402133",
            'kategori_id' => 1
        ]);

        TugasAkhir::create([
            'judul' => "Perdamaian Israel dan Palestina atas Partisipan Serafim Sitorus",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2027,
            'tipe_ta' => "disertasi",
            'author' => "221402133",
            'kategori_id' => 3
        ]);

        TugasAkhir::create([
            'judul' => "Hunter x Hunter adalah anime terbaik",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 1980,
            'tipe_ta' => "tesis",
            'author' => "221402078",
            'kategori_id' => 2
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402133",
            'kode_dosen' => "DDY",
            'status_pembimbing' => "dospem1"
        ]);
    }
}
