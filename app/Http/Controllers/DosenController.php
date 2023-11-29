<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TugasAkhir;
use App\Models\Like;
use App\Models\Dosenpembimbing;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingDosen()
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
        return view('dosen.dprofile');
    }

    public function editprofilDosen()
    {
        return view('dosen.deditprofil');
    }
    
    public function bimbinganDosen()
    {
        return view('dosen.dbimbingan');
    }

    public function bookmarkDosen()
    {
        return view('dosen.dbookmark');
    }

    public function searchDosen()
    {
        return view('dosen.dseacrh');
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
