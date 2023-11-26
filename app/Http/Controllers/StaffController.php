<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; //->pemanggilan model Mahasiswa
use App\Models\Dosen; //->pemanggilan model Dosen
use App\Models\TugasAkhir; //->pemanggilan model Dosen

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('staff.dashboard_staff');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function dataMahasiswa()
    {
        $mahasiswas = Mahasiswa::all(); 
        return view('staff.datamahasiswa_staff', compact('mahasiswas')); 
    }

    public function dataDosen()
    {
        $dosens = Dosen::all();
        return view('staff.datadosen_staff', compact('dosens'));
    }

    public function dataTugasakhir()
    {
        $tugas_akhirs = TugasAkhir::all();
        return view('staff.datatugasakhir_staff', compact('tugas_akhirs'));
    }

    public function dataKategori()
    {
        return view('staff.dataKategori_staff');
    }

    public function detailDosen()
    {
        return view('staff.detailDosen');
    }

    public function tambahMahasiswa()
    {
        return view('staff.tambahMahasiswa');
    }

    public function tambahDosen()
    {
        return view('staff.tambahDosen');
    }


    public function notifikasi_staff()
    {
        return view('staff.notifikasi_staff');
    }

    public function tambahSkripsi()
    {
        return view('staff.tambahskripstaff');
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
