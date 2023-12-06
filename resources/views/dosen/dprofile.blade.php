@extends('dosen.dlayout')

@section('content')
<!--Profile-->
<div class="container-fluid">
    <br>
    @if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="card container">
        <div class="card-body">
            <h3 class="text-center"><b>Profil Saya</b></h3>
            {{-- start --}}
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="text-center">
                        <img src="{{ $dosens->foto ? asset('asset/img/'.$dosens->foto) : asset('asset/img/dosen.png') }}" class="rounded-circle" width="20%" height="20%">
                        <br><br>
                    </div>
                    <div class="row">
                        {{-- col-2 --}}
                        <div class="col">
                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input readonly disabled type="text" class="form-control" id="nama"
                                    value="{{ $dosens->nama_dosen }}">
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input readonly disabled type="email" class="form-control" id="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            {{-- jenis kelamin --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Program Studi</label>
                                <input readonly disabled type="text" class="form-control" id="email"
                                    value="{{ $dosens->nama_prodi }}">
                            </div>

                        </div>
                        {{-- col-3 --}}
                        <div class="col">
                            <div class="mb-3">
                                <label for="jeniskelamin" class="form-label">NIP</label>
                                <input readonly disabled type="text" class="form-control" id="jeniskelamin"
                                    value="{{ $dosens->NIP }}">
                            </div>
                            {{-- tgl lahir --}}
                            <div class="mb-3">
                                <label for="tgllahir" class="form-label">NIDN</label>
                                <input readonly disabled type="text" class="form-control" id="tgllahir"
                                    value="{{ $dosens->NIDN }}">
                            </div>

                            {{-- program studi --}}
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('editprofile.dosen')}}" class="btn btn-hijau" style="width: 15%">Edit</a> &nbsp;
                        <button class="btn btn-secondary" style="width: 15%">Back</button>
                    </div>
                </form>
                {{-- end --}}
            </div>
        </div>
    </div>
    @endsection