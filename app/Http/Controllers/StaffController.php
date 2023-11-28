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
        $mahasiswas = Mahasiswa::all(); 
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
        $dosens = Dosen::all();
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

    public function detailDosen($NIP)
    {
        $dosen = Dosen::find($NIP);
        return view('staff.detailDosen', compact('dosen'));
    }

    public function dataTugasakhir()
    {
        $tugas_akhirs = TugasAkhir::all();
        return view('staff.datatugasakhir_staff', compact('tugas_akhirs'));
    }

    public function dataKategori()
    {
        return view('staff.dataKategori_staff');
    }




    public function notifikasi_staff()
    {
        return view('staff.notifikasi_staff');
    }

    public function tambahSkripsi()
    {
        return view('staff.tambahskripstaff');
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
