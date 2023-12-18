<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\TugasAkhir;
use App\Models\Like;
use App\Models\Dosenpembimbing;
use App\Models\Bookmark;


class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalTugasAkhir = TugasAkhir::count();
        $popular_skripsi = DB::table('v_tugasakhir_terpopuler')->take(6)->get();


        $results = DB::table('tugas_akhirs')
            ->select('tipe_ta', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('tipe_ta')
            ->get();

        return view('pengunjung.plandingpage', [
            'popular_skripsi' => $popular_skripsi,
            'results' => $results,
            'totalTugasAkhir' => $totalTugasAkhir
        ]);
    }


    public function search()
    {
        return view('pengunjung.psearch');
    }

    public function detailTugasakhir($id_tugasakhir)
    {
        $tugasakhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();

        $kategoriId = $tugasakhir->kategori_id ?? null;
    
        $serupa = DB::table('v_data_tugasakhir')
                    ->where('kategori_id', $kategoriId)
                    ->where('id_tugasakhir', '!=', $id_tugasakhir)
                    ->limit(7)
                    ->get();

        return view('pengunjung.popenskrip', ['tugasakhir' => $tugasakhir, 'serupa' =>  $serupa
        ]);
    }

    public function browseAll()
    {
        $tahun_terbit = DB::table('v_tugasakhir_pertahunterbit')
        ->orderBy('tahun_terbit', 'desc')
        ->get();
        $groupedTahun = $tahun_terbit->groupBy('tahun_terbit');

        $kategori = DB::table('v_tugasakhir_kategori')->get();
        $groupedKategori = $kategori->groupBy('nama_kategori');
        
        $skripsi = DB::table('v_tugasakhir_skripsi')->paginate(10);
        $tesis = DB::table('v_tugasakhir_tesis')->paginate(10);
        $disertasi = DB::table('v_tugasakhir_disertasi')->paginate(10);

        return view('pengunjung.pbrowseall', [
            'tahun_terbit' => $tahun_terbit,
            'kategori' => $kategori,
            'skripsi' => $skripsi,
            'tesis' => $tesis,
            'disertasi' => $disertasi,
            'groupedKategori' => $groupedKategori,
            'groupedTahun' => $groupedTahun
        ]);
        
    }

    public function abstrak()
    {
        return view('pengunjung.pabstrak');
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
