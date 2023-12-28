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
        $popular_skripsi = DB::table('v_tugasakhir_terpopuler')->take(6)->get();


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

    public function dospemDsn(Request $request, $nama_dosen)
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
        return view('dosen.ddospem', compact('tugas_akhir', 'dosen'));
    }
    public function bimbinganDosen(Request $request)
    {
        $user_login = auth()->user()->dosen->kode_dosen;

        $query = DB::table('V_tugasakhir_dospem')->where('kode_dosen', $user_login);

        $search = $request->input('search');
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('tahun_terbit', 'like', '%' . $search . '%')
                    ->orWhere('tipe_ta', 'like', '%' . $search . '%');
            });
        }
    
        $bimbingans = $query->paginate(10);
        return view('dosen.dbimbingan', ['bimbingans' => $bimbingans]);
    }

    //data yang di bookmark
    public function bookmarkDosen(Request $request)
    {
        $userId = Auth::id();

        $bookmarks = Bookmark::where('user_id', $userId)->get();
        $tugasAkhirIds = $bookmarks->pluck('tugasakhir_id')->toArray();

        $query = DB::table('v_semua_tugasakhir')->whereIn('id_tugasakhir', $tugasAkhirIds);

        $search = $request->input('search');
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('tahun_terbit', 'like', '%' . $search . '%')
                    ->orWhere('nama_prodi', 'like', '%' . $search . '%')
                    ->orWhere('tipe_ta', 'like', '%' . $search . '%');
            });
        }
    
        $bookmarks = $query->paginate(10);

        return view('dosen.dbookmark', ['bookmarks' => $bookmarks, 'search' => $search]);
    }

    //proses menambahkan bookmark
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
        $tahun_terbit = DB::table('v_tugasakhir_pertahunterbit')
            ->orderBy('tahun_terbit', 'desc')
            ->get();
        $groupedTahun = $tahun_terbit->groupBy('tahun_terbit');

        $kategori = DB::table('v_tugasakhir_kategori')->get();
        $groupedKategori = $kategori->groupBy('nama_kategori');

        $skripsi = DB::table('v_tugasakhir_skripsi')->paginate(10);
        $tesis = DB::table('v_tugasakhir_tesis')->paginate(10);
        $disertasi = DB::table('v_tugasakhir_disertasi')->paginate(10);
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

            $isLikedByUser = Like::where('tugasakhir_id', $id_tugasakhir)
                ->where('user_id', Auth::user()->id_user)
                ->exists();

            $isBookmarkByUser = Bookmark::where('tugasakhir_id', $id_tugasakhir)->where('user_id', Auth::user()->id_user)->exists();

            return view('dosen.dopenskrip', ['tugasakhir' => $tugasakhir,
                'isLikedByUser' => $isLikedByUser,
                'isBookmarkByUser' => $isBookmarkByUser, 'serupa' => $serupa
            ]);
        } else {
            $tugasakhir = DB::table('v_data_disertasi')->where('id_tugasakhir', $id_tugasakhir)->first();
            $kategoriId = $tugas_akhir->kategori_id ?? null;

            $serupa = DB::table('v_data_disertasi')
                ->where('kategori_id', $kategoriId)
                ->where('id_tugasakhir', '!=', $id_tugasakhir)
                ->limit(7)
                ->get();

            $isLikedByUser = Like::where('tugasakhir_id', $id_tugasakhir)
                ->where('user_id', Auth::user()->id_user)
                ->exists();

            $isBookmarkByUser = Bookmark::where('tugasakhir_id', $id_tugasakhir)->where('user_id', Auth::user()->id_user)->exists();

            return view('dosen.dopenskrip', ['tugasakhir' => $tugasakhir,
                'isLikedByUser' => $isLikedByUser,
                'isBookmarkByUser' => $isBookmarkByUser, 'serupa' => $serupa
            ]);
        }



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
