@extends('admin.adminlayout')
@php
    $active = 'tugas_akhir';
@endphp
@section('content')
<br><br>
    <h3 class="text-center" style="color: #006633"><b>Detail Tugas Akhir</b></h3>
    <br>
    <div class="card border-0">
        <a href="{{route('datatugas.admin')}}" class="btn btn-hijau text-start" style="width: 10%">Kembali</a>
        <div class="card-body">
            <form action="/inserttugasakhir" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="judul" class="form-label"><b>Judul</b></label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugasakhir->judul }}" readonly>
                  </div>
            <div class="row row-cols-2"> <!-- row -->
                    <div class="col">
                        <div class="mb-4">
                            <label for="author" class="form-label"><b>Penulis</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugasakhir->author }}" readonly>
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_ta" class="form-label"><b>Tipe Tugas Akhir</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugasakhir->tipe_ta }}" readonly>
                        </div>
                    </div>
                    </div>


                    <div class="col">
                        <div class="mb-4">
                            <label for="dospem1" class="form-label"><b>Pembimbing 1</b></label>
                            <input type="text" class="form-control" id="dosenpembimbing1" name="dosenpembimbing1" placeholder="dosenpembimbing1" value="{{ $tugasakhir->nama_dosen_dospem1 }}" readonly>
                        </div>
                    </div>

                    
                    <div class="col">
                        <div class="mb-4">
                            <label for="dospem2" class="form-label"><b>Pembimbing 2</b></label>
                            <input type="text" class="form-control" id="dospem2" name="dospem2" placeholder="dosenpembimbing1" value="{{ $tugasakhir->nama_dosen_dospem2 }}" readonly>
                        </div>
                    </div>
                  

                    <div class="col">
                        <div class="mb-4">
                            <label for="tahun_terbit" class="form-label"><b>Tahun Terbit</b></label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $tugasakhir->tahun_terbit }}" readonly>
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="kategori" class="form-label"><b>Kategori</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugasakhir->nama_kategori }}" readonly>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="abstrak" class="form-label"><b>Abstrak</b></label>
                        <textarea class="form-control" id="abstrak" name="abstrak" placeholder="Abstrak" rows="4" readonly>{{ $tugasakhir->abstrak }}"</textarea>
                    </div>
        
                    <div class="mb-4">
                        <img src="{{ asset('asset/img/' . $tugasakhir->sampul) }}" alt="Sampul Tugas Akhir" width="20%">
        
                    </div>
        
                    <div class="mb-4">
                        <label for="file_metodologi" class="form-label"><b>File metodologi</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->file_metodologi)}}" target="_blank">File Metodologi</a>
                    </div>
        
                    <div class="mb-4">
                        <label for="file_pustaka" class="form-label"><b>File pustaka</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->file_daftarpustaka)}}" target="_blank">File Daftar Pustaka</a>
                    </div>
        
                    <div class="mb-4">
                        <label for="file_tugasakhir" class="form-label"><b>File Tugas Akhir</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->file_tugasakhir)}}" target="_blank">File Tugas Akhir</a>
                    </div>
            </div> <!-- row -->
            
            <br>
        </form>
        
        </div>
    </div>
    <br>
@endsection