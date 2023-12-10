@extends('staff.stafflayout')

@section('content')
<br><br>
    <h3 class="text-center" style="color: #006633"><b>Detail Tugas Akhir</b></h3>
    <br>
    <div class="card border-0">
        <div class="card-body">
            <form action="/inserttugasakhir" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="judul" class="form-label"><b>Judul</b></label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugas_akhir->judul }}" readonly>
                  </div>
            <div class="row row-cols-2"> <!-- row -->
                    <div class="col">
                        <div class="mb-4">
                            <label for="author" class="form-label"><b>Penulis</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugas_akhir->author }}" readonly>
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_ta" class="form-label"><b>Tipe Tugas Akhir</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugas_akhir->tipe_ta }}" readonly>
                        </div>
                    </div>
                    </div>

                    @foreach($dosen_pembimbing as $dosen)
                    <div class="col">
                        <div class="mb-4">
                            <label for="dospem1" class="form-label"><b>Pembimbing</b></label>
                            <input type="text" class="form-control" id="dosenpembimbing" name="dosenpembimbing" placeholder="dosenpembimbing" value="{{ $dosen->dosen->nama_dosen }}" readonly>
                        </div>
                    </div>
                    @endforeach

                    <div class="col">
                        <div class="mb-4">
                            <label for="tahun_terbit" class="form-label"><b>Tahun Terbit</b></label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $tugas_akhir->tahun_terbit }}" readonly>
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="kategori" class="form-label"><b>Kategori</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugas_akhir->kategori_id }}" readonly>
                        </div>
                    </div>
            </div> <!-- row -->
            <div class="mb-4">
                <label for="abstrak" class="form-label"><b>Abstrak</b></label>
                <textarea class="form-control" id="abstrak" name="abstrak" placeholder="Abstrak" rows="4" readonly>{{ $tugas_akhir->abstrak }}"</textarea>
            </div>

            <div class="mb-4">
                {{-- <label for="sampul" class="form-label"><b>Sampul</b></label> --}}
                {{-- <input class="form-control" type="file" id="sampul" name="sampul" value="{{ $tugas_akhir->sampul }}" readonly> --}}
                <img src="{{ asset('storage/uploads/' . $tugas_akhir->sampul) }}" alt="Sampul Tugas Akhir">

            </div>

            <div class="mb-4">
                <label for="file_metodologi" class="form-label"><b>File metodologi</b></label>
                <input class="form-control" type="file" id="file_metodologi" name="file_metodologi" value="{{ $tugas_akhir->file_metodologi }}" readonly>
            </div>

            <div class="mb-4">
                <label for="file_pustaka" class="form-label"><b>File pustaka</b></label>
                <input class="form-control" type="file" id="file_pustaka" name="file_pustaka" value="{{ $tugas_akhir->filedaftarpustaka }}" readonly>
            </div>

            <div class="mb-4">
                <label for="file_tugasakhir" class="form-label"><b>File Tugas Akhir</b></label>
                <input class="form-control" type="file" id="file_tugasakhir" name="file_tugasakhir" value="{{ $tugas_akhir->tugasakhir}}" readonly>
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