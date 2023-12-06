<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\TugasAkhir;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahSkripsi = TugasAkhir::where('tipe_ta', 'skripsi')->count();
        $tugasAkhirSkripsiTerbaru =  TugasAkhir::where('tipe_ta', 'skripsi')
        ->latest('date_added')
         ->first();

        $jumlahTesis = TugasAkhir::where('tipe_ta', 'tesis')->count();
        $tugasAkhirTesisTerbaru =  TugasAkhir::where('tipe_ta', 'tesis')
        ->latest('date_added')
        ->first();



        $jumlahDisertasi = TugasAkhir::where('tipe_ta', 'disertasi')->count();
        $tugasAkhirDisertasiTerbaru =  TugasAkhir::where('tipe_ta', 'disertasi')
        ->latest('date_added')
        ->first();



        $jumlahDosen = User::where('role','dosen')->count();
        $DosenTerbaru = User::where('role','dosen')
        ->latest('created_at')
        ->first();


        $jumlahMahasiswa = User::where('role','mahasiswa')->count();
        $MahasiswaTerbaru = User::where('role','mahasiswa')
        ->latest('created_at')
        ->first();


        $jumlahStaff = User::where('role','staff')->count();
        $StaffTerbaru = User::where('role','staff')
        ->latest('created_at')
        ->first();


        //View
        $topLikeTugasAkhir = DB::table('top_like_tugas_akhir')->get();
        $baruDitambah = DB::table('judul_baru_ditambahkan')->get();



        return view('admin.dashboard_admin', 
        compact('jumlahSkripsi','tugasAkhirSkripsiTerbaru',
        'jumlahTesis','tugasAkhirTesisTerbaru',
        'jumlahDisertasi','tugasAkhirDisertasiTerbaru',
        'jumlahDosen','DosenTerbaru',
        'jumlahMahasiswa','MahasiswaTerbaru',
        'jumlahStaff','StaffTerbaru',
        'topLikeTugasAkhir','baruDitambah'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataMahasiswa(Request $request)
    {
            $search = $request->input('search');
            $query = DB::table('v_data_mahasiswa')
                    ->orderBy('nama_mahasiswa', 'asc');
    
            if(!empty(request('search')))
            {
                $query->where('nama_mahasiswa','like','%'. $search .'%')
                                ->orWhere('NIM','like','%'. $search .'%')
                                ->orWhere('nama_prodi', 'like', '%' . $search . '%');
            }
    
            $cariMahasiswa = $query->paginate(10);
    
            return view('admin.datamahasiswa_admin',compact('cariMahasiswa','search')); 
        
    }

    public function dataDosen(Request $request)
    {

        $search = $request->input('search');
        $query = DB::table('v_data_dosen')
                ->orderBy('nama_dosen', 'asc');

        if(!empty(request('search')))
        {
            $query->where('nama_dosen','like','%'. $search .'%')
                            ->orWhere('NIP','like','%'. $search .'%')
                            ->orWhere('nama_prodi', 'like', '%' . $search . '%');
        }

        $cariDosen = $query->paginate(10);

        return view('admin.datadosen_admin',compact('cariDosen','search'));
    }

    public function dataStaff(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('v_data_staff')
                ->orderBy('nama_staff', 'asc');

        if(!empty(request('search')))
        {
            $query->where('nama_staff','like','%'. $search .'%')
                            ->orWhere('kode_staff','like','%'. $search .'%')
                            ->orWhere('nama_prodi','like','%'. $search .'%');

        }

        $cariStaff = $query->paginate(2);

        return view('admin.datastaff_admin',compact('cariStaff','search'));
    }

    public function dataTugasakhir(Request $request)
    {

        $search = $request->input('search');
        $query = DB::table('v_data_tugasakhir')
                ->orderBy('judul', 'asc');

        if(!empty(request('search')))
        {
            $query->where('judul','like','%'. $search .'%')
                            ->orWhere('tipe_ta','like','%'. $search .'%')
                            ->orWhere('tahun_terbit','like','%'. $search .'%');

        }

        $cariTugas = $query->paginate(10);

        return view('admin.datatugasakhir_admin',compact('cariTugas','search'));
    }

    public function dataKategori()
    {
        $query = DB::table('v_data_kategori')
                    ->orderBy('jenjang','asc')
                    ->groupBy('nama_prodi')
                    ->get();

        $collection = DB::table('v_data_kategori')->get();

        return view('admin.datakategori_admin',compact('query', 'collection'));
    }

    public function notifikasi()
    {
        // $query = DB::table('log_likes')
        //             ->orderBy('waktu_dibuat', 'desc')
        //             ->paginate(3);


        // return view('admin.notifikasi_admin',compact('query'));
        return view('admin.notifikasi_admin');
    }

    public function log(Request $request)
    {

        // $search = $request->input('search');
        // $query = DB::table('view_log_admin')
        //         ->orderBy('waktu', 'desc');

        // if(!empty(request('search')))
        // {
        //     $query->where('action','like','%'. $search .'%')
        //                     ->orWhere('waktu','like','%'. $search .'%')
        //                     ->orWhere('deskripsi', 'like', '%' . $search . '%');
        // }

        // $cariLog = $query->paginate(3);

        // return view('admin.log',compact('cariLog','search'));
        return view('admin.log');
    }

    public function tambahSkripsi()
    {
        return view('admin.tambahskripadmin');
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
