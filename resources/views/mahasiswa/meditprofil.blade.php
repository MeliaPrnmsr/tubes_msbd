@extends('mahasiswa.mlayout')

@section('content')
    <!--Profile-->
    <br>
    <div class="container">

        <div class="card">
            <div class="card-body">
                <h4><b>Edit Profil</b></h4>
                {{-- start --}}
                <div class="card-body">
                    <!-- <form action="{{ route('update.mahasiswa', ['user_id' => $mahasiswas->user_id]) }}" method="POST" enctype="multipart/form-data"> -->
                    <form action="/updateprofil" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="align-items-center justify-content-center">
                            <div class="text-center">
                                <img src="{{ asset('asset/img/profile.jpeg') }}" class="rounded-circle" width="20%">
                                <br><br>
                                <input type="file" id="foto" name="foto" style="display: none;" accept="image/*">
                                <label for="foto" class="btn btn-secondary">Ganti Profil</label>
                            </div>
                        </div>

                        <div class="row row-cols-2 me-4 mt-3">

                            {{-- col-2 --}}
                            <div class="col">
                                {{-- nama --}}
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                        id="nama" name="nama_mahasiswa"
                                        value="{{ old('nama_mahasiswa', $mahasiswas->nama_mahasiswa) }}">
                                    @error('nama_mahasiswa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                </div>

                                <div class="col">
                                {{-- email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email"
                                        value="{{ $mahasiswas->user ? $mahasiswas->user->email : '' }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                </div>

                                {{-- col-3 --}}
                                <div class="col">
                                    {{-- nim --}}
                                    <div class="mb-3">
                                        <label for="NIM" class="form-label">NIM</label>
                                        <input readonly type="text" class="form-control" id="NIM" name="NIM"
                                            value="{{ old('NIM', $mahasiswas->NIM) }}">
                                    </div>
                                </div>

                                <div class="col">
                                    {{-- program studi --}}
                                    <div class="mb-3">
                                        <label for="prodi_id" class="form-label">Program Studi</label>
                                        <input type="text" class="form-control" id="prodi_id" name="prodi_id"
                                            value="{{ old('prodi_id', $mahasiswas->prodi->nama_prodi) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-repository" style="width: 25%" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Simpan
                                </button> &nbsp; &nbsp; &nbsp;

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <img src="{{ asset('asset/img/tanya.png') }}" alt=""
                                                    width="20%">
                                                <br><br>
                                                <h5>Simpan perubahan untuk profil?</h5>
                                                <br>
                                                <button type="button" class="btn btn-secondary" style="width: 25%"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-repository"
                                                    style="width: 25%">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('editprofil.mahasiswa') }}" class="btn btn-secondary"
                                    style="width: 25%">Cancel</a>
                            </div>
                    </form>
                    {{-- end --}}
                </div>
            </div>
        </div>
    @endsection
