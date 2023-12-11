@extends('dosen.dlayout')

@section('content')
    <!--Profile-->
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
            <h4><b>Edit Profil</b></h4>
            {{-- start --}}
            <div class="card-body">
                <form action="/dupdateprofil" method="POST" enctype="multipart/form-data">
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
                                <input  type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $dosens->nama_dosen }}">
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input  type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            {{-- jenis kelamin --}}
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi</label>
                                <input readonly disabled type="text" class="form-control" id="prodi" name="prodi"
                                    value="{{ $dosens->nama_prodi }}">
                            </div>

                        </div>
                        {{-- col-3 --}}
                        <div class="col">
                            <div class="mb-3">
                                <label for="NIP" class="form-label">NIP</label>
                                <input readonly disabled type="text" class="form-control" id="NIP" name="NIP"
                                    value="{{ $dosens->NIP }}">
                            </div>
                            {{-- tgl lahir --}}
                            <div class="mb-3">
                                <label for="NIDN" class="form-label">NIDN</label>
                                <input readonly disabled type="text" class="form-control" id="NIDN" name="NIDN"
                                    value="{{ $dosens->NIDN }}">
                            </div>

                            {{-- program studi --}}
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-hijau" style="width: 15%">Edit</button> &nbsp;
                        <button class="btn btn-secondary" style="width: 15%">Back</button>
                    </div>
                </form>               
        {{-- end --}}
        </div>
            </div>
        </div>

@endsection