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
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugasakhir->nama_mahasiswa }}" readonly>
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_ta" class="form-label"><b>Tipe Tugas Akhir</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugasakhir->tipe_ta }}" readonly>
                        </div>
                    </div>
                    </div>


                    @if ($tugasakhir->tipe_ta == 'disertasi')
                    <div class="col">
                        <div class="mb-4">
                            <label for="promotor1" class="form-label"><b>Promotor 1</b></label>
                            <input type="text" class="form-control" id="promotor1" name="promotor1" placeholder="promotor1" value="{{ $tugasakhir->nama_promotor1 }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="promotor2" class="form-label"><b>Promotor 2</b></label>
                            <input type="text" class="form-control" id="promotor2" name="promotor2" placeholder="promotor2" value="{{ $tugasakhir->nama_promotor2 }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            <label for="promotor3" class="form-label"><b>Promotor 3</b></label>
                            <input type="text" class="form-control" id="promotor3" name="promotor3" placeholder="promotor3" value="{{ $tugasakhir->nama_promotor3 }}" readonly>
                        </div>
                    </div>
                        
                    @else
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
                    @endif
                  

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
                        <textarea class="form-control" id="abstrak" name="abstrak" placeholder="Abstrak" rows="7" readonly>{{ $tugasakhir->abstrak }}"</textarea>
                    </div>
        
                    <div class="mb-4">
                        <img src="{{ asset('asset/img/' . $tugasakhir->sampul) }}" alt="Sampul Tugas Akhir" width="20%" class="border">
        
                    </div>
        
                    <div class="mb-4">
                        <label for="bab1" class="form-label"><b> File Bab 1</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->bab1)}}" target="_blank">Lihat Bab 1</a>
                    </div>

                    <div class="mb-4">
                        <label for="bab2" class="form-label"><b> File Bab 2</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->bab2)}}" target="_blank">Lihat Bab 2</a>
                    </div>

                    <div class="mb-4">
                        <label for="bab3" class="form-label"><b> File Bab 3</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->bab3)}}" target="_blank">Lihat Bab 3</a>
                    </div>

                    <div class="mb-4">
                        <label for="bab4" class="form-label"><b> File Bab 4</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->bab4)}}" target="_blank">Lihat Bab 4</a>
                    </div>

                    <div class="mb-4">
                        <label for="bab5" class="form-label"><b> File Bab 5</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->bab5)}}" target="_blank">Lihat Bab 5</a>
                    </div>
        
                    <div class="mb-4">
                        <label for="file_pustaka" class="form-label"><b>File pustaka</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugasakhir->file_daftarpustaka)}}" target="_blank">Lihat Daftar Pustaka</a>
                    </div>
        
            </div> <!-- row -->
            
            <br>
        </form>
        
        </div>
    </div>
    <br>
@endsection