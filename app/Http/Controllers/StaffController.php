<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//Pemanggilan Model
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\TugasAkhir;
use App\Models\Prodi;
use App\Models\Kategori;
use App\Models\User;
use App\Models\DokumenFile;

class StaffController extends Controller
{

    public function index()
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $prodi_data = Prodi::where("id_prodi", $prodiStaff)->first();

        $jumlahDosen = DB::table('v_data_dosen')->where('prodi_id', $prodiStaff)->count();


        $jumlahMahasiswa = DB::table('v_data_mahasiswa')->where('prodi_id', $prodiStaff)->count();

        $jumlahTugasakhir = DB::table('v_data_tugasakhir')
            ->join('kategoris', 'v_data_tugasakhir.kategori_id', '=', 'kategoris.id_kategori')
            ->where('kategoris.prodi_id', $prodiStaff)->count();

        //View
        $topLikeTugasAkhir = DB::table('top_like_tugas_akhir')->get();
        $baruDitambah = DB::table('judul_baru_ditambahkan')->get();

        return view('staff.dashboard_staff', compact('prodi_data', 'jumlahDosen',
            'jumlahMahasiswa', 'jumlahTugasakhir', 'topLikeTugasAkhir', 'baruDitambah'));
    }

    //Mahasiswa Part Start
    //Mahasiswa Part Start
    public function dataMahasiswa(Request $request)
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $search = $request->input('search');
        $query = DB::table('v_data_mahasiswa')->where('prodi_id', $prodiStaff);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_mahasiswa', 'like', '%' . $search . '%')
                    ->orWhere('NIM', 'like', '%' . $search . '%');
            });
        }

        $mahasiswas = $query->paginate(10);
        if ($mahasiswas->isEmpty()) {
            $noDataMessage = "Data tidak ditemukan";
            return view('staff.datamahasiswa_staff', ['mahasiswas' => $mahasiswas, 'search' => $search, 'noDataMessage' => $noDataMessage]);
        }
        return view('staff.datamahasiswa_staff', ['mahasiswas' => $mahasiswas, 'search' => $search]);
    }


    public function detailMahasiswa($NIM)
    {
        //$mahasiswa = Mahasiswa::find($NIM);
        $mahasiswa = DB::table('v_data_mahasiswa')->where('NIM', $NIM)->first();
        return view('staff.detailMahasiswa_staff', ['mahasiswa' => $mahasiswa]);
    }

    public function tambahMahasiswa()
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $prodis = Prodi::where('id_prodi', $prodiStaff)->get();
        return view('staff.tambahMahasiswa', ['prodis' => $prodis]);
    }

    public function insertMahasiswa(Request $request)
    {
        $request->validate([
            'NIM' => 'required|unique:mahasiswas,NIM|numeric|digits:9',
            'nama_mahasiswa' => ['required', 'regex:/^[A-Za-z\s\-]+$/u'],
            'email' => 'required|email|unique:users,email',
            'prodi' => 'required|not_in:0'
        ]);

        $nim = $request->input('NIM');
        $nimString = strval($nim);
        $nama_mahasiswa = $request->input('nama_mahasiswa');
        $username = $nimString;
        $email = $request->input('email');
        $password = Hash::make($nimString);
        $role = 'mahasiswa';
        $prodi_id = $request->input('prodi');

        DB::select('CALL p_tambah_user_mahasiswa(?, ?, ?, ?, ?, ?, ?)', [
            $nim,
            $nama_mahasiswa,
            $username,
            $email,
            $password,
            $role,
            $prodi_id
        ]);

        return redirect()->route('datamahasiswa.staff')->with('success', 'Data Mahasiswa berhasil ditambahkan');
    }

    public function editMahasiswa($NIM)
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $prodis = Prodi::where('id_prodi', $prodiStaff)->get();
        $mahasiswa = DB::table('v_data_mahasiswa')->where('NIM', $NIM)->first();
        return view('staff.updateMahasiswa_staff', ['prodis' => $prodis, 'mahasiswa' => $mahasiswa]);
    }

    public function updateMahasiswa(Request $request)
    {


        $nim = $request->input('NIM');
        $nama_mahasiswa = $request->input('nama_mahasiswa');
        $email = $request->input('email');
        $prodi_id = $request->input('prodi');
        $id_user = $request->input('user_id');


        DB::select('CALL p_perbarui_mahasiswa(?, ?, ?, ?, ?)', [
            $nim,
            $nama_mahasiswa,
            $email,
            $prodi_id,
            $id_user
        ]);

        return redirect()->route('datamahasiswa.staff')->with('success', 'Data Mahasiswa berhasil diperbarui');
    }
    //Mahasiswa Part End
    //Mahasiswa Part End

    public function dataDosen(Request $request)
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $query = DB::table('v_data_dosen')->where('prodi_id', $prodiStaff);
        $search = $request->input('search');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_dosen', 'like', '%' . $search . '%')
                    ->orWhere('NIP', 'like', '%' . $search . '%')
                    ->orWhere('NIDN', 'like', '%' . $search . '%');
            });
        }

        $dosens = $query->paginate(10);

        if ($dosens->isEmpty()) {
            $noDataMessage = "Data tidak ditemukan";
            return view('staff.datadosen_staff', ['dosens' => $dosens, 'search' => $search, 'noDataMessage' => $noDataMessage]);
        }
        return view('staff.datadosen_staff', compact('dosens', 'search'));
    }

    public function tambahDosen()
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $prodis = Prodi::where('id_prodi', $prodiStaff)->get();
        return view('staff.tambahDosen', ['prodis' => $prodis]);
    }

    public function insertDosen(Request $request)
    {
        $validasidata = $request->validate([
            'kode_dosen' => ['required', 'unique:dosens,kode_dosen', 'size:3', 'alpha', 'uppercase'],
            'NIP' => 'required|unique:dosens,NIP|numeric|digits:18',
            'NIDN' => 'required|unique:dosens,NIDN|numeric|digits:10',
            'nama_dosen' => ['required', 'regex:/^[A-Za-z\s\-,\.]+$/u'],
            'email' => 'required|email|unique:users,email',
            'prodi' => 'required|not_in:0'
        ]);

        $NIDN = $request->input('NIDN');
        $NIP = $request->input('NIP');
        $NIPString = strval($NIP);
        $username = $NIPString;
        $password = Hash::make($NIPString);
        $email = $request->input('email');
        $kode_dosen = $request->input('kode_dosen');
        $nama_dosen = $request->input('nama_dosen');
        $role = 'dosen';
        $prodi_id = $request->input('prodi');


        DB::select('CALL p_tambah_user_dosen(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $username,
            $email,
            $password,
            $role,
            $kode_dosen,
            $NIP,
            $NIDN,
            $nama_dosen,
            $prodi_id
        ]);

        return redirect()->route('datadosen.staff')->with('success', 'Data Dosen berhasil ditambahkan');
    }

    public function detailDosen($kode_dosen)
    {

        $dosen = DB::table('v_data_dosen')->where('kode_dosen', $kode_dosen)->first();
        return view('staff.detailDosen', ['dosen' => $dosen]);
    }

    public function editDosen($kode_dosen)
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $prodis = Prodi::where('id_prodi', $prodiStaff)->get();
        $dosen = DB::table('v_data_Dosen')->where('kode_dosen', $kode_dosen)->first();
        return view('staff.updateDosen_staff', ['prodis' => $prodis, 'dosen' => $dosen]);
    }

    public function updateDosen(Request $request)
    {

        $kode_dosen = $request->input('kode');
        $nama_dosen = $request->input('nama');
        $NIP = $request->input('NIP');
        $NIDN = $request->input('NIDN');
        $email = $request->input('email');
        $prodi = $request->input('prodi');
        $id_user = $request->input('user_id');


        DB::select('CALL p_perbarui_dosen(?, ?, ?, ?, ?, ?, ?)', [
            $kode_dosen,
            $nama_dosen,
            $NIP,
            $NIDN,
            $email,
            $prodi,
            $id_user

        ]);

        return redirect()->route('datadosen.staff')->with('success', 'Data Dosen berhasil diperbarui');
    }

    //TUGAS AKHIR
    //TUGAS AKHIR
    public function dataTugasakhir(Request $request)
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $search = $request->input('search');
        $query = DB::table('v_data_tugasakhir')
            ->join('kategoris', 'v_data_tugasakhir.kategori_id', '=', 'kategoris.id_kategori')
            ->where('kategoris.prodi_id', $prodiStaff);

            if(!empty(request('search')))
            {
                $query->where('judul','like','%'. $search .'%')
                                ->orWhere('tipe_ta','like','%'. $search .'%')
                                ->orWhere('nama_mahasiswa','like','%'. $search .'%')
                                ->orWhere('tahun_terbit','like','%'. $search .'%');
    
            }

            $tugas_akhirs = $query->paginate(10);

        return view('staff.datatugasakhir_staff', ['tugas_akhirs' => $tugas_akhirs]);
    }

    public function detailTugasakhir($id_tugasakhir)
    {
        
        $tugas_akhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();

        return view('staff.detailTugasakhir_staff', ['tugas_akhir' => $tugas_akhir]);
    }

    public function tambahTugasakhir()
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $jenjangStaff = Prodi::find($prodiStaff)->jenjang;

        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::where('prodi_id', $prodiStaff)->get();
        $kategoris = Kategori::where('prodi_id', $prodiStaff)->get();

        // dd($jenjangStaff);

        return view('staff.tambahTugasakhir_staff', compact('dosens', 'mahasiswas', 'kategoris','jenjangStaff'));
    }

    public function insertTugasakhir(Request $request)
    {
        $prodiJenjang = auth()->user()->staff->prodi->jenjang;

        if ($prodiJenjang == 'S1' || $prodiJenjang == 'S2') {
    

            $request->validate([
                'judul' => 'required|string|max:255',
                'author' => 'required|string',
                'tipe_ta' => 'required|string|in:skripsi,tesis,disertasi',
                'dospem1' => 'required|string',
                'dospem2' => 'required|string',
                'tahun_terbit' => 'required|numeric|min:1900|max:2099',
                'kategori' => 'required',
                'abstrak' => 'required',
                'sampul' => 'required|mimes:jpeg,png,jpg',
                'file_metodologi' => 'required|mimes:pdf',
                'file_pustaka' => 'required|mimes:pdf',
                'file_tugasakhir' => 'required|mimes:pdf',
            ]);
    
            $judul = $request->input('judul');
            $abstrak = $request->input('abstrak');
            $author = $request->input('author');
            $dospem1 = $request->input('dospem1');
            $dospem2 = $request->input('dospem2');
            $tipe_ta = $request->input('tipe_ta');
            $tahun_terbit = $request->input('tahun_terbit');
            $kategori = $request->input('kategori');
            //foto_sampul
            $sampul = $request->file('sampul');
            $nama_sampul = 'Sampul' . $author . '.' . $request->file('sampul')->getClientOriginalExtension();
            $sampul->move('asset/img/', $nama_sampul);
    
            //file_tugas_akhir
            $file_metodologi = $request->file('file_metodologi');
            $nama_file_metodologi = 'Metodologi' . $author . '.' . $request->file('file_metodologi')->getClientOriginalExtension();
            $file_metodologi->move('asset/file/', $nama_file_metodologi);
    
            $file_pustaka = $request->file('file_pustaka');
            $nama_file_pustaka = 'Daftar Pustaka' . $author . '.' . $request->file('file_pustaka')->getClientOriginalExtension();
            $file_pustaka->move('asset/file/', $nama_file_pustaka);
    
            $file_tugasakhir = $request->file('file_tugasakhir');
            $nama_file_tugasakhir = 'Isi TA' . $author . '.' . $request->file('file_tugasakhir')->getClientOriginalExtension();
            $file_tugasakhir->move('asset/file/', $nama_file_tugasakhir);
    
    
            DB::select('CALL p_tambah_tugas_akhir(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $judul,
                $abstrak,
                $nama_sampul,
                $tipe_ta,
                $author,
                $kategori,
                $dospem1,
                $dospem2,
                $tahun_terbit,
                $nama_file_metodologi,
                $nama_file_pustaka,
                $nama_file_tugasakhir
            ]); 
    
            return redirect()->route('datatugas.staff')->with('success', 'Tugas Akhir berhasil ditambahkan');


        } elseif ($prodiJenjang == 'S3') {
            $request->validate([
                'judul' => 'required|string|max:255',
                'author' => 'required|string',
                'tipe_ta' => 'required|string|in:skripsi,tesis,disertasi',
                'promotor1' => 'required|string',
                'promotor2' => 'required|string',
                'promotor3' => 'required|string',
                'tahun_terbit' => 'required|numeric|min:1900|max:2099',
                'kategori' => 'required',
                'abstrak' => 'required',
                'sampul' => 'required|mimes:jpeg,png,jpg',
                'file_pustaka' => 'required|mimes:pdf',
                'bab1' => 'required|mimes:pdf',
                'bab2' => 'required|mimes:pdf',
                'bab3' => 'required|mimes:pdf',
                'bab4' => 'required|mimes:pdf',
                'bab5' => 'required|mimes:pdf'
            ]);
    
            $judul = $request->input('judul');
            $abstrak = $request->input('abstrak');
            $author = $request->input('author');
            $promotor1 = $request->input('promotor1');
            $promotor2 = $request->input('promotor2');
            $promotor3 = $request->input('promotor3');
            $tipe_ta = $request->input('tipe_ta');
            $tahun_terbit = $request->input('tahun_terbit');
            $kategori = $request->input('kategori');
            //foto_sampul
            $sampul = $request->file('sampul');
            $nama_sampul = 'Sampul' . $author . '.' . $request->file('sampul')->getClientOriginalExtension();
            $sampul->move('asset/img/', $nama_sampul);
    
    
            $file_pustaka = $request->file('file_pustaka');
            $nama_file_pustaka = 'Daftar Pustaka' . $author . '.' . $request->file('file_pustaka')->getClientOriginalExtension();
            $file_pustaka->move('asset/file/', $nama_file_pustaka);
    
            $bab1 = $request->file('bab1');
            $nama_bab1 = 'Isi Bab1' . $author . '.' . $request->file('bab1')->getClientOriginalExtension();
            $bab1->move('asset/file/', $nama_bab1);
    
            $bab2 = $request->file('bab2');
            $nama_bab2 = 'Isi Bab2' . $author . '.' . $request->file('bab2')->getClientOriginalExtension();
            $bab2->move('asset/file/', $nama_bab2);
    
            $bab3 = $request->file('bab3');
            $nama_bab3 = 'Isi Bab3' . $author . '.' . $request->file('bab3')->getClientOriginalExtension();
            $bab3->move('asset/file/', $nama_bab3);
    
            $bab4 = $request->file('bab4');
            $nama_bab4 = 'Isi Bab4' . $author . '.' . $request->file('bab4')->getClientOriginalExtension();
            $bab4->move('asset/file/', $nama_bab4);
    
            $bab5 = $request->file('bab5');
            $nama_bab5 = 'Isi Bab5' . $author . '.' . $request->file('bab5')->getClientOriginalExtension();
            $bab5->move('asset/file/', $nama_bab5);
    
    
            DB::select('CALL p_tambah_tugas_akhir_s3(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?)', [
                $judul,
                $abstrak,
                $nama_sampul,
                $tipe_ta,
                $author,
                $kategori,
                $promotor1,
                $promotor2,
                $promotor3,
                $tahun_terbit,
                $nama_file_pustaka,
                $bab1,
                $bab2,
                $bab3,
                $bab4,
                $bab5
            ]); 
    
            return redirect()->route('datatugas.staff')->with('success', 'Tugas Akhir berhasil ditambahkan');
        } else {
            dd($request);
        }

      
    }

    public function editTugasakhir($id_tugasakhir)
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $dosens = Dosen::where('prodi_id', $prodiStaff)->get();
        $mahasiswas = Mahasiswa::where('prodi_id', $prodiStaff)->get();
        $kategoris = Kategori::where('prodi_id', $prodiStaff)->get();
        $tugas_akhir = DB::table('v_data_tugasakhir')->where('id_tugasakhir', $id_tugasakhir)->first();

        return view('staff.updateTugasakhir_staff', ['mahasiswas' => $mahasiswas, 'dosens' => $dosens, 'kategoris' => $kategoris, 'tugas_akhir' => $tugas_akhir]);
    }

    public function updateTugasakhir(Request $request)
    {
        $request->validate([
            'judul' => 'string|max:255',
            'author' => 'string',
            'tipe_ta' => 'string|in:skripsi,tesis,disertasi',
            'tahun_terbit' => 'numeric|min:1900|max:2099',
            'sampul' => 'mimes:jpeg,png,jpg',
            'file_baru_metodologi' => 'mimes:pdf',
            'file_baru_pustaka' => 'mimes:pdf',
            'file_baru_tugasakhir' => 'mimes:pdf',
        ]);


        $dokumen_files = DokumenFile::where('tugasakhir_id', $request->input('tugasakhir_id'))->firstOrFail();
        $tugas_akhir = TugasAkhir::where('id_tugasakhir', $request->input('tugasakhir_id'))->firstOrFail();

        // dd($dokumen_files);

        $judul = $request->input('judul');
        $abstrak = $request->input('abstrak');
        $author = $request->input('author');
        $tipe_ta = $request->input('tipe_ta');
        $tahun_terbit = $request->input('tahun_terbit');
        $kategori = $request->input('kategori');

        //foto_sampul
        if ($request->hasFile('sampul')) {
        $sampul = $request->file('sampul');
        $nama_sampul = 'Sampul' . $author . '.' . $request->file('sampul')->getClientOriginalExtension();
        $sampul->move('asset/img/', $nama_sampul);
        } else {
            $nama_sampul = $tugas_akhir->sampul;
        }

        //file_tugas_akhir
        if ($request->hasFile('file_baru_metodologi')) {
            $file_metodologi = $request->file('file_baru_metodologi');
            $nama_file_metodologi = 'Metodologi' . $author . '.' . $file_metodologi->getClientOriginalExtension();
            $file_metodologi->move('asset/file/', $nama_file_metodologi);
        } else {
            $nama_file_metodologi = $dokumen_files->file_metodologi;
        }

        if ($request->hasFile('file_baru_pustaka')) {
            $file_pustaka = $request->file('file_baru_pustaka');
            $nama_file_pustaka = 'Daftar Pustaka' . $author . '.' . $file_pustaka->getClientOriginalExtension();
            $file_pustaka->move('asset/file/', $nama_file_pustaka);
        } else {
            $nama_file_pustaka = $dokumen_files->file_daftarpustaka;
        }

        if ($request->hasFile('file_baru_tugasakhir')) {
            $file_tugasakhir = $request->file('file_baru_tugasakhir');
            $nama_file_tugasakhir = 'Isi TA' . $author . '.' . $file_tugasakhir->getClientOriginalExtension();
            $file_tugasakhir->move('asset/file/', $nama_file_tugasakhir);
        } else {
            $nama_file_tugasakhir = $dokumen_files->file_tugasakhir;
        }

        $id_tugasakhir = $request->input('tugasakhir_id');

        try {
            DB::select('CALL p_perbarui_tugas(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $judul,
                $abstrak,
                $nama_sampul,
                $tipe_ta,
                $author,
                $kategori,
                $tahun_terbit,
                $nama_file_metodologi,
                $nama_file_pustaka,
                $nama_file_tugasakhir,
                $id_tugasakhir
            ]);

            return redirect()->route('datatugas.staff')->with('success', 'Data Tugas Akhir berhasil diperbarui');
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function dataKategori()
    {
        $prodiStaff = auth()->user()->staff->prodi_id;
        $kategoris = Kategori::where('prodi_id', $prodiStaff)->get();

        return view('staff.dataKategori_staff', compact('kategoris'));
    }


    public function notifikasi_staff()
    {
        return view('staff.notifikasi_staff');
    }
}