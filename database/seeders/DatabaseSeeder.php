<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Staff;
use App\Models\Kategori;
use App\Models\TugasAkhir;
use App\Models\Dosenpembimbing;
use App\Models\DokumenFile;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'username' => "221402133", 
            'email' => "edgar@gmail.com",
            'password' => bcrypt('221402133'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "221402112", 
            'email' => "melia@gmail.com",
            'password' => bcrypt('221402112'),
            'role' => "mahasiswa"
        ]);

        User::create([
            'username' => "197908312009121002", 
            'email' => "deddy@gmail.com",
            'password' => bcrypt('197908312009121002'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "198705252014041001", 
            'email' => "seniman@gmail.com",
            'password' => bcrypt('198705252014041001'),
            'role' => "dosen"
        ]);

        User::create([
            'username' => "221402020", 
            'email' => "chrismiguel@gmail.com",
            'password' => bcrypt('221402020'),
            'role' => "mahasiswa"
        ]);

        User::create([
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
            'email' => "admin@gmail.com",
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
            'email' => "aninsa@gmail.com",
            'password' => bcrypt('199308092020012001'),
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
            'password' => bcrypt('SP002'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP003",
            'email' => "test3@gmail.com",
            'password' => bcrypt('SP003'),
            'role' => "staff"
        ]);

        User::create([
            'username' => "SP004",
            'email' => "test4@gmail.com",
            'password' => bcrypt('SP004'),
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
            'email' => "andri@gmail.com",
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
            'email' => "poltakSihombing@gmail.com",
            'password' => bcrypt('196203171991031001'),
            'role' => "Dosen"
        ]);

        User::create([
            'username' => "198805012015042006",
            'email' => "sri@gmail.com",
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

        // BATAS BATAS BUATAN
        User::create([
            'username' => "131402091",
            'email' => "agustinarahel@gmail.com",
            'password' => bcrypt('131402091'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "131402091",
            'nama_mahasiswa' => "Rahela Agustina Sitinjak",
            'user_id' => 29,
            'prodi_id' => 1
        ]);

        User::create([
            'username' => "141401146",
            'email' => "abrarkhairy28@gmail.com",
            'password' => bcrypt('141401146'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "141401146",
            'nama_mahasiswa' => "Muhammad Al Abrar Khairy",
            'user_id' => 30,
            'prodi_id' => 2
        ]);

        // <!-- END -->
        User::create([
            'username' => "031401053",
            'email' => "marius28@gmail.com",
            'password' => bcrypt('031401053'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "031401053",
            'nama_mahasiswa' => "Marius Indra N G",
            'user_id' => 31,
            'prodi_id' => 2
        ]);
        // <!-- END -->

        User::create([
            'username' => "111402004",
            'email' => "carmelocarnelius@gmail.com",
            'password' => bcrypt('111402004'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "111402004",
            'nama_mahasiswa' => "Carmelo Tumanggor",
            'user_id' => 32,
            'prodi_id' => 1
        ]);
        // <!-- END -->

        User::create([
            'username' => "141401087",
            'email' => "ramadhanhamdi09@gmail.com",
            'password' => bcrypt('141401087'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "141401087",
            'nama_mahasiswa' => "Ramadhan Hamdi",
            'user_id' => 33,
            'prodi_id' => 2
        ]);
        // <!-- END -->

        User::create([
            'username' => "111402005",
            'email' => "alvi.sri.andini2011@students.usu.ac.id",
            'password' => bcrypt('111402005'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "111402005",
            'nama_mahasiswa' => "Alvi Sri Andini",
            'user_id' => 34,
            'prodi_id' => 1
        ]);
        // <!-- END -->

        User::create([
            'username' => "091402130",
            'email' => "andrisinaga@rocketmailcom",
            'password' => bcrypt('091402130'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "091402130",
            'nama_mahasiswa' => "Andri Agung Anugrah",
            'user_id' => 35,
            'prodi_id' => 1
        ]);
        // <!-- END -->

        User::create([
            'username' => "137038013",
            'email' => "mhdiqbalpradipta@gmail.com",
            'password' => bcrypt('137038013'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "137038013",
            'nama_mahasiswa' => "Muhammad Iqbal Pradipta",
            'user_id' => 36,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "141401098",
            'email' => "fitrianatasha722@gmail.com",
            'password' => bcrypt('141401098'),
            'role' => "mahasiswa"   
        ]);

        Mahasiswa::create([
            'nim' => "141401098",
            'nama_mahasiswa' => "Fitria Natasha",
            'user_id' => 37,
            'prodi_id' => 2
        ]);
        // <!-- END -->

        User::create([
            'username' => "151402096",
            'email' => "selvinaretly@yahoo.com",
            'password' => bcrypt('151402096'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "151402096",
            'nama_mahasiswa' => "Selvine Retly Yuanda",
            'user_id' => 38,
            'prodi_id' => 1
        ]);
        // <!-- END -->

        User::create([
            'username' => "157038007",
            'email' => "roy90singarimbun@gmail.com",
            'password' => bcrypt('157038007'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "157038007",
            'nama_mahasiswa' => "Roy Nuary Singarimbun",
            'user_id' => 39,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "147038066",
            'email' => "adipoltas@gmail.com",
            'password' => bcrypt('147038066'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "147038066",
            'nama_mahasiswa' => "Teuku Sukma Achriadi Sukiman",
            'user_id' => 40,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "177038017",
            'email' => "adelinhar31@gmail.com",
            'password' => bcrypt('177038017'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "177038017",
            'nama_mahasiswa' => "Ade Linhar P",
            'user_id' => 41,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "208123015",
            'email' => "sundariretnoandani@students.usu.ac.id",
            'password' => bcrypt('208123015'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "208123015",
            'nama_mahasiswa' => "Sundari Retno Andani",
            'user_id' => 42,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "208123002",
            'email' => "alkhowarizmi@students.usu.ac.id",
            'password' => bcrypt('208123002'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "208123002",
            'nama_mahasiswa' => "AL-KHOWARIZMI",
            'user_id' => 43,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "198123015",
            'email' => "hrumapea1608@gmail.com",
            'password' => bcrypt('198123015'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "198123015",
            'nama_mahasiswa' => "HUMUNTAL RUMAPEA",
            'user_id' => 44,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "168123002",
            'email' => "muhammadiqbalpb@gmail.com",
            'password' => bcrypt('168123002'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "168123002",
            'nama_mahasiswa' => "MUHAMMAD IQBAL",
            'user_id' => 45,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "198123001",
            'email' => "amelia.afritha@students.usu.ac.id",
            'password' => bcrypt('198123001'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "198123001",
            'nama_mahasiswa' => "AFRITHA AMELIA",
            'user_id' => 46,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "148123005",
            'email' => "mandrib@usu.ac.id",
            'password' => bcrypt('148123005'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "148123005",
            'nama_mahasiswa' => "MOHAMMAD ANDRI BUDIMAN",
            'user_id' => 47,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "168123005",
            'email' => "verdiyasin29@gmail.com",
            'password' => bcrypt('168123005'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "168123005",
            'nama_mahasiswa' => "VERDI YASIN",
            'user_id' => 48,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "188123015",
            'email' => "hengki_tamando@yahoo.com",
            'password' => bcrypt('188123015'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "188123015",
            'nama_mahasiswa' => "HENGKI TAMANDO SIHOTANG",
            'user_id' => 49,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "178123001",
            'email' => "amalia@usu.ac.id",
            'password' => bcrypt('178123001'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "178123001",
            'nama_mahasiswa' => "AMALIA",
            'user_id' => 50,
            'prodi_id' => 4
        ]);
        // <!-- END -->

        User::create([
            'username' => "207038031",
            'email' => "rahmadbahri23@gmail.com",
            'password' => bcrypt('207038031'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "207038031",
            'nama_mahasiswa' => "Rahmad Bahri",
            'user_id' => 51,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "187038006",
            'email' => "hrp.ikhwan13@gmail.com",
            'password' => bcrypt('187038006'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "187038006",
            'nama_mahasiswa' => "MUHAMMAD IKHWAN HARAHAP",
            'user_id' => 52,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "117038035",
            'email' => "nurul_hamdi@students.usu.ac.id",
            'password' => bcrypt('117038035'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "117038035",
            'nama_mahasiswa' => "NURUL HAMDI",
            'user_id' => 53,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "147038077",
            'email' => "iyanmei22@gmail.com",
            'password' => bcrypt('147038077'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "147038077",
            'nama_mahasiswa' => "ANDRIAN KURNIAWAN",
            'user_id' => 54,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "117038003",
            'email' => "julpan@gmail.com",
            'password' => bcrypt('117038003'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "117038003",
            'nama_mahasiswa' => "Julpan",
            'user_id' => 55,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        User::create([
            'username' => "097038015",
            'email' => "nurdin@gmail.com",
            'password' => bcrypt('097038015'),
            'role' => "mahasiswa"
        ]);

        Mahasiswa::create([
            'nim' => "097038015",
            'nama_mahasiswa' => "Nurdin",
            'user_id' => 56,
            'prodi_id' => 3
        ]);
        // <!-- END -->

        // BATAS BATAS BUATAN
        
        Mahasiswa::create([
            'nim' => "221402020",
            'nama_mahasiswa' => "Gylbert Chrismiguel Sitorus",
            'user_id' => 5,
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
            'nama_dosen' => "Dedy Arisandi S.T., M.Kom.",
            'user_id' => 3,
            'prodi_id' => 1
        ]);

        Dosen::create([
            'kode_dosen' => "SNM",
            'NIP' => "198705252014041001",
            'NIDN' => "0025058704",
            'nama_dosen' => "Seniman S.Kom., M.Kom.",
            'user_id' => 4,
            'prodi_id' => 1
        ]);

        Dosen::create([
            'kode_dosen' => "ANS",
            'NIP' => "199308092020012001",
            'NIDN' => "0009089301",
            'nama_dosen' => "Annisa Fadhillah Pulungan S.Kom., M.Kom",
            'user_id' => 12,
            'prodi_id' => 2
        ]);

        Dosen::create([
            'kode_dosen' => "OPM",
            'NIP' => "196108171987011001",
            'NIDN' => "0017086108",
            'nama_dosen' => "Prof. Dr. Drs. Opim Salim Sitompul M.Sc ",
            'user_id' => 11,
            'prodi_id' => 4
        ]);

        Dosen::create([
            'kode_dosen' => "MAB",
            'NIP' => "197510082008011011",
            'NIDN' => "0008107507",
            'nama_dosen' => "Dr. Mohammad Andri Budiman S.T., M.Comp.Sc., M.E.M.",
            'user_id' => 19,
            'prodi_id' => 2
        ]);

        Dosen::create([
            'kode_dosen' => "EMZ",
            'NIP' => "197007162005012002",
            'NIDN' => "0016077001",
            'nama_dosen' => "Dr. Elviawaty Muisa Zamzami S.T., M.T., MM",
            'user_id' => 20,
            'prodi_id' => 3
        ]);

        Dosen::create([
            'kode_dosen' => "PSG",
            'NIP' => "196203171991031001",
            'NIDN' => "0017036205",
            'nama_dosen' => "Prof. Dr. Poltak Sihombing M.Kom.",
            'user_id' => 21,
            'prodi_id' => 4
        ]);

        Dosen::create([
            'kode_dosen' => "SMH",
            'NIP' => "198805012015042006",
            'NIDN' => "0101058801",
            'nama_dosen' => "Sri Melvani Hardi S.Kom., M.Kom",
            'user_id' => 22,
            'prodi_id' => 2
        ]);

        // BATAS BATAS

        User::create([
            'username' => "196711101996021001",
            'email' => "syahril1@usu.ac.id",
            'password' => bcrypt('196711101996021001'),
            'role' => "dosen"
        ]);

        Dosen::create([
            'kode_dosen' => "SEF",
            'NIP' => "196711101996021001",
            'NIDN' => "0010116706",
            'nama_dosen' => "Syahril Efendi",
            'user_id' => 57,
            'prodi_id' => 4
        ]);
        //<!-- END -->

        User::create([
            'username' => "195707011986011003",
            'email' => "m.zarlis@yahoo.com",
            'password' => bcrypt('195707011986011003'),
            'role' => "dosen"
        ]);

        Dosen::create([
            'kode_dosen' => "ZRL",
            'NIP' => "195707011986011003",
            'NIDN' => "0001075703",
            'nama_dosen' => "Prof. Dr. M. Zarlis M.Sc",
            'user_id' => 58,
            'prodi_id' => 4
        ]);
        //<!-- END -->

        User::create([
            'username' => "196310261991031001",
            'email' => "sutarman@usu.ac.id",
            'password' => bcrypt('196310261991031001'),
            'role' => "dosen"
        ]);

        Dosen::create([
            'kode_dosen' => "STM",
            'NIP' => "196310261991031001",
            'NIDN' => "0026106305",
            'nama_dosen' => "Dr. Sutarman M.Sc",
            'user_id' => 59,
            'prodi_id' => 4
        ]);
        //<!-- END -->

        User::create([
            'username' => "196712251998021001",
            'email' => "mahyuddin@usu.ac.id",
            'password' => bcrypt('196712251998021001'),
            'role' => "dosen"
        ]);

        Dosen::create([
            'kode_dosen' => "MHY",
            'NIP' => "196712251998021001",
            'NIDN' => "0025126703",
            'nama_dosen' => "Prof. Drs. Mahyuddin M.IT., Ph.D.",
            'user_id' => 60,
            'prodi_id' => 4
        ]);
        //<!-- END -->


        // BATAS BATAS



        Staff::create([
            'kode_staff' => "SP001",
            'nama_staff' => "Benjamin Frank",
            'user_id' => 13,
            'prodi_id' => 1
        ]);

        Staff::create([
            'kode_staff' => "SP002",
            'nama_staff' => "Liliana Wati",
            'user_id' => 14,
            'prodi_id' => 2
        ]);

        Staff::create([
            'kode_staff' => "SP003",
            'nama_staff' => "Louis",
            'user_id' => 15,
            'prodi_id' => 3
        ]);

        Staff::create([
            'kode_staff' => "SP004",
            'nama_staff' => "Adrian Antony",
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

        
    }
}
