<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengunjungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ROUTE ADMIN
// ROUTE ADMIN
// ROUTE ADMIN
Route::middleware(['role:admin', 'auth', 'verified'])->group(function () {
    Route::get('/dashboard_admin', [AdminController::class,'index'])->name('dashboard.admin');

    Route::get('/datamahasiswa_admin', [AdminController::class,'dataMahasiswa'])->name('datamahasiswa.admin');
    Route::get('/detailmahasiswa_admin/{NIM}', [AdminController::class,'detailMahasiswa'])->name('detailmahasiswa.admin');

    Route::get('/datadosen_admin', [AdminController::class,'dataDosen'])->name('datadosen.admin');
    Route::get('/detaildosen_admin/{kode_dosen}', [AdminController::class,'detailDosen'])->name('detaildosen.admin');
    //datastaff
    Route::get('/datastaff_admin', [AdminController::class,'dataStaff'])->name('datastaff.admin');
    Route::get('/detailStaff/{kode_staff}', [AdminController::class,'detailStaff'])->name('detailStaff.admin'); 
    Route::get('/tambahStaff', [AdminController::class,'tambahStaff'])->name('tambahStaff.admin');
    Route::post('/insertStaff', [AdminController::class,'insertStaff']);
    Route::get('/editStaff/{kode_staff}', [AdminController::class,'editStaff'])->name('editstaff.admin');
    Route::post('/updateStaff', [AdminController::class,'updateStaff']);

    Route::get('/datatugasakhir_admin', [AdminController::class,'dataTugasakhir'])->name('datatugas.admin');
    Route::get('/detailtugasakhir_admin/{id_tugasakhir}', [AdminController::class,'detailTugasakhir'])->name('detailtugas.admin');
    Route::get('/datakategori_admin', [AdminController::class,'dataKategori'])->name('datakategori.admin');
    Route::get('/notifikasi_admin', [AdminController::class,'notifikasi'])->name('notifikasi.admin');
    Route::get('/log_admin', [AdminController::class,'log'])->name('log.admin');
    Route::get('/tambahskripsi_admin', [AdminController::class,'tambahSkripsi'])->name('tambahskripsi.admin');
});


//ROUTE STAFF
//ROUTE STAFF
//ROUTE STAFF
Route::middleware(['role:staff', 'auth', 'verified'])->group(function () {
    //CONTROLLER DASHBOARD
    Route::get('/dashboard_staff', [StaffController::class,'index'])->name('dashboard.staff');
    //CONTROLLER MAHASISWA
    //CONTROLLER MAHASISWA
    Route::get('/datamahasiswa_staff', [StaffController::class,'dataMahasiswa'])->name('datamahasiswa.staff');
    Route::get('/detailMahasiswa/{NIM}', [StaffController::class,'detailMahasiswa'])->name('detailMahasiswa.staff');

    Route::get('/tambahmahasiswa_staff', [StaffController::class,'tambahMahasiswa'])->name('tambahmahasiswa.staff');
    Route::post('/insertmahasiswa', [StaffController::class,'insertMahasiswa']);
    Route::get('/editmahasiswa_staff/{NIM}', [StaffController::class,'editMahasiswa'])->name('editmahasiswa.staff');
    Route::post('/updatemahasiswa', [StaffController::class,'updateMahasiswa']);
    //CONTROLLER DOSEN
    //CONTROLLER DOSEN
    Route::get('/datadosen_staff', [StaffController::class,'dataDosen'])->name('datadosen.staff');
    Route::get('/detailDosen_staff/{kode_dosen}', [StaffController::class,'detailDosen'])->name('detailDosen.staff');
    Route::get('/tambahdosen_staff', [StaffController::class,'tambahDosen'])->name('tambahdosen.staff');
    Route::post('/insertdosen', [StaffController::class,'insertDosen']);
    Route::get('/editdosen_staff/{kode_dosen}', [StaffController::class,'editDosen'])->name('editdosen.staff');
    Route::post('/updatedosen', [StaffController::class,'updateDosen']);
    //CONTROLLER TUGAS AKHIR
    //CONTROLLER TUGAS AKHIR
    Route::get('/datatugasakhir_staff', [StaffController::class,'dataTugasakhir'])->name('datatugas.staff');
    Route::get('/detailTugasakhir/{id_tugasakhir}', [StaffController::class,'detailTugasakhir'])->name('detailTugasakhir.staff');
    Route::get('/tambahTugasakhir_staff', [StaffController::class,'tambahTugasakhir'])->name('tambahtugasakhir.staff');
    Route::post('/inserttugasakhir', [StaffController::class,'insertTugasakhir']);
    Route::get('/edittugasakhir_staff/{id_tugasakhir}', [StaffController::class,'editTugasakhir'])->name('edittugasakhir.staff');
    Route::post('/updatetugasakhir', [StaffController::class,'updateTugasakhir']);

    Route::get('/datakategori_staff', [StaffController::class,'dataKategori'])->name('datakategori.staff');
    Route::get('/notifikasi_staff', [StaffController::class,'notifikasi_staff'])->name('notifikasi.staff');
});


//ROUTE PENGUNJUNG
//ROUTE PENGUNJUNG
//ROUTE PENGUNJUNG
Route::get('/landingpage', [PengunjungController::class,'index'])->name('landingpage');
Route::get('/search', [PengunjungController::class,'search']);
Route::get('/detailtugasakhir/{id_tugasakhir}', [PengunjungController::class,'detailTugasakhir'])->name('detailTugasakhir');
Route::get('/browseall', [PengunjungController::class,'browseAll'])->name('browseall.pengunjung');
Route::get('/abstrak', [PengunjungController::class,'abstrak']);


//ROUTE MAHASISWA
//ROUTE MAHASISWA
//ROUTE MAHASISWA
Route::middleware(['role:mahasiswa', 'auth', 'verified'])->group(function () {
    Route::get('/mlandingpage', [MahasiswaController::class,'landingMhs'])->name('landingpage.mahasiswa');
    Route::get('/mcari', [MahasiswaController::class,'cariLanding'])->name('cari.landingpage');
    Route::get('/mprofil', [MahasiswaController::class,'profilMhs'])->name('profile.mahasiswa');
    Route::get('/meditprofil', [MahasiswaController::class, 'editprofilMhs'])->name('editprofil.mahasiswa');
    Route::match(['get', 'post'], '/updateprofil', [MahasiswaController::class, 'UpdateProfil'])->name('update.mahasiswa');
    Route::get('/mbookmark', [MahasiswaController::class,'bookmarkMhs'])->name('bookmark.mahasiswa');
    Route::get('/msearch', [MahasiswaController::class,'searchMhs'])->name('search.mahasiswa');
    Route::get('/hasil_search', [MahasiswaController::class,'hasil_search']);
    Route::get('/mdetailTugasakhir/{id_tugasakhir}', [MahasiswaController::class,'detailMhs'])->name('detail.mahasiswa');
    Route::post('/like', [MahasiswaController::class,'likeTugasAkhir']);
    Route::post('/bookmark', [MahasiswaController::class,'bookmarkTugasAkhir']);
    Route::get('/mbrowseall', [MahasiswaController::class,'browseallMhs'])->name('browseall.mahasiswa');
    Route::get('/mabstrak', [MahasiswaController::class,'abstrakMhs'])->name('abstrak.mahasiswa');    
});


//ROUTE DOSEN
//ROUTE DOSEN
//ROUTE DOSEN
Route::middleware(['role:dosen', 'auth', 'verified'])->group(function () {
    Route::get('/dlandingpage', [DosenController::class,'landingDosen'])->name('landingpage.dosen');
    Route::get('/dprofile', [DosenController::class,'profileDosen'])->name('profile.dosen');
    Route::get('/deditprofile', [DosenController::class,'editprofilDosen'])->name('editprofile.dosen');
    Route::match(['get', 'post'], '/dupdateprofil', [DosenController::class, 'inserteditprofildosen'])->name('update.dosen');
    Route::get('/dbimbingan', [DosenController::class,'bimbinganDosen'])->name('bimbingan.dosen');
    Route::get('/dbookmark', [DosenController::class,'bookmarkDosen'])->name('bookmark.dosen');
    Route::post('/like', [DosenController::class,'likeTugasAkhir']);
    Route::post('/bookmark', [DosenController::class,'bookmarkTugasAkhir']);
    Route::get('/dsearch', [DosenController::class,'searchDosen'])->name('search.dosen');
    Route::get('/dbrowseall', [DosenController::class,'browseallDosen'])->name('browseall.dosen');
    Route::get('/dabstrak', [DosenController::class,'abstrakDosen'])->name('abstrak.dosen');
    Route::get('/detailskripsi_dosen/{id_tugasakhir}', [DosenController::class,'detailskripsiDosen'])->name('detail.dosen');    
});


// Route untuk About (aku sebenarnya kurang dengar tadi)