<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingMhs()
    {
        return view('mahasiswa.mlandingpage');
    }

    public function detailMhs()
    {
        return view('mahasiswa.mopenskrip');
    }

    public function profilMhs()
    {
        return view('mahasiswa.mprofile');
    }

    public function editprofilMhs()
    {
        return view('mahasiswa.meditprofil');
    }

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
        return view('mahasiswa.mbrowseall');
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
