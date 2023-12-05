<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TugasAkhir;
use App\Models\Kategori;
use App\Models\Prodi;
use App\Models\DokumenFile;
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
        $tugasakhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();

        return view('mahasiswa.mopenskrip', ['tugasakhir' => $tugasakhir]);
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


    public function searchMhs(Request $request)
    {
        $searchTerm = $request->input('search');

        $tugas_akhirs = TugasAkhir::all();
        $tipe_ta_lists = TugasAkhir::distinct()->get('tipe_ta');
        $prodis = Prodi::all();
        $kategoris = Kategori::all();

        return view('mahasiswa.msearch', compact('tugas_akhirs', 'prodis', 'kategoris', 'tipe_ta_lists', 'searchTerm'));
    }


    // public function hasil_search(Request $request)
    // {
        
    //     if ($request->ajax()) {
    //         $results = TugasAkhir::query(); // Inisialisasi query builder
            
    //         $searchTerm = $request->input('search');
    //         $kategoriFilter = $request->input('kategori');
    //         $prodiFilter = $request->input('prodi');
    
    //         if (!empty($searchTerm)) {
    //             $results->where('judul', 'like', '%' . $searchTerm . '%');
    //         }
    
    //         if ($kategoriFilter) {
    //             $results->whereHas('kategori', function ($q) use ($kategoriFilter) {
    //                 $q->where('id_kategori', $kategoriFilter);
    //             });
    //         }
    
    //         if ($prodiFilter) {
    //             $results->whereHas('kategori.prodi', function ($q) use ($prodiFilter) {
    //                 $q->where('id_prodi', $prodiFilter);
    //             });
    //         }
    
    //         $results = $results->get(); 
            
    //         $output = '';

    //         if(count($results) > 0) {
    //             $output = '';
    //                 if (count($results) > 0)
    //                     foreach($results as $result)
    //                     $output = '
    //                     <div class="card mb-3  ">
    //                         <div class="row p-2">
    //                             <div class="col-2">
    //                                 <img src="asset/img/.$result->sampul" alt="" class="w-100">
    //                             </div>
    //                             <div class="col-10 justify-content-start">
    //                                 <h6><b>{{$result->judul}}</b></h6>
    //                                 <small style="font-size: 75%">Penulis : <b>nama_mahasiswa</b></small>
    //                                 <hr>
    //                                 <small style="font-size: 70%"><i>{{$result->judul}}</i></small>
    //                             </div>
    //                         </div>
    //                     </div>
    //                     endforeach ';
    //         }

    //     } else {
    //         $output = "<p> hasil tidak tersedia </p>";
    //     }

    //     return $output;
    // }

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
