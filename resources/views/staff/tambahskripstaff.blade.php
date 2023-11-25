@extends('staff.stafflayout')

@section('content')
<br><br>
    <h3 class="text-center" style="color: #006633"><b>Tambah Tugas Akhir</b></h3>
    <br>
    <div class="card border-0">
        <div class="card-body">
            <form action="">
                <div class="mb-4">
                    <label for="judul" class="form-label"><b>Judul</b></label>
                    <input type="text" class="form-control" id="judul" placeholder="judul">
                  </div>
            <div class="row row-cols-2"> <!-- row -->
                    <div class="col">
                        <div class="mb-4">
                            <label for="penulis" class="form-label"><b>Penulis</b></label>
                            <input type="text" class="form-control" id="penulis" placeholder="penulis">
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_tugas" class="form-label"><b>Tipe Tugas Akhir</b></label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="skripsi">Skripsi</option>
                                <option value="tesis">Tesis</option>
                                <option value="disertasi">Disertasi</option>
                              </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_tugas" class="form-label"><b>Pembimbing 1</b></label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="nama_dosen1">nama_dosen1</option>
                                <option value="nama_dosen2">nama_dosen2</option>
                                <option value="nama_dosen3">nama_dosen3</option>
                              </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_tugas" class="form-label"><b>Pembimbing 2</b></label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="nama_dosen1">nama_dosen1</option>
                                <option value="nama_dosen2">nama_dosen2</option>
                                <option value="nama_dosen3">nama_dosen3</option>
                              </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tahun_terbit" class="form-label"><b>Tahun Terbit</b></label>
                            <input type="date" class="form-control" id="tahun_terbit" placeholder="tahun_terbit">
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="penulis" class="form-label"><b>Tema</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="tema_prodi1">
                                <label class="form-check-label" for="tema_prodi1">tema_prodi 1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="tema_prodi2">
                                <label class="form-check-label" for="tema_prodi2">tema_prodi 2</label>
                            </div>
                          </div>
                    </div>
            </div> <!-- row -->
            <div class="mb-4">
                <label for="abstrak" class="form-label"><b>Abstrak</b></label>
                <textarea class="form-control" id="abstrak" placeholder="Abstrak" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label for="isi_metodologi" class="form-label"><b>File metodologi</b></label>
                <input class="form-control" type="file" id="isi_metodologi">
            </div>

            <div class="mb-4">
                <label for="isi_pustaka" class="form-label"><b>File pustaka</b></label>
                <input class="form-control" type="file" id="isi_pustaka">
            </div>

            <div class="mb-4">
                <label for="isi_skripsi" class="form-label"><b>File Skripsi</b></label>
                <input class="form-control" type="file" id="isi_skripsi">
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