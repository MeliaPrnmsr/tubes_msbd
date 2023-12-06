<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TugasAkhir;
use App\Models\Like;
use App\Models\Dosenpembimbing;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingDosen(Request $request)
    {
        $popular_skripsi = DB::table('v_tugasakhir_terpopuler')
        ->join('tugas_akhirs', 'v_tugasakhir_terpopuler.tugasakhir_id', '=', 'tugas_akhirs.id_tugasakhir')
        ->join('mahasiswas', 'tugas_akhirs.author', '=', 'mahasiswas.NIM')
        ->select('tugas_akhirs.*', 'v_tugasakhir_terpopuler.jumlah_like', 'mahasiswas.nama_mahasiswa')
        ->orderByDesc('v_tugasakhir_terpopuler.jumlah_like')
        ->get();


        $results = DB::table('tugas_akhirs')
            ->select('tipe_ta', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('tipe_ta')
            ->get();

        return view('dosen.dlandingpage', [
            'popular_skripsi' => $popular_skripsi,
            'results' => $results
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profileDosen()
    {
        $profil = DB::table('profil_dosen')->where('user_id', auth()->user()->id_user)->first();
        return view('dosen.dprofile', [
            'nama_lengkap' => $profil->nama_dosen,
            'email' => $profil->email,
            'nip' => $profil->NIP,
            'nidn' => $profil->NIDN,
            'program_studi' => $profil->nama_prodi
        ]);
    }

    public function editprofilDosen()
    {
        $profil = DB::table('profil_dosen')->where('user_id', auth()->user()->id_user)->first();
        return view('dosen.dprofile', [
            'nama_lengkap' => $profil->nama_dosen,
            'email' => $profil->email,
            'nip' => $profil->NIP,
            'nidn' => $profil->NIDN,
            'program_studi' => $profil->nama_prodi
        ]);

    }

    public function inserteditprofildosen(Request $request)
    {
        $id = Dosen::where('user_id', auth()->user()->id_user)->value('user_id');
        $nama = $request->input('nama');
        // $request->validate([
        //     'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        // ]);
        // $foto = $request->file('photo')->store('dosenfoto');
        $email = $request->input('email');

        DB::select('CALL p_editprofil_dosen(?, ?, ?)', [
        $id,
        $nama,
        $email
        // $foto
        ]); 
        
        return redirect()->route('profile.dosen')->with('succes', 'Data Dosen Berhasil Diubah!');
    }

    
    public function bimbinganDosen()
    {
       
        return view('dosen.dbimbingan', [
            'tugasbimbings' => DB::table('profil_dosen')->where('user_id', auth()->user()->id_user)->get()

        ]);
    }

    public function bookmarkDosen()
    {
        return view('dosen.dbookmark');
    }

    public function searchDosen(Request $request)
    {
        $jenis = $request->input('jenis_koleksi');
        $search = $request->input('search');

        session(['pilihan_jeniskoleksi' => $jenis]);

        $results = DB::table('v_seluruh_tugas_akhirs')
        ->select('judul', 'sampul', 'abstrak', 'author')
        ->orWhere(function ($query) use ($jenis, $search){

            if($jenis == 'skripsi'){
                $query->where('judul', 'LIKE', '%' . $search . '%')
                ->where('tipe_ta', '=', 'skripsi');
            }
            elseif($jenis == 'tesis'){
                $query->where('judul', 'LIKE', '%' . $search . '%')
                ->where('tipe_ta', '=', 'tesis');
            }
            elseif($jenis == 'disertasi'){
                $query->where('judul', 'LIKE', '%' . $search . '%')
                ->where('tipe_ta', '=', 'disertasi');
            }else{
                $query->where('judul', 'LIKE', '%' . $search . '%');
            }
        })->get();

        return view('dosen.dsearch', [
            'results' => $results,
            'search' => $search
        ]);
    }

    public function browseallDosen()
    {
        $tahun_terbit = DB::table('v_tugasakhir_pertahunterbit')
        ->orderBy('tahun_terbit', 'DESC')
        ->get();

        $kategori = DB::table('v_tugasakhir_kategori')
        ->orderBy('nama_kategori', 'ASC')
        ->get();

        $skripsi = DB::table('v_tugasakhir_skripsi')
        ->orderBy('judul', 'ASC')
        ->get();

        $tesis = DB::table('v_tugasakhir_tesis')
        ->orderBy('judul', 'ASC')
        ->get();

        $disertasi = DB::table('v_tugasakhir_disertasi')
        ->orderBy('judul', 'ASC')
        ->get();
        //dd($tahun_terbit);
        return view('dosen.dbrowseall', [
            'tahun_terbit' => $tahun_terbit,
            'kategori' => $kategori,
            'skripsi' => $skripsi,
            'tesis' => $tesis,
            'disertasi' => $disertasi
        ]);
    }
    
    public function abstrakDosen()
    {
        return view('dosen.dabstrak');
    }
      
    public function detailskripsiDosen($id_tugasakhir)
    {
        //$tugasakhir = TugasAkhir::find($id_tugasakhir);
        $tugasakhir = TugasAkhir::with('dokumenfiles')->find($id_tugasakhir);
        $author_nim = $tugasakhir->author;
        $dosen_pembimbing = Dosenpembimbing::where('NIM', $author_nim)->with('dosen')->get();
        //dd($tugasakhir);
        return view('dosen.dopenskrip', ['tugasakhir' => $tugasakhir, 'dosen_pembimbing' => $dosen_pembimbing]);
    }

    // public function search(Request $request){
    //     $jenis = $request->input('jenis_koleksi');
    //     $search = $request->input('search');


    // }

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
