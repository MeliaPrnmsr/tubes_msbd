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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id_user' => 73,
            'username' => "191402041",
            'email' => "Hamdiayhputra@gmail.com",
            'password' => "191402041",
            'role' => "mahasiswa",
        ]);

        Mahasiswa::create([
            'NIM' => "191402041",
            'nama_mahasiswa' => "Hamdi Syahputra",
            'user_id' => 73,
            'prodi_id' => 1
        ]);
        
    }
}
