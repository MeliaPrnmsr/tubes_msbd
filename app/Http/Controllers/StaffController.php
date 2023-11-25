<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('staff.datamahasiswa_staff');
    }

    public function dataDosen()
    {
        return view('staff.datadosen_staff');
    }

    public function dataTugasakhir()
    {
        return view('staff.datatugasakhir_staff');
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
