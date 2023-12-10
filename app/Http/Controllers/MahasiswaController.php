<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;

use App\Models\Prodi;
use App\Models\TugasAkhir;
use App\Models\Kategori;
use App\Models\Like;
use App\Models\Mahasiswa;
// use App\Models\Dosenpembimbing;
// use App\Models\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingMhs()
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

        return view('mahasiswa.mlandingpage', [
            'popular_skripsi' => $popular_skripsi,
            'results' => $results,
            'totalTugasAkhir' => $totalTugasAkhir
        ]);
    }

    public function cariLanding(Request $request)
    {
        $search = $request->input('search');
        $results = TugasAkhir::where(function ($results) use ($search) {
            $results->where('judul', 'LIKE', '%' . $search . '%');
        });

        return view('mahasiswa.msearch', ['results' => $results]);
    }

    public function detailMhs($id_tugasakhir)
    {
        $tugasakhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();
        return view('mahasiswa.mopenskrip', ['tugasakhir' => $tugasakhir]);
    }

    public function profilMhs()
    {
        $mahasiswas = Mahasiswa::with('prodi')->where('user_id', auth()->id())->first();
        return view('mahasiswa.mprofile', compact('mahasiswas'));
    }

    public function editprofilMhs()
    {
        $mahasiswas = Mahasiswa::with('prodi')->where('user_id', auth()->id())->first();
        return view('mahasiswa.meditprofil', compact('mahasiswas'));
    }

    public function UpdateProfil(Request $request)
    {
        $user_login = auth()->user()->id_user;
        $emailBaru = $request->input('email');
        $namaBaru = $request->input('nama_mahasiswa');

        $user = auth()->user();
        $pathFoto = $user->mahasiswa->foto ?? $user->foto;

        if ($request->hasFile('foto')) {
            $fotoBaru = $request->file('foto');
            $namaFoto = $user->username . '.' . $fotoBaru->getClientOriginalExtension();
            $path = public_path('asset/img/');
            $fotoBaru->move($path, $namaFoto);
            $pathFoto = $namaFoto;
        }

        DB::select('CALL p_update_profilMhs(?, ?, ?, ?)', [
            $user_login,
            $emailBaru,
            $namaBaru,
            $pathFoto,
        ]);

        return redirect()->route('profile.mahasiswa')->with('success', 'Profil berhasil diperbarui');
    }


    public function bookmarkMhs()
    {
        return view('mahasiswa.mbookmark');
    }

    public function likeTugasAkhir(Request $request)
    {
        $tugasAkhirId = $request->input('id_tugasakhir');
        $userId = $request->input('id_user');

        $existingLike = Like::where('tugasakhir_id', $tugasAkhirId)
                            ->where('user_id', $userId)
                            ->first();

        if (!$existingLike) {
            Like::create([
                'tugasakhir_id' => $tugasAkhirId,
                'user_id' => $userId,
                'status' => 1
            ]);
        } else {
            $existingLike->status = $existingLike->status === null ? 1 : ($existingLike->status == 1 ? 0 : 1);
            $existingLike->save();
        }

        return redirect()->back()->with('success', 'Tugas Akhir liked successfully!');
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
