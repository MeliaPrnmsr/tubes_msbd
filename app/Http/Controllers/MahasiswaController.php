<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Prodi;
use App\Models\TugasAkhir;
use App\Models\Kategori;
use App\Models\Like;
use App\Models\Mahasiswa;
use App\Models\Bookmark;
// use App\Models\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingMhs()
    {
        $totalTugasAkhir = TugasAkhir::count();
        $popular_skripsi = DB::table('v_tugasakhir_terpopuler')->take(6)->get();


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

        $kategoriId = $tugasakhir->kategori_id ?? null;
    
        $serupa = DB::table('v_data_tugasakhir')
                    ->where('kategori_id', $kategoriId)
                    ->where('id_tugasakhir', '!=', $id_tugasakhir)
                    ->limit(7)
                    ->get();

        $isLikedByUser = Like::where('tugasakhir_id', $id_tugasakhir)
                         ->where('user_id', Auth::user()->id_user)
                         ->exists();
        
        $isBookmarkByUser = Bookmark::where('tugasakhir_id', $id_tugasakhir)->where('user_id', Auth::user()->id_user)->exists();

        return view('mahasiswa.mopenskrip', ['tugasakhir' => $tugasakhir, 'isLikedByUser' =>  $isLikedByUser,
        'isBookmarkByUser' =>  $isBookmarkByUser, 'serupa' =>  $serupa
        ]);
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
        $userId = Auth::id();

        $bookmarks = Bookmark::where('user_id', $userId)->get();
        $tugasAkhirIds = $bookmarks->pluck('tugasakhir_id')->toArray();

        $bookmarks = DB::table('v_data_tugasakhir')->whereIn('id_tugasakhir', $tugasAkhirIds)->paginate(10);
    
        return view('mahasiswa.mbookmark', ['bookmarks' => $bookmarks]);
    }


    public function bookmarkTugasAkhir(Request $request)
    {
        $idTugasAkhir = $request->input('id_tugasakhir');
        $idUser = $request->input('id_user');

        $existingBookmark = Bookmark::where('tugasakhir_id', $idTugasAkhir)
                            ->where('user_id', $idUser)
                            ->first();

        if ($existingBookmark) {
            $existingBookmark->delete();
        } else {
            Bookmark::create([
                'tanggal' => Carbon::now(),
                'tugasakhir_id' => $idTugasAkhir,
                'user_id' => $idUser,
            ]);
        }

        return redirect()->back()->with('success', 'Tugas Akhir liked successfully!');
    }

    public function likeTugasAkhir(Request $request)
    {
        $idTugasAkhir = $request->input('id_tugasakhir');
        $idUser = $request->input('id_user');

        $existingLike = Like::where('tugasakhir_id', $idTugasAkhir)
                            ->where('user_id', $idUser)
                            ->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            Like::create([
                'tugasakhir_id' => $idTugasAkhir,
                'user_id' => $idUser,
            ]);
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
        ->orderBy('tahun_terbit','desc')
        ->get();
        $groupedTahun = $tahun_terbit->groupBy('tahun_terbit');

        $kategori = DB::table('v_tugasakhir_kategori')->get();
        $groupedKategori = $kategori->groupBy('nama_kategori');
        
        $skripsi = DB::table('v_tugasakhir_skripsi')->paginate(10);
        $tesis = DB::table('v_tugasakhir_tesis')->paginate(10);
        $disertasi = DB::table('v_tugasakhir_disertasi')->paginate(10);

        return view('mahasiswa.mbrowseall', [
            'tahun_terbit' => $tahun_terbit,
            'kategori' => $kategori,
            'skripsi' => $skripsi,
            'tesis' => $tesis,
            'disertasi' => $disertasi,
            'groupedKategori' => $groupedKategori,
            'groupedTahun' => $groupedTahun
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
