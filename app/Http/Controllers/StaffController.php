<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//Pemanggilan Model
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\TugasAkhir;
use App\Models\Prodi;
use App\Models\Kategori;
use App\Models\DokumenFile;
use App\Models\Dosenpembimbing;

class StaffController extends Controller
{

    public function index()
    {
        return view('staff.dashboard_staff');
    }

    //Mahasiswa Part Start
    //Mahasiswa Part Start
    public function dataMahasiswa()
    {
        $mahasiswas = Mahasiswa::orderBy('prodi_id')->get(); 
        return view('staff.datamahasiswa_staff', compact('mahasiswas')); 
    }

    public function detailMahasiswa($NIM)
    {
        $mahasiswa = Mahasiswa::find($NIM);
        return view('staff.detailMahasiswa_staff', ['mahasiswa' => $mahasiswa]);
    }

    public function tambahMahasiswa()
    {
        $prodis = Prodi::all(); 
        return view('staff.tambahMahasiswa', ['prodis' => $prodis]);
    }

    public function insertMahasiswa(Request $request)
    {
        $nim = $request->input('NIM');
        $nimString = strval($nim);
        $nama_mahasiswa = $request->input('nama_mahasiswa');
        $username = $nimString; 
        $email = $request->input('email');
        $password = Hash::make($nimString);
        $role = 'mahasiswa';
        $prodi_id = $request->input('prodi');

        DB::select('CALL p_tambah_user_mahasiswa(?, ?, ?, ?, ?, ?, ?)', [
            $nim,
            $nama_mahasiswa,
            $username,
            $email,
            $password,
            $role,
            $prodi_id
        ]);

        return redirect()->route('datamahasiswa.staff')->with('success', 'Data Mahasiswa berhasil ditambahkan');
    }
    //Mahasiswa Part End
    //Mahasiswa Part End

    public function dataDosen()
    {
        $dosens = Dosen::orderBy('prodi_id')->get();
        //dd($dosens->first()->kode_dosen);
        //dd($dosens->first()->kode_dosen);
        return view('staff.datadosen_staff', compact('dosens'));
    }

    public function tambahDosen()
    {
        $prodis = Prodi::all(); 
        return view('staff.tambahDosen', ['prodis' => $prodis]);
    }

    public function insertDosen(Request $request)
    {
        $NIDN    = $request->input('NIDN');
        $NIP = $request->input('NIP');
        $NIPString = strval($NIP);
        $username = $NIPString; 
        $password = Hash::make($NIPString);
        $email = $request->input('email');
        $kode_dosen = $request->input('kode_dosen');
        $nama_dosen = $request->input('nama_dosen');
        $role = 'dosen';
        $prodi_id = $request->input('prodi');

        
        DB::select('CALL p_tambah_user_dosen(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $username,
            $email,
            $password,
            $role,
            $kode_dosen,
            $NIP,
            $NIDN,
            $nama_dosen,
            $prodi_id
        ]);

        return redirect()->route('datadosen.staff')->with('success', 'Data Dosen berhasil ditambahkan');
    }

    public function detailDosen($kode_dosen)
    {
        $dosen = Dosen::find($kode_dosen);
        return view('staff.detailDosen', ['dosen' => $dosen]);
    }

    //TUGAS AKHIR
    //TUGAS AKHIR
    public function dataTugasakhir()
    {
        $tugas_akhirs = TugasAkhir::all();
        return view('staff.datatugasakhir_staff', compact('tugas_akhirs'));
    }

    public function detailTugasakhir($id_tugasakhir)
    {
        $tugas_akhir = TugasAkhir::find($id_tugasakhir);
        $author_nim = $tugas_akhir->author;
        $dosen_pembimbing = Dosenpembimbing::where('NIM', $author_nim)->with('dosen')->get();

        return view('staff.detailTugasakhir_staff', [
            'tugas_akhir' => $tugas_akhir,
            'dosen_pembimbing' => $dosen_pembimbing
        ]);
    }




    public function tambahTugasakhir()
    {
        $dosens = Dosen::all(); 
        $mahasiswas = Mahasiswa::all(); 
        $kategoris = Kategori::all(); 
        return view('staff.tambahTugasakhir_staff', compact('dosens', 'mahasiswas', 'kategoris'));
    }

    public function insertTugasakhir(Request $request)
    {
        $judul  = $request->input('judul');
        $abstrak = $request->input('abstrak');
        $author = $request->input('author');
        $dospem1 = $request->input('dospem1');
        $dospem2 = $request->input('dospem2');
        $tipe_ta = $request->input('tipe_ta');
        $tahun_terbit = $request->input('tahun_terbit');
        $sampul = $request->file('sampul');
        $kategori = $request->input('kategori');
        $file_metodologi = $request->file('file_metodologi');
        $file_pustaka = $request->file('file_pustaka');
        $file_tugasakhir = $request->file('file_tugasakhir');

        $sampulPath = $sampul->store('uploads', 'public');
        $fileMetodologiPath = $file_metodologi->store('uploads', 'public');
        $filePustakaPath = $file_pustaka->store('uploads', 'public');
        $fileTugasakhirPath = $file_tugasakhir->store('uploads', 'public');


        
        DB::select('CALL p_tambah_tugas_akhir(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $judul,
            $abstrak,
            $sampulPath,
            $tipe_ta,
            $author,
            $kategori,
            $dospem1,
            $dospem2,
            $tahun_terbit,
            $fileMetodologiPath,
            $filePustakaPath,
            $fileTugasakhirPath
        ]);

        return redirect()->route('datatugas.staff')->with('success', 'Tugas Akhir berhasil ditambahkan');
    }

    public function dataKategori()
    {
        return view('staff.dataKategori_staff');
    }




    public function notifikasi_staff()
    {
        return view('staff.notifikasi_staff');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
