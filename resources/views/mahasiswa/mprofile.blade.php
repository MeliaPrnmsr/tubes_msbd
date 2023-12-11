@extends('mahasiswa.mlayout')

@section('content')

    <!--Profile-->
    <div class="container-fluid">
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
        <br>
        <div class="card container">
            <div class="card-body">
            <h3 class="text-center"><b>Profil Saya</b></h3>
            {{-- start --}}
            <div class="card-body">
                <form action="">
                    <div class="text-center">
                        <img src="{{ $mahasiswas->foto ? asset('asset/img/'.$mahasiswas->foto) : asset('asset/img/mahasiswa.png') }}" class="rounded-circle" width="20%" height="20%">
                        <br><br>
                    </div>
                    <div class="row">
                        {{-- col-2 --}}
                        <div class="col">
                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input disabled readonly type="text" class="form-control" id="nama" value="{{ $mahasiswas->nama_mahasiswa }}">
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input disabled readonly type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        {{-- col-3 --}}
                        <div class="col">
                            {{-- nim --}}
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input disabled readonly type="text" class="form-control" id="nim" value="{{ $mahasiswas->NIM }}">
                            </div>
                            {{-- program studi --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Program Studi</label>
                                <input disabled readonly type="text" class="form-control" id="email" value="{{ $mahasiswas->prodi->jenjang }} - {{ $mahasiswas->prodi->nama_prodi }}">
                            </div>
                            {{-- alamat --}}
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('editprofil.mahasiswa')}}" class="btn btn-hijau" style="width: 15%">Edit</a> &nbsp;
                        <a href="/mlandingpage" class="btn btn-secondary" style="width: 15%">Back</a>
                    </div>
                </form>                
        {{-- end --}}
        </div>
            </div>
        </div>
@endsection