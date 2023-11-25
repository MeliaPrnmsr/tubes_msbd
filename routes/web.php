<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard_admin', [AdminController::class,'index'])->name('dashboard.admin');
    Route::get('/datamahasiswa_admin', [AdminController::class,'dataMahasiswa'])->name('datamahasiswa.admin');
    Route::get('/datadosen_admin', [AdminController::class,'dataDosen'])->name('datadosen.admin');
    Route::get('/datastaff_admin', [AdminController::class,'dataStaff'])->name('datastaff.admin');
    Route::get('/datatugasakhir_admin', [AdminController::class,'dataTugasakhir'])->name('datatugas.admin');
    Route::get('/datakategori_admin', [AdminController::class,'dataKategori'])->name('datakategori.admin');
    Route::get('/notifikasi_admin', [AdminController::class,'notifikasi'])->name('notifikasi.admin');
    Route::get('/log_admin', [AdminController::class,'log'])->name('log.admin');
    Route::get('/tambahskripsi_admin', [AdminController::class,'tambahSkripsi'])->name('tambahskripsi.admin');
});


//ROUTE STAFF
//ROUTE STAFF
//ROUTE STAFF
Route::middleware(['role:staff'])->group(function () {
    Route::get('/dashboard_staff', [StaffController::class,'index'])->name('dashboard.staff');
    Route::get('/datamahasiswa_staff', [StaffController::class,'dataMahasiswa'])->name('datamahasiswa.staff');
    Route::get('/datadosen_staff', [StaffController::class,'dataDosen'])->name('datadosen.staff');
    Route::get('/datatugasakhir_staff', [StaffController::class,'dataTugasakhir'])->name('datatugas.staff');
    Route::get('/datakategori_staff', [StaffController::class,'dataKategori'])->name('datakategori.staff');
    Route::get('/detailDosen_staff', [StaffController::class,'detailDosen'])->name('detaildosen.staff');
    Route::get('/tambahmahasiswa_staff', [StaffController::class,'tambahMahasiswa'])->name('tambahmahasiswa.staff');
    Route::get('/tambahdosen_staff', [StaffController::class,'tambahDosen'])->name('tambahdosen.staff');
    Route::get('/notifikasi_staff', [StaffController::class,'notifikasi_staff'])->name('notifikasi.staff');
    Route::get('/tambahskripsi_staff', [StaffController::class,'tambahSkripsi'])->name('tambahskripsi.staff');
});


//ROUTE PENGUNJUNG
//ROUTE PENGUNJUNG
//ROUTE PENGUNJUNG
Route::get('/landingpage', [PengunjungController::class,'index']);
Route::get('/search', [PengunjungController::class,'search']);
Route::get('/detailskripsi', [PengunjungController::class,'detailskripsi']);
Route::get('/browseall', [PengunjungController::class,'browseall']);
Route::get('/abstrak', [PengunjungController::class,'abstrak']);


//ROUTE MAHASISWA
//ROUTE MAHASISWA
//ROUTE MAHASISWA
Route::middleware(['role:mahasiswa'])->group(function () {
    Route::get('/mlandingpage', [MahasiswaController::class,'landingMhs'])->name('landingpage.mahasiswa');
    Route::get('/mprofil', [MahasiswaController::class,'profilMhs'])->name('profile.mahasiswa');
    Route::get('/meditprofil', [MahasiswaController::class,'editprofilMhs'])->name('editprofil.mahasiswa');
    Route::get('/mbookmark', [MahasiswaController::class,'bookmarkMhs'])->name('bookmark.mahasiswa');
    Route::get('/msearch', [MahasiswaController::class,'searchMhs'])->name('search.mahasiswa');
    Route::get('/mdetailSkripsi', [MahasiswaController::class,'detailMhs'])->name('detail.mahasiswa');
    Route::get('/mbrowseall', [MahasiswaController::class,'browseallMhs'])->name('browseall.mahasiswa');
    Route::get('/mabstrak', [MahasiswaController::class,'abstrakMhs'])->name('abstrak.mahasiswa');    
});



//ROUTE DOSEN
//ROUTE DOSEN
//ROUTE DOSEN
Route::middleware(['role:dosen'])->group(function () {
    Route::get('/dlandingpage', [DosenController::class,'landingDosen'])->name('landingpage.dosen');
    Route::get('/dprofile', [DosenController::class,'profileDosen'])->name('profile.dosen');
    Route::get('/deditprofile', [DosenController::class,'editprofilDosen'])->name('editprofile.dosen');
    Route::get('/dbimbingan', [DosenController::class,'bimbinganDosen'])->name('bimbingan.dosen');
    Route::get('/dbookmark', [DosenController::class,'bookmarkDosen'])->name('bookmark.dosen');
    Route::get('/dsearch', [DosenController::class,'searchDosen'])->name('search.dosen');
    Route::get('/dbrowseall', [DosenController::class,'browseallDosen'])->name('browseall.dosen');
    Route::get('/dabstrak', [DosenController::class,'abstrakDosen'])->name('abstrak.dosen');
    Route::get('/detailskripsi_dosen', [DosenController::class,'detailskripsiDosen']);    
});


// Route untuk About (aku sebenarnya kurang dengar tadi)