<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Staff;
use App\Models\Staff;
use App\Models\Kategori;
use App\Models\TugasAkhir;
use App\Models\Dosenpembimbing;
use App\Models\DokumenFile;

use App\Models\DokumenFile;


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
            'username' => "221402133", 
            'username' => "221402133", 
            'email' => "edgar@gmail.com",
            'password' => bcrypt('221402133'),
            'password' => bcrypt('221402133'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "221402112", 
            'username' => "221402112", 
            'email' => "melia@gmail.com",
            'password' => bcrypt('221402112'),
            'role' => "mahasiswa"
            'password' => bcrypt('221402112'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "197908312009121002", 
            'username' => "197908312009121002", 
            'email' => "deddy@gmail.com",
            'password' => bcrypt('197908312009121002'),
            'password' => bcrypt('197908312009121002'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "198705252014041001", 
            'username' => "198705252014041001", 
            'email' => "pakmanusu@gmail.com",
            'password' => bcrypt('198705252014041001'),
            'password' => bcrypt('198705252014041001'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "221402020", 
            'username' => "221402020", 
            'email' => "chrismiguel@gmail.com",
            'password' => bcrypt('221402020'),
            'password' => bcrypt('221402020'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "221402138", 
            'username' => "221402138", 
            'email' => "yeni@gmail.com",
            'password' => bcrypt('221402138'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "228123031",
            'email' => "fortyche@gmail.com",
            'password' => bcrypt('228123031'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "221401041",
            'email' => "akuwibu@gmail.com",
            'password' => bcrypt('221401041'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "221402057",
            'email' => "clinton@gmail.com",
            'password' => bcrypt('221402057'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "admin",
            'email' => "ahok@gmail.com",
            'password' => bcrypt('rahasia'),
            'role' => "admin"
        ]);

        User::create([
            'username' => "196108171987011001",
            'email' => "opim@gmail.com",
            'password' => bcrypt('196108171987011001'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "199308092020012001",
            'email' => "anisa@gmail.com",
            'password' => bcrypt('anisa'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "SP001",
            'email' => "test1@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP002",
            'email' => "test2@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP003",
            'email' => "test3@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP004",
            'email' => "test4@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "227038057",
            'email' => "andy@gmail.com",
            'password' => bcrypt('227038057'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "227038080",
            'email' => "citos@gmail.com",
            'password' => bcrypt('227038080'),
            'password' => bcrypt('221402138'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "228123031",
            'email' => "fortyche@gmail.com",
            'password' => bcrypt('228123031'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "221401041",
            'email' => "akuwibu@gmail.com",
            'password' => bcrypt('221401041'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "221402057",
            'email' => "clinton@gmail.com",
            'password' => bcrypt('221402057'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "admin",
            'email' => "ahok@gmail.com",
            'password' => bcrypt('rahasia'),
            'role' => "admin"
        ]);

        User::create([
            'username' => "196108171987011001",
            'email' => "opim@gmail.com",
            'password' => bcrypt('196108171987011001'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "199308092020012001",
            'email' => "anisa@gmail.com",
            'password' => bcrypt('anisa'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "SP001",
            'email' => "test1@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP002",
            'email' => "test2@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP003",
            'email' => "test3@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP004",
            'email' => "test4@gmail.com",
            'password' => bcrypt('SP001'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "227038057",
            'email' => "andy@gmail.com",
            'password' => bcrypt('227038057'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "227038080",
            'email' => "citos@gmail.com",
            'password' => bcrypt('227038080'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "197510082008011011",
            'email' => "andribud@gmail.com",
            'password' => bcrypt('197510082008011011'),
            'role' => "Dosen"
        ]);

        User::create([
            'username' => "197007162005012002",
            'email' => "elvia@gmail.com",
            'password' => bcrypt('197007162005012002'),
            'role' => "Dosen"
        ]);
        
        User::create([
            'username' => "196203171991031001",
            'email' => "polsim@gmail.com",
            'password' => bcrypt('196203171991031001'),
            'role' => "Dosen"
        ]);

        User::create([
            'username' => "198805012015042006",
            'email' => "srimelv@gmail.com",
            'password' => bcrypt('198805012015042006'),
            'role' => "Dosen"
        ]);

        User::create([
            'username' => "221401044",
            'email' => "Alwinss@gmail.com",
            'password' => bcrypt('221401044'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "227038081",
            'email' => "daguls@gmail.com",
            'password' => bcrypt('227038081'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "227038059",
            'email' => "wahyujrs@gmail.com",
            'password' => bcrypt('227038059'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "228123033",
            'email' => "ghalbis@gmail.com",
            'password' => bcrypt('228123033'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "221401069",
            'email' => "satria@gmail.com",
            'password' => bcrypt('221401069'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "221401070",
            'email' => "ahsans@gmail.com",
            'password' => bcrypt('221401070'),
            'role' => "Mahasiswa"
        ]);
        User::create([
            'username' => "197510082008011011",
            'email' => "andribud@gmail.com",
            'password' => bcrypt('197510082008011011'),
            'role' => "Dosen"
        ]);

        User::create([
            'username' => "197007162005012002",
            'email' => "elvia@gmail.com",
            'password' => bcrypt('197007162005012002'),
            'role' => "Dosen"
        ]);
        
        User::create([
            'username' => "196203171991031001",
            'email' => "polsim@gmail.com",
            'password' => bcrypt('196203171991031001'),
            'role' => "Dosen"
        ]);

        User::create([
            'username' => "198805012015042006",
            'email' => "srimelv@gmail.com",
            'password' => bcrypt('198805012015042006'),
            'role' => "Dosen"
        ]);

        User::create([
            'username' => "221401044",
            'email' => "Alwinss@gmail.com",
            'password' => bcrypt('221401044'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "227038081",
            'email' => "daguls@gmail.com",
            'password' => bcrypt('227038081'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "227038059",
            'email' => "wahyujrs@gmail.com",
            'password' => bcrypt('227038059'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "228123033",
            'email' => "ghalbis@gmail.com",
            'password' => bcrypt('228123033'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "221401069",
            'email' => "satria@gmail.com",
            'password' => bcrypt('221401069'),
            'role' => "Mahasiswa"
        ]);

        User::create([
            'username' => "221401070",
            'email' => "ahsans@gmail.com",
            'password' => bcrypt('221401070'),
            'role' => "Mahasiswa"
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

        Prodi::create([
            'jenjang' => "S2",
            'nama_prodi' => "Teknik Informatika",
            'alamat_prodi' => "Gedung D Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155"
        ]);

        Prodi::create([
            'jenjang' => "S3",
            'nama_prodi' => "Ilmu Komputer",
            'alamat_prodi' => "Gedung D Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155"
        ]);

        Prodi::create([
            'jenjang' => "S2",
            'nama_prodi' => "Teknik Informatika",
            'alamat_prodi' => "Gedung D Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155"
        ]);

        Prodi::create([
            'jenjang' => "S3",
            'nama_prodi' => "Ilmu Komputer",
            'alamat_prodi' => "Gedung D Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20155"
        ]);
        
        Mahasiswa::create([
            'nim' => "221402020",
            'nama_mahasiswa' => "Gylbert Chrismiguel Sitorus",
            'user_id' => 5,
            'prodi_id' => 1
            'prodi_id' => 1
        ]);
        
        
        Mahasiswa::create([
            'nim' => "221402133",
            'nama_mahasiswa' => "Serafim Edgar Pandamei Sitorus",
            'user_id' => 1,
            'prodi_id' => 1
        ]);

        Mahasiswa::create([
            'nim' => "221402138",
            'nama_mahasiswa' => "Yeni Aulia Sinaga",
            'user_id' => 6,
            'prodi_id' => 1
        ]);

        Mahasiswa::create([
            'nim' => "221402112",
            'nama_mahasiswa' => "Melia Purnamasari Sihombing",
            'user_id' => 2,
            'prodi_id' => 1
        ]);

        Mahasiswa::create([
            'nim' => "221402057",
            'nama_mahasiswa' => "Clinton Christovel Simanullang",
            'user_id' => 9,
            'prodi_id' => 1
        ]);

        Mahasiswa::create([
            'nim' => "228123031",
            'nama_mahasiswa' => "Rifqi Jabrah Rhae",
            'user_id' => 7,
            'prodi_id' => 4
        ]);

        Mahasiswa::create([
            'nim' => "221401041",
            'nama_mahasiswa' => "Muhammad Luthfi",
            'user_id' => 8,
            'prodi_id' => 2
        ]);

        Mahasiswa::create([
            'nim' => "227038057",
            'nama_mahasiswa' => "Andy Septiawan Saragih",
            'user_id' => 17,
            'prodi_id' => 3
        ]);

        Mahasiswa::create([
            'nim' => "227038080",
            'nama_mahasiswa' => "Christo Joseph Tua Carolus",
            'user_id' => 18,
            'prodi_id' => 3
        ]);

        Mahasiswa::create([
            'nim' => "221401044",
            'nama_mahasiswa' => "Alwin Liufandy",
            'user_id' => 23,
            'prodi_id' => 2
        ]);

        Mahasiswa::create([
            'nim' => "227038081",
            'nama_mahasiswa' => "Daniel Stephen Gultom",
            'user_id' => 23,
            'prodi_id' => 3
        ]);

        Mahasiswa::create([
            'nim' => "227038059",
            'nama_mahasiswa' => "Wahyu Jhon Riadi Sianipar",
            'user_id' => 25,
            'prodi_id' => 3
        ]);

        Mahasiswa::create([
            'nim' => "228123033",
            'nama_mahasiswa' => "Ghalbi Daffa Yustiawan",
            'user_id' => 26,
            'prodi_id' => 4
        ]);

        Mahasiswa::create([
            'nim' => "221401069",
            'nama_mahasiswa' => "Perwira Satria Taufik QD",
            'user_id' => 27,
            'prodi_id' => 2
        ]);

        Mahasiswa::create([
            'nim' => "221401070",
            'nama_mahasiswa' => "Muhammad Ahsanul Kholoqin Lubis",
            'user_id' => 28,
            'prodi_id' => 2
        ]);

        Dosen::create([
            'kode_dosen' => "DDY",
            'NIP' => "197908312009121002",
            'NIDN' => "0031087905",
            'nama_dosen' => "Deddy Arisandi",
            'user_id' => 3,
            'prodi_id' => 1
        ]);

        Dosen::create([
            'kode_dosen' => "CES",
            'kode_dosen' => "CES",
            'NIP' => "198705252014041001",
            'NIDN' => "0025058704",
            'nama_dosen' => "Seniman",
            'nama_dosen' => "Seniman",
            'user_id' => 4,
            'prodi_id' => 1
        ]);

        Dosen::create([
            'kode_dosen' => "ANS",
            'NIP' => "199308092020012001",
            'NIDN' => "0009089301",
            'nama_dosen' => "Annisa Pulungan",
            'user_id' => 12,
            'prodi_id' => 2
        ]);

        Dosen::create([
            'kode_dosen' => "OPM",
            'NIP' => "196108171987011001",
            'NIDN' => "0017086108",
            'nama_dosen' => "Opim Salim Sitompul",
            'user_id' => 11,
            'prodi_id' => 4
        ]);

        Dosen::create([
            'kode_dosen' => "MAB",
            'NIP' => "197510082008011011",
            'NIDN' => "0008107507",
            'nama_dosen' => "Mohammad Andri Budiman",
            'user_id' => 19,
            'prodi_id' => 3
        ]);

        Dosen::create([
            'kode_dosen' => "EMZ",
            'NIP' => "197007162005012002",
            'NIDN' => "0016077001",
            'nama_dosen' => "Elviawaty Muisa Zamzami",
            'user_id' => 20,
            'prodi_id' => 3
        ]);

        Dosen::create([
            'kode_dosen' => "PSG",
            'NIP' => "196203171991031001",
            'NIDN' => "0017036205",
            'nama_dosen' => "Poltak Sihombing",
            'user_id' => 21,
            'prodi_id' => 4
        ]);

        Dosen::create([
            'kode_dosen' => "SMH",
            'NIP' => "198805012015042006",
            'NIDN' => "0101058801",
            'nama_dosen' => "Sri Melvani Hardi",
            'user_id' => 22,
            'prodi_id' => 2
        ]);

        Staff::create([
            'kode_staff' => "SP001",
            'nama_staff' => "Benjamin Wijaya",
            'user_id' => 13,
            'prodi_id' => 1
        ]);

        Staff::create([
            'kode_staff' => "SP002",
            'nama_staff' => "Alderich",
            'user_id' => 14,
            'prodi_id' => 2
        ]);

        Staff::create([
            'kode_staff' => "SP003",
            'nama_staff' => "Lily Matilda",
            'user_id' => 15,
            'prodi_id' => 3
        ]);

        Staff::create([
            'kode_staff' => "SP004",
            'nama_staff' => "Conor McGregor",
            'user_id' => 16,
            'prodi_id' => 4
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

        Kategori::create([
            'nama_kategori' => "Multimedia",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Internet Of Things",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Network and Security",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Inteligent System",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Internet Of Things",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Cyber Security",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Cryptography",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Data Science",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Microcontroller",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Machine Learning",
            'prodi_id' => 3
        ]);

        Kategori::create([
            'nama_kategori' => "Cyber Security",
            'prodi_id' => 3
        ]);

        Kategori::create([
            'nama_kategori' => "Internet Of Things",
            'prodi_id' => 3
        ]);

        Kategori::create([
            'nama_kategori' => "Soft Computing",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Informatial Retrieval",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Intelligent System",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Mathematical Modelling",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Advanced Networking",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Multimedia",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Internet Of Things",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Network and Security",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Inteligent System",
            'prodi_id' => 1
        ]);

        Kategori::create([
            'nama_kategori' => "Internet Of Things",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Cyber Security",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Cryptography",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Data Science",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Microcontroller",
            'prodi_id' => 2
        ]);

        Kategori::create([
            'nama_kategori' => "Machine Learning",
            'prodi_id' => 3
        ]);

        Kategori::create([
            'nama_kategori' => "Cyber Security",
            'prodi_id' => 3
        ]);

        Kategori::create([
            'nama_kategori' => "Internet Of Things",
            'prodi_id' => 3
        ]);

        Kategori::create([
            'nama_kategori' => "Soft Computing",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Informatial Retrieval",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Intelligent System",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Mathematical Modelling",
            'prodi_id' => 4
        ]);

        Kategori::create([
            'nama_kategori' => "Advanced Networking",
            'prodi_id' => 4
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
            'judul' => "Internet of Things Dalam Lingkup Daerah",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2027,
            'tipe_ta' => "skripsi",
            'author' => "221402020",
            'tipe_ta' => "skripsi",
            'author' => "221402020",
            'kategori_id' => 3
        ]);

        TugasAkhir::create([
            'judul' => "Penerapan Algoritma Djikstra Untuk Menjadi Kaya",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2019,
            'tipe_ta' => "tesis",
            'author' => "227038080",
            'kategori_id' => 14
        ]);

        TugasAkhir::create([
            'judul' => "Strategi Coping Mechanism Menggunakan Algoritma Kruskal",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2010,
            'tipe_ta' => "disertasi",
            'author' => "228123031",
            'kategori_id' => 17
        ]);

        TugasAkhir::create([
            'judul' => "Pembuatan Kopi Sianida dengan Menggunakan Algoritma Transformer",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2010,
            'tipe_ta' => "disertasi",
            'author' => "228123033",
            'kategori_id' => 16
        ]);

        TugasAkhir::create([
            'judul' => "Aplikasi Simulasi Bencana",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2010,
            'tahun_terbit' => 2010,
            'tipe_ta' => "tesis",
            'author' => "227038057",
            'kategori_id' => 15
        ]);

        TugasAkhir::create([
            'judul' => "Menggunakan Neural Networks sebagai Kecerdasan Buatan",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2010,
            'tipe_ta' => "skripsi",
            'author' => "221402112",
            'kategori_id' => 7
        ]);

        TugasAkhir::create([
            'judul' => "Pembuatan Pintu Otomatis dengan Penerapan Mikrokontroler",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2023,
            'tipe_ta' => "skripsi",
            'author' => "221401044",
            'kategori_id' => 12
        ]);

        TugasAkhir::create([
            'judul' => "Persandian kriptografi Sebagai Rahasia Keamanan Data",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2023,
            'tipe_ta' => "skripsi",
            'author' => "221401069",
            'kategori_id' => 10
        ]);

        TugasAkhir::create([
            'judul' => "Pencarian Big Data Menggunakan Algoritma Anul",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2023,
            'tipe_ta' => "skripsi",
            'author' => "221401070",
            'kategori_id' => 11
        ]);

        TugasAkhir::create([
            'judul' => "Pencarian Nama Penyakit seputar kaki Mengguanakan Mobile Handphone",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2023,
            'tipe_ta' => "skripsi",
            'author' => "221402057",
            'kategori_id' => 7
        ]);

        TugasAkhir::create([
            'judul' => "Pengaktifan Kulkas Otomatis menggunakan Mikrokontroller",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2025,
            'tipe_ta' => "Tesis",
            'author' => "227038059",
            'kategori_id' => 13
        ]);

        TugasAkhir::create([
            'judul' => "Pengaktifan Lampu Otomatis menggunakan Internet Of Things",
            'abstrak' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut distinctio neque porro dolor ex eos ipsum. At autem, officiis nostrum nulla quod nam magni tempora eaque quidem consectetur excepturi quas?",
            'tahun_terbit' => 2026,
            'tipe_ta' => "Tesis",
            'author' => "227038081",
            'kategori_id' => 15
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402133",
            'kode_dosen' => "DDY",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402133",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402020",
            'kode_dosen' => "DDY",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402020",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "227038080",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "227038080",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123031",
            'kode_dosen' => "OPM",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123031",
            'kode_dosen' => "PSG",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123033",
            'kode_dosen' => "PSG",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123033",
            'kode_dosen' => "OPM",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402112",
            'kode_dosen' => "DDY",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402112",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401044",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401044",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401069",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401069",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402057",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402057",
            'kode_dosen' => "DDY",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402020",
            'kode_dosen' => "DDY",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402020",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "227038080",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "227038080",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123031",
            'kode_dosen' => "OPM",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123031",
            'kode_dosen' => "PSG",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123033",
            'kode_dosen' => "PSG",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "228123033",
            'kode_dosen' => "OPM",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402112",
            'kode_dosen' => "DDY",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402112",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401044",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401044",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401069",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401069",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "SMH",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221401070",
            'kode_dosen' => "ANS",
            'status_pembimbing' => "dospem2"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402057",
            'kode_dosen' => "CES",
            'status_pembimbing' => "dospem1"
        ]);

        Dosenpembimbing::create([
            'NIM' => "221402057",
            'kode_dosen' => "DDY",
            'status_pembimbing' => "dospem2"
        ]);



        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi220402001.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA220402001.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka220402001.pdf",
            'file_metodologi' => "public\asset\file\Metodologi220402001.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA220402001.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka220402001.pdf",
            'tugasakhir_id' => 2
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 1
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 3
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 4
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 5
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 6
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 7
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 8
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 9
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 10
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 11
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 12
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 13
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 3
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 4
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 5
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 6
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 7
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 8
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 9
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 10
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 11
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 12
        ]);

        DokumenFile::create([
            'file_metodologi' => "public\asset\file\Metodologi221401056.pdf",
            'file_tugasakhir' => "public\asset\file\Isi TA221401056.pdf",
            'file_daftarpustaka' => "public\asset\file\Daftar Pustaka221401056.pdf",
            'tugasakhir_id' => 13
        ]);
        
    }
}
