<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\TugasAkhir;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                    ->orderBy('prodi_id', 'asc');
    
            if(!empty(request('search')))
            {
                $query->where('nama_mahasiswa','like','%'. $search .'%')
                                ->orWhere('NIM','like','%'. $search .'%')
                                ->orWhere('nama_prodi', 'like', '%' . $search . '%');
            }
    
            $cariMahasiswa = $query->paginate(10);
    
            return view('admin.datamahasiswa_admin',compact('cariMahasiswa','search')); 
        
    }

    public function detailMahasiswa($NIM)
    {
        $mahasiswa = DB::table('v_data_mahasiswa')->where('NIM', $NIM)->first();
        return view('admin.detailMahasiswa_admin', ['mahasiswa' => $mahasiswa]);

    }

    public function dataDosen(Request $request)
    {

        $search = $request->input('search');
        $query = DB::table('v_data_dosen')
                ->orderBy('prodi_id', 'asc');

        if(!empty(request('search')))
        {
            $query->where('nama_dosen','like','%'. $search .'%')
                            ->orWhere('NIP','like','%'. $search .'%')
                            ->orWhere('nama_prodi', 'like', '%' . $search . '%');
        }

        $cariDosen = $query->paginate(10);

        return view('admin.datadosen_admin',compact('cariDosen','search'));
    }

    public function detailDosen($kode_dosen)
    {
        $dosen = DB::table('v_data_dosen')->where('kode_dosen', $kode_dosen)->first();
        return view('admin.detailDosen', ['dosen' => $dosen]);

    }

    public function dataStaff(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('v_data_staff')
                ->orderBy('prodi_id', 'asc');

        if(!empty(request('search')))
        {
            $query->where('nama_staff','like','%'. $search .'%')
                            ->orWhere('kode_staff','like','%'. $search .'%')
                            ->orWhere('nama_prodi','like','%'. $search .'%');

        }

        $cariStaff = $query->paginate(10);

        return view('admin.datastaff_admin',compact('cariStaff','search'));
    }

    public function detailStaff($kode_staff)
    {
        $staff = DB::table('v_data_staff')->where('kode_staff', $kode_staff)->first();
        return view('admin.detailStaff', ['staff' => $staff]);

    }

    public function tambahStaff() {
        $prodis = Prodi::all();
        return view('admin.tambahStaff', ['prodis' => $prodis]);

    }

    public function insertStaff(Request $request)
    {
        $validasidata = $request->validate([
            'kode_staff' => ['required', 'unique:staff,kode_staff', 'size:5'],
            'nama_staff' => ['required', 'regex:/^[A-Za-z\s\-,\.]+$/u'],
            'email' => 'required|email|unique:users,email',
            'prodi' => 'required|not_in:0'
        ]);

        $kode_staff = $request->input('kode_staff');
        $username = $kode_staff;
        $password = Hash::make($kode_staff);
        $email = $request->input('email');
        $nama_staff = $request->input('nama_staff');
        $role = 'staff';
        $prodi_id = $request->input('prodi');


        DB::select('CALL p_tambah_user_staff(?, ?, ?, ?, ?, ?, ?)', [
            $username,
            $email,
            $password,
            $role,
            $kode_staff,
            $nama_staff,
            $prodi_id
        ]);

        return redirect()->route('datastaff.admin')->with('success', 'Data Staff berhasil ditambahkan');
    }


    public function editStaff($kode_staff)
    {
        $prodis = Prodi::all();
        $staff = DB::table('v_data_staff')->where('kode_staff', $kode_staff)->first();
        return view('admin.updateStaff', ['prodis' => $prodis, 'staff' => $staff]);
    }

    public function updateStaff(Request $request) {        
        
        $kode_staff = $request->input('kode');
        $nama_staff = $request->input('nama');
        $email = $request->input('email');
        $prodi = $request->input('prodi');
        $id_user = $request->input('user_id');


        DB::select('CALL p_perbarui_staff(?, ?, ?, ?, ?)', [
            $kode_staff,
            $nama_staff,
            $email,
            $prodi,
            $id_user    
            
        ]);

        return redirect()->route('datastaff.admin')->with('success', 'Data Dosen berhasil diperbarui');

    }


    public function dataTugasakhir(Request $request)
    {

        $search = $request->input('search');
        $query = DB::table('v_semua_tugasakhir')
                ->orderBy('tipe_ta', 'asc');

        if(!empty(request('search')))
        {
            $query->where('judul','like','%'. $search .'%')
                            ->orWhere('tipe_ta','like','%'. $search .'%')
                            ->orWhere('nama_mahasiswa','like','%'. $search .'%')
                            ->orWhere('tahun_terbit','like','%'. $search .'%');

        }

        $cariTugas = $query->paginate(10);

        return view('admin.datatugasakhir_admin',compact('cariTugas','search'));
    }

    public function detailTugasakhir($id_tugasakhir)
    {
        $tugasakhir = TugasAkhir::where('id_tugasakhir', $id_tugasakhir)->first();
        $tipe_ta = $tugasakhir->tipe_ta;

        if ($tipe_ta == 'skripsi' || $tipe_ta == 'tesis') {

            $tugas_akhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();

            return view('admin.detailTugasakhir_admin', ['tugasakhir' => $tugas_akhir]);
            
        } else {

            $tugas_akhir = DB::table('v_data_disertasi')->where('id_tugasakhir', $id_tugasakhir)->first();

            return view('admin.detailTugasakhir_admin', ['tugasakhir' => $tugas_akhir]);
        }

    }

    public function dataKategori()
    {
        $query = DB::table('v_data_kategori')
                    ->orderBy('jenjang','asc')
                    ->groupBy('prodi_id')
                    ->get();

        $collection = DB::table('v_data_kategori')->get();

        return view('admin.datakategori_admin',compact('query', 'collection'));
    }

    public function notifikasi()
    {
        $query = DB::table('log_likes')
                    ->orderBy('waktu_dibuat', 'desc')
                    ->paginate(10);


        return view('admin.notifikasi_admin',compact('query'));
    }

    public function log(Request $request)
    {

        $search = $request->input('search');
        $query = DB::table('log_akuns')
                ->orderBy('waktu', 'desc');

        if(!empty(request('search')))
        {
            $query->where('action','like','%'. $search .'%')
                            ->orWhere('waktu','like','%'. $search .'%')
                            ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }

        $cariLog = $query->paginate(15);

        return view('admin.log',compact('cariLog','search'));
    }
}
