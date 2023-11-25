@extends('mahasiswa.mlayout')

@section('content')
    <!--Profile-->
    <div class="container-fluid">
        <br>
        <div class="card container">
            <div class="card-body">
            <h3 class="text-center"><b>Profil Saya</b></h3>
            {{-- start --}}
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-3 align-items-center justify-content-center">
                            <div class="text-center">
                                <img src="{{asset('asset/img/profile.jpeg')}}" class="rounded-circle" width="70%">
                                <br><br>
                            </div>
                        </div>
                        {{-- col-2 --}}
                        <div class="col">
                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input disabled readonly type="text" class="form-control" id="nama" value="Nama Saya Budi">
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input disabled readonly type="email" class="form-control" id="email" value="namasayabudi@gmail.com">
                            </div>
                            {{-- jenis kelamin --}}
                            <div class="mb-3">
                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                <input disabled readonly type="text" class="form-control" id="jeniskelamin" value="Laki-Laki">
                            </div>
                            {{-- tgl lahir --}}
                            <div class="mb-3">
                                <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                                <input disabled readonly type="date" class="form-control" id="tgllahir" value="06/07/2004">
                            </div>
                        </div>
                        {{-- col-3 --}}
                        <div class="col">
                            {{-- nim --}}
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input disabled readonly type="text" class="form-control" id="nim" value="221402112">
                            </div>
                            {{-- fakultas --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Fakultas</label>
                                <input disabled readonly type="text" class="form-control" id="email" value="Fakultas Ilmu Komputer & Teknologi Informasi">
                            </div>
                            {{-- program studi --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Program Studi</label>
                                <input disabled readonly type="text" class="form-control" id="email" value="S1-Teknologi Informasi">
                            </div>
                            {{-- alamat --}}
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input disabled readonly type="text" class="form-control" id="alamat" value="jalan raya rumah saya di dekat jalan">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-end">
                        <a href="/editprofilmhs" class="btn btn-hijau" style="width: 15%">Edit</a> &nbsp;
                        <button class="btn btn-secondary" style="width: 15%">Back</button>
                    </div>
                </form>                
        {{-- end --}}
        </div>
            </div>
        </div>
@endsection