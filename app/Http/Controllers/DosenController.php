<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function landingDosen()
    {
        return view('dosen.dlandingpage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function profileDosen()
    {
        return view('dosen.dprofile');
    }

    public function editprofilDosen()
    {
        return view('dosen.deditprofil');
    }
    
    public function bimbinganDosen()
    {
        return view('dosen.dbimbingan');
    }

    public function bookmarkDosen()
    {
        return view('dosen.dbookmark');
    }

    public function searchDosen()
    {
        return view('dosen.dseacrh');
    }

    public function browseallDosen()
    {
        return view('dosen.dbrowseall');
    }
    
    public function abstrakDosen()
    {
        return view('dosen.dabstrak');
    }
      
    public function detailskripsiDosen()
    {
        return view('dosen.dopenskripsi');
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
