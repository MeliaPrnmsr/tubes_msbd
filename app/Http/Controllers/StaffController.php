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
        // $mahasiswas = Mahasiswa::orderBy('prodi_id')->get(); 
        $mahasiswas = DB::table('v_data_mahasiswa')->get();
        return view('staff.datamahasiswa_staff', ['mahasiswas' => $mahasiswas]); 
    }

    public function detailMahasiswa($NIM)
    {
        //$mahasiswa = Mahasiswa::find($NIM);
        $mahasiswa = DB::table('v_data_mahasiswa')->where('NIM', $NIM)->first();
        return view('staff.detailMahasiswa_staff', ['mahasiswa' => $mahasiswa]);
    }

    public function tambahMahasiswa()
    {
        $prodis = Prodi::all(); 
        return view('staff.tambahMahasiswa', ['prodis' => $prodis]);
    }

    public function insertMahasiswa(Request $request)
    {
        $request->validate([
            'NIM' => 'required|unique:mahasiswas,NIM|numeric|digits:9',
            'nama_mahasiswa' => ['required', 'regex:/^[A-Za-z\s\-]+$/u'],
            'email' => 'required|email|unique:users,email',
            'prodi' => 'required|not_in:0'
        ]);

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
        //$dosens = Dosen::orderBy('prodi_id')->get();
        $dosens = DB::table('v_data_dosen')->orderBy('nama_prodi')->get();
        return view('staff.datadosen_staff', compact('dosens'));
    }

    public function tambahDosen()
    {
        $prodis = Prodi::all(); 
        return view('staff.tambahDosen', ['prodis' => $prodis]);
    }

    public function insertDosen(Request $request)
    {
       $validasidata =  $request->validate([
            'kode_dosen' => ['required', 'unique:dosens,kode_dosen', 'size:3', 'alpha', 'uppercase'],            
            'NIP' => 'required|unique:dosens,NIP|numeric|digits:14',
            'NIDN' => 'required|unique:dosens,NIDN|numeric|digits:7',
            'nama_dosen' => ['required', 'regex:/^[A-Za-z\s\-,\.]+$/u'],
            'email' => 'required|email|unique:users,email',
            'prodi' => 'required|not_in:0'
        ]);

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
        //$dosen = Dosen::find($kode_dosen);
        $dosen = DB::table('v_data_dosen')->where('kode_dosen', $kode_dosen)->first();
        return view('staff.detailDosen', ['dosen' => $dosen]);
    }

    //TUGAS AKHIR
    //TUGAS AKHIR
    public function dataTugasakhir()
    {
        $tugas_akhirs = TugasAkhir::all();
        //$tugas_akhirs = DB::table('v_data_tugasakhirl')->get();
        return view('staff.datatugasakhir_staff', ['tugas_akhirs' => $tugas_akhirs]);
    }

    public function detailTugasakhir($id_tugasakhir)
    {
        $tugas_akhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();

        return view('staff.detailTugasakhir_staff', ['tugas_akhir' => $tugas_akhir]);
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
        $request->validate([
            'judul' => 'required|string|max:255',
            'author' => 'required|string',
            'tipe_ta' => 'required|string|in:skripsi,tesis,disertasi',
            'dospem1' => 'required|string',
            'dospem2' => 'nullable|string',
            'tahun_terbit' => 'required|numeric|min:1900|max:2099',
            'kategori' => 'required',
            'abstrak' => 'required',
            'sampul' => 'required|mimes:jpeg,png,jpg',
            'file_metodologi' => 'required|mimes:pdf',
            'file_pustaka' => 'required|mimes:pdf',
            'file_tugasakhir' => 'required|mimes:pdf',
        ]);

        $judul  = $request->input('judul');
        $abstrak = $request->input('abstrak');
        $author = $request->input('author');
        $dospem1 = $request->input('dospem1');
        $dospem2 = $request->input('dospem2');
        $tipe_ta = $request->input('tipe_ta');
        $tahun_terbit = $request->input('tahun_terbit');
        $kategori = $request->input('kategori');
        //foto_sampul
        $sampul = $request->file('sampul');
        $nama_sampul = 'Sampul'.$author.'.'.$request->file('sampul')->getClientOriginalExtension();
        $sampul->move('asset/img/',$nama_sampul);

        //file_tugas_akhir
        $file_metodologi = $request->file('file_metodologi');
        $nama_file_metodologi = 'Metodologi'.$author.'.'.$request->file('file_metodologi')->getClientOriginalExtension();
        $file_metodologi->move('asset/file/',$nama_file_metodologi);

        $file_pustaka = $request->file('file_pustaka');
        $nama_file_pustaka = 'Daftar Pustaka'.$author.'.'.$request->file('file_pustaka')->getClientOriginalExtension();
        $file_pustaka->move('asset/file/',$nama_file_pustaka);

        $file_tugasakhir = $request->file('file_tugasakhir');
        $nama_file_tugasakhir = 'Isi TA'.$author.'.'.$request->file('file_tugasakhir')->getClientOriginalExtension();
        $file_tugasakhir->move('asset/file/',$nama_file_tugasakhir);

        
        DB::select('CALL p_tambah_tugas_akhir(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $judul,
            $abstrak,
            $nama_sampul,
            $tipe_ta,
            $author,
            $kategori,
            $dospem1,
            $dospem2,
            $tahun_terbit,
            $nama_file_metodologi,
            $nama_file_pustaka,
            $nama_file_tugasakhir
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
