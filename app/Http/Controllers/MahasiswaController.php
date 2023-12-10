<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TugasAkhir;
use App\Models\Like;
use App\Models\Dosenpembimbing;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingMhs()
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

        return view('mahasiswa.mlandingpage', [
            'popular_skripsi' => $popular_skripsi,
            'results' => $results
        ]);
    }

    public function detailMhs($id_tugasakhir)
    {
        $tugasakhir = TugasAkhir::find($id_tugasakhir);
        $author_nim = $tugasakhir->author;
        $dosen_pembimbing = Dosenpembimbing::where('NIM', $author_nim)->with('dosen')->get();

        return view('mahasiswa.mopenskrip', ['tugasakhir' => $tugasakhir, 'dosen_pembimbing' => $dosen_pembimbing]);    
    }

    public function profilMhs()
    {
        return view('mahasiswa.mprofile');
    }

    public function editprofilMhs()
    {
        return view('mahasiswa.meditprofil');
    }

    public function bookmarkMhs()
    {
        return view('mahasiswa.mbookmark');
    }

    public function searchMhs()
    {
        return view('mahasiswa.msearch');
    }

    public function browseallMhs()
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
        return view('mahasiswa.mbrowseall', [
            'tahun_terbit' => $tahun_terbit,
            'kategori' => $kategori,
            'skripsi' => $skripsi,
            'tesis' => $tesis,
            'disertasi' => $disertasi
        ]);
    }

    public function abstrakMhs()
    {
        return view('mahasiswa.mabstrak');
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
