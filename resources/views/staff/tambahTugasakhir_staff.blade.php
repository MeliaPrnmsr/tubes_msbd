@extends('staff.stafflayout')

@section('content')
<br><br>
    <h3 class="text-center" style="color: #006633"><b>Tambah Tugas Akhir</b></h3>
    <br>
    <div class="card border-0">
        <div class="card-body">
            <form action="/inserttugasakhir" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="judul" class="form-label"><b>Judul</b></label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="judul">
                  </div>
            <div class="row row-cols-2"> <!-- row -->
                    <div class="col">
                        <div class="mb-4">
                            <label for="author" class="form-label"><b>Penulis</b></label>
                            <select class="form-select" id="author" name="author">
                                @foreach($mahasiswas as $mahasiswa)
                                    <option value="{{ $mahasiswa->NIM }}">{{ $mahasiswa->nama_mahasiswa }}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_ta" class="form-label"><b>Tipe Tugas Akhir</b></label>
                            <select class="form-select" id="tipe_ta" name="tipe_ta">
                                <option value="skripsi">Skripsi</option>
                                <option value="tesis">Tesis</option>
                                <option value="disertasi">Disertasi</option>
                              </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="dospem1" class="form-label"><b>Pembimbing 1</b></label>
                            <select class="form-select" id="dospem1" name="dospem1">
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->kode_dosen }}">{{ $dosen->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="dospem2" class="form-label"><b>Pembimbing 2</b></label>
                            <select class="form-select" id="dospem2" name="dospem2">
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->kode_dosen }}">{{ $dosen->nama_dosen }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tahun_terbit" class="form-label"><b>Tahun Terbit</b></label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="tahun_terbit" min="1900" max="2099" step="1">
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="kategori" class="form-label"><b>Kategori</b></label>
                            <select class="form-select" id="kategori" name="kategori">
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div> <!-- row -->
            <div class="mb-4">
                <label for="abstrak" class="form-label"><b>Abstrak</b></label>
                <textarea class="form-control" id="abstrak" name="abstrak" placeholder="Abstrak" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label for="sampul" class="form-label"><b>Sampul</b></label>
                <input class="form-control" type="file" id="sampul" name="sampul">
            </div>

            <div class="mb-4">
                <label for="file_metodologi" class="form-label"><b>File metodologi</b></label>
                <input class="form-control" type="file" id="file_metodologi" name="file_metodologi">
            </div>

            <div class="mb-4">
                <label for="file_pustaka" class="form-label"><b>File pustaka</b></label>
                <input class="form-control" type="file" id="file_pustaka" name="file_pustaka">
            </div>

            <div class="mb-4">
                <label for="file_tugasakhir" class="form-label"><b>File Tugas Akhir</b></label>
                <input class="form-control" type="file" id="file_tugasakhir" name="file_tugasakhir">
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button class="btn" style="background-color:  #3dae2b; width: 25%; color:white">Tambah Skripsi</button> &nbsp; &nbsp;
                <button class="btn btn-secondary" style=" width: 25%">Batal</button>
            </div>
        </form>
        
        </div>
    </div>
    <br>
@endsection