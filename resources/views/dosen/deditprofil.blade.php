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
                <form action="/inserteditdosen" method="POST">
                    <div class="row">
                        <div class="col-3 align-items-center justify-content-center">
                            <div class="text-center">
                                @if ($profil->foto)
                                <img src="{{asset('asset/img/' . $profil->foto)}}" class="rounded-circle" width="70%">
                                @else
                                <img src="{{asset('asset/img/profile.jpeg')}}" class="rounded-circle" width="70%">
                                <br><br>
                                <button type="button" class="btn btn-secondary">Ganti Profil</button>
                            </div>
                        </div>
                        {{-- col-2 --}}
                        <div class="col">
                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $nama_lengkap }}">
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $email }}">
                            </div>
                            {{-- tgl lahir --}}
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input disabled readonly type="text" class="form-control" id="nip" value="{{ $nip }}">
                            </div>
                            <div class="mb-3">
                                <label for="nidn" class="form-label">NIDN</label>
                                <input disabled readonly type="text" class="form-control" id="nidn" value="{{ $nidn }}">
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi</label>
                                <input disabled readonly type="text" class="form-control" id="prodi" value="{{ $program_studi }}">
                            </div>
                        </div>
                        {{-- col-3 --}}
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <!-- Button trigger modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-repository" style="width: 25%" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Simpan
                        </button> &nbsp; &nbsp;
                        
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <img src="{{asset('asset/img/tanya.png')}}" alt="" width="20%">
                                    <br><br>
                                    <h5>Simpan perubahan untuk profil?</h5>
                                    <br>
                                    <button type="button" class="btn btn-secondary" style="width: 25%" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-repository" style="width: 25%">Simpan</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                        <a href="/dprofile" class="btn btn-secondary" style="width: 25%" >Cancel</a>
                    </div>                    
                </form>                
        {{-- end --}}
        </div>
            </div>
        </div>

@endsection