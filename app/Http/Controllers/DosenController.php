<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\TugasAkhir;
use App\Models\Like;
use App\Models\Dosenpembimbing;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Kategori;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingDosen()
    {
        $totalTugasAkhir = TugasAkhir::count();
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
            'results' => $results,
            'totalTugasAkhir' => $totalTugasAkhir
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profileDosen()
    {
        $dosens = DB::table('v_data_dosen')->where('user_id', auth()->id())->first();
        return view('dosen.dprofile', compact('dosens'));
    }

    public function editprofilDosen()
    {
        $dosens = DB::table('v_data_dosen')->where('user_id', auth()->user()->id_user)->first();
        return view('dosen.deditprofil', compact('dosens'));
    }

    public function inserteditprofildosen(Request $request)
    {
        $user_login = auth()->user()->id_user;
        $emailBaru = $request->input('email');
        $namaBaru = $request->input('nama');

        $user = auth()->user();
        $pathFoto = $user->dosen->foto ?? $user->foto;

        if ($request->hasFile('foto')) {
            $fotoBaru = $request->file('foto');
            $namaFoto = $user->username . '.' . $fotoBaru->getClientOriginalExtension();
            $path = public_path('asset/img/');
            $fotoBaru->move($path, $namaFoto);
            $pathFoto = $namaFoto;
        }

        DB::select('CALL p_editprofil_dosen(?, ?, ?, ?)', [
            $user_login,
            $emailBaru,
            $namaBaru,
            $pathFoto,
        ]);

        return redirect()->route('profile.dosen')->with('succes', 'Data Dosen Berhasil Diubah!');
    }

    public function bimbinganDosen()
    {
        return view('dosen.dbimbingan');
    }

    public function bookmarkDosen()
    {
        return view('dosen.dbookmark');
    }

    public function searchDosen(Request $request)
    {
        $search = $request->input('search');
        $prodi = $request->input('prodi');
        $kategori = $request->input('kategori');

        $query = DB::table('v_data_tugasakhir');

        if (!empty($search)) {
            $query->where('judul', 'LIKE', "%$search%");
        }

        if (!empty($prodi)) {
            $query->where('prodi_id', $prodi);
        }

        if (!empty($kategori)) {
            $query->where('kategori_id', $kategori);
        }

        $tugasAkhir = $query->get();


        $prodis = Prodi::all();
        $kategoris = Kategori::orderBy('prodi_id')->get();

        return view('dosen.dsearch', compact('tugasAkhir', 'prodis', 'kategoris'));
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
        $tugasakhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();
        return view('dosen.dopenskrip', ['tugasakhir' => $tugasakhir]);
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
