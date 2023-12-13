<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\TugasAkhir;
use App\Models\Like;
use App\Models\Dosenpembimbing;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Kategori;
use App\Models\Bookmark;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingDosen(Request $request)
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
        $user_login = auth()->user()->dosen->kode_dosen;

        $bimbingans = DB::table('V_tugasakhir_dospem')->where('kode_dosen', $user_login)->paginate(10);
        return view('dosen.dbimbingan', ['bimbingans' => $bimbingans]);
    }

    public function bookmarkDosen()
    {
        $userId = Auth::id();

        $bookmarks = Bookmark::where('user_id', $userId)->get();
        $tugasAkhirIds = $bookmarks->pluck('tugasakhir_id')->toArray();

        $bookmarks = DB::table('v_data_tugasakhir')->whereIn('id_tugasakhir', $tugasAkhirIds)->paginate(10);
    
        return view('dosen.dbookmark', ['bookmarks' => $bookmarks]);
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
        

        return view('dosen.dsearch', compact('tugasAkhir', 'prodis', 'kategoris', 'search'));
    }

    public function browseallDosen()
    {
        $tahun_terbit = DB::table('v_tugasakhir_pertahunterbit')->get();
        $groupedTahun = $tahun_terbit->groupBy('tahun_terbit');

        $kategori = DB::table('v_tugasakhir_kategori')->get();
        $groupedKategori = $kategori->groupBy('nama_kategori');
        
        $skripsi = DB::table('v_tugasakhir_skripsi')->get();
        $tesis = DB::table('v_tugasakhir_tesis')->get();
        $disertasi = DB::table('v_tugasakhir_disertasi')->get();
        return view('dosen.dbrowseall', [
            'tahun_terbit' => $tahun_terbit,
            'kategori' => $kategori,
            'skripsi' => $skripsi,
            'tesis' => $tesis,
            'disertasi' => $disertasi,
            'groupedKategori' => $groupedKategori,
            'groupedTahun' => $groupedTahun
        ]);
    }

    public function abstrakDosen()
    {
        return view('dosen.dabstrak');
    }

    public function detailskripsiDosen($id_tugasakhir)
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
        
        $isBookmarkByUser = Bookmark::where('tugasakhir_id', $id_tugasakhir)
        ->where('user_id', Auth::user()->id_user)
        ->exists();


        return view('dosen.dopenskrip', ['tugasakhir' => $tugasakhir,
        'isLikedByUser' =>  $isLikedByUser,
        'isBookmarkByUser' =>  $isBookmarkByUser, 'serupa' =>  $serupa
    ]);
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
