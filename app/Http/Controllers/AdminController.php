<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard_admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataMahasiswa()
    {
        return view('admin.datamahasiswa_admin'); 
    }

    public function dataDosen()
    {
        return view('admin.datadosen_admin');
    }

    public function dataStaff()
    {
        return view('admin.datastaff_admin');
    }

    public function dataTugasakhir()
    {
        return view('admin.datatugasakhir_admin');
    }

    public function dataKategori()
    {
        return view('admin.datakategori_admin');
    }

    public function notifikasi()
    {
        return view('admin.notifikasi_admin');
    }

    public function log()
    {
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
