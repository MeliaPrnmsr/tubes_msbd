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
                <form action="">
                    <div class="row">
                        <div class="col-3 align-items-center justify-content-center">
                            <div class="text-center">
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
                                <input type="text" class="form-control" id="nama" value="Nama Saya Budi">
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="namasayabudi@gmail.com">
                            </div>
                            {{-- jenis kelamin --}}
                            <div class="mb-3">
                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jeniskelamin" value="Laki-Laki">
                            </div>
                            {{-- tgl lahir --}}
                            <div class="mb-3">
                                <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgllahir" value="06/07/2004">
                            </div>
                        </div>
                        {{-- col-3 --}}
                        <div class="col">
                            {{-- nim --}}
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input disabled type="text" class="form-control" id="nim" value="221402112">
                            </div>
                            {{-- fakultas --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Fakultas</label>
                                <input disabled type="text" class="form-control" id="email" value="Fakultas Ilmu Komputer & Teknologi Informasi">
                            </div>
                            {{-- program studi --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Program Studi</label>
                                <input disabled type="text" class="form-control" id="email" value="S1-Teknologi Informasi">
                            </div>
                            {{-- alamat --}}
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" value="jalan raya rumah saya di dekat jalan">
                            </div>
                        </div>
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
                        
                        <a href="/profilmhs" class="btn btn-secondary" style="width: 25%" >Cancel</a>
                    </div>                    
                </form>                
        {{-- end --}}
        </div>
            </div>
        </div>

@endsection