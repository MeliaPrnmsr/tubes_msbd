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

    public function dospem(Request $request, $nama_dosen)
    {
        $dosen = DB::table('v_tugasakhir_dospem')->where('nama_dosen', $nama_dosen)->first();

        $query = DB::table('v_tugasakhir_dospem')->where('nama_dosen', $nama_dosen);

        $search = $request->input('search');
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('tahun_terbit', 'like', '%' . $search . '%')
                    ->orWhere('tipe_ta', 'like', '%' . $search . '%');
            });
        }
    
        $tugas_akhir = $query->paginate(10);
        return view('pengunjung.pdospem', compact('tugas_akhir', 'dosen'));
    }

    public function detailTugasakhir($id_tugasakhir)
    {
        // Mengambil data tugas akhir dari tabel sesuai dengan ID yang diberikan
        $tugas_akhir = TugasAkhir::where('id_tugasakhir', $id_tugasakhir)->first();

        $tipe_ta = $tugas_akhir->tipe_ta;

        if ($tipe_ta == 'skripsi' || $tipe_ta == 'tesis') {
            $tugasakhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();
            $kategoriId = $tugas_akhir->kategori_id ?? null;

            $serupa = DB::table('v_data_tugasakhir')
                ->where('kategori_id', $kategoriId)
                ->where('id_tugasakhir', '!=', $id_tugasakhir)
                ->limit(7)
                ->get();

            return view('pengunjung.popenskrip', ['tugasakhir' => $tugasakhir, 'serupa' => $serupa]);
        } else {
            $tugasakhir = DB::table('v_data_disertasi')->where('id_tugasakhir', $id_tugasakhir)->first();
            $kategoriId = $tugas_akhir->kategori_id ?? null;

            $serupa = DB::table('v_data_disertasi')
                ->where('kategori_id', $kategoriId)
                ->where('id_tugasakhir', '!=', $id_tugasakhir)
                ->limit(7)
                ->get();

            return view('pengunjung.popenskrip', ['tugasakhir' => $tugasakhir, 'serupa' => $serupa]);
        }
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

    public function aboutUs()
    {
        return view('pengunjung.aboutus');
    }

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
