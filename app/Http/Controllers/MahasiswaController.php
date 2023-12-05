<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;
use App\Models\TugasAkhir;
use App\Models\Like;
use App\Models\Mahasiswa;
use App\Models\Dosenpembimbing;
use App\Models\User as User;
use Illuminate\Support\Facades\Log;

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
        ->LIMIT(6)
        ->get();


        $results = DB::table('tugas_akhirs')
            ->select('tipe_ta', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('tipe_ta')
            ->get();

        return view('mahasiswa.mlandingpage', [
            'totalTugasAkhir' => $totalTugasAkhir,
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
        $fotoBaru = $request->file('foto');

        $pathFoto = '';

        if ($fotoBaru !== null) {
            $namaFoto = time() . '.' . $fotoBaru->getClientOriginalExtension();
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
    //{
        // if (!$mahasiswas) {
        //     return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        // }
        // if (!$mahasiswas || !$mahasiswas->NIM) {
        //     // Handle kasus ketika 'NIM' tidak ada
        //     return redirect()->back()->with('error', 'Data mahasiswa tidak valid.');
        // }
        // try {
        //     return DB::transaction(function () use ($request, $mahasiswas) {
        //         if (
        //             $request->NIM == $mahasiswas->NIM &&
        //             $request->nama_mahasiswa == $mahasiswas->nama_mahasiswa &&
        //             $request->jenis_kelamin == $mahasiswas->jenis_kelamin &&
        //             $request->tanggal_lahir == $mahasiswas->tanggal_lahir &&
        //             $request->alamat == $mahasiswas->alamat &&
        //             $request->email == $mahasiswas->user->email &&
        //             optional($request->file('image'))->store('assets/img')
        //         ) {
        //             return redirect(route('editprofil.mahasiswa', ['username' => $mahasiswas->user->username]))
        //                 ->with('success', 'Profil berhasil diupdate');
        //         }

        //         $rules = [
        //             'NIM' => 'same:' . $mahasiswas->NIM,
        //             'nama_mahasiswa' => 'required|max:40',
        //             'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        //             'alamat' => 'required',
        //             'tanggal_lahir' => 'required|max:40',
        //             'email' => 'required|max:40',
        //             'image' => 'image|file|max:2048',
        //         ];

        //         if ($request->nama_mahasiswa != $mahasiswas->nama_mahasiswa) {
        //             $rules['nama_mahasiswa'] = 'required|min:3|max:30|unique:mahasiswas';
        //         }
        //         if ($mahasiswas->user && $request->email != $mahasiswas->user->email) {
        //             $rules['email'] = 'required|email|unique:users|max:50'; 
        //         }

        //         $validatedData = $request->validate($rules);
        //         dd($validatedData['NIM']);

        //         if ($request->file('image')) {
        //             if ($request->oldImage != 'assets/img/profile.jpeg') {
        //                 Storage::delete($request->oldImage);
        //             }
        //             $validatedData['image'] = $request->file('image')->store('assets/img');
        //         }

        //         $id_user = Auth::id();
        //         $user = User::find($id_user);

        //         // Jika user belum ada, buat instance baru
        //         if (!$user) {
        //             $user = new User;
        //         }

        //         // Set nilai 'email'
        //         $user->email = $request->input('email');

        //         // Simpan perubahan
        //         $user->save();

        //         // Simpan Mahasiswa dan sambungkan dengan User
        //         $mahasiswas->fill($validatedData)->save();
        //         $mahasiswas->user()->associate($user);
        //         $mahasiswas->save();

    //             return redirect(route('editprofil.mahasiswa', ['username' => optional($mahasiswas->user)->username]))
    //                 ->with('success', 'Profil berhasil diupdate');
    //         });
    //     } catch (\Exception $e) {
    //         // Tangani kesalahan transaksi
    //         Log::error('Error updating profile: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Gagal mengupdate profile.');
    //     }
    // }

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
