@extends('dosen.dlayout')

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
                                <input disabled readonly type="text" class="form-control" id="nama" value="{{ $nama_lengkap }}">
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input disabled readonly type="email" class="form-control" id="email" value="{{ $email }}">
                            </div>
                            {{-- tgl lahir --}}
                            <div class="mb-3">
                                <label for="tgllahir" class="form-label">NIP</label>
                                <input disabled readonly type="text" class="form-control" id="tgllahir" value="{{ $nip }}">
                            </div>
                            <div class="mb-3">
                                <label for="tgllahir" class="form-label">NIDN</label>
                                <input disabled readonly type="text" class="form-control" id="tgllahir" value="{{ $nidn }}">
                            </div>
                            <div class="mb-3">
                                <label for="tgllahir" class="form-label">Program Studi</label>
                                <input disabled readonly type="text" class="form-control" id="tgllahir" value="{{ $nidn }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-end">
                        <a href="/deditprofile" class="btn btn-hijau" style="width: 15%">Edit</a> &nbsp;
                        <button href="/dlandingpage" class="btn btn-secondary" style="width: 15%">Back</button>
                    </div>
                </form>                
        {{-- end --}}
        </div>
            </div>
        </div>
@endsection