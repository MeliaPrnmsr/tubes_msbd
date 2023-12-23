@extends('staff.stafflayout')
@php
    $active = 'datatugas';
@endphp
@section('content')
<br><br>
    <h3 class="text-center" style="color: #006633"><b>Detail Tugas Akhir</b></h3>
    <br>
    <div class="card border-0">
        <div class="card-body">
            <form action="#" method="GET" enctype="multipart/form-data">
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


                    @if ($tugas_akhir->tipe_ta=='disertasi')

                    <div class="col">
                        <div class="mb-4">
                            <label for="promotor1" class="form-label"><b>Promotor 1</b></label>
                            <input type="text" class="form-control" id="promotor1" name="promotor1" placeholder="promotor1" value="{{ $tugas_akhir->nama_promotor1}}" readonly>
                        </div>
                    </div>

                    
                    <div class="col">
                        <div class="mb-4">
                            <label for="promotor2" class="form-label"><b>Promotor 2</b></label>
                            <input type="text" class="form-control" id="promotor2" name="promotor2" placeholder="promotor2" value="{{ $tugas_akhir->nama_promotor2 }}" readonly>
                        </div>
                    </div>

                    
                    <div class="col">
                        <div class="mb-4">
                            <label for="promotor3" class="form-label"><b>Promotor 3</b></label>
                            <input type="text" class="form-control" id="promotor3" name="promotor3" placeholder="promotor3" value="{{ $tugas_akhir->nama_promotor3 }}" readonly>
                        </div>
                    </div>


                    @else
                        
                    <div class="col">
                        <div class="mb-4">
                            <label for="dospem1" class="form-label"><b>Pembimbing 1</b></label>
                            <input type="text" class="form-control" id="dosenpembimbing1" name="dosenpembimbing1" placeholder="dosenpembimbing1" value="{{ $tugas_akhir->nama_dosen_dospem1 }}" readonly>
                        </div>
                    </div>

                    
                    <div class="col">
                        <div class="mb-4">
                            <label for="dospem2" class="form-label"><b>Pembimbing 2</b></label>
                            <input type="text" class="form-control" id="dospem2" name="dospem2" placeholder="dosenpembimbing1" value="{{ $tugas_akhir->nama_dosen_dospem2 }}" readonly>
                        </div>
                    </div>

                    @endif


                   
                  




                    <div class="col">
                        <div class="mb-4">
                            <label for="tahun_terbit" class="form-label"><b>Tahun Terbit</b></label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $tugas_akhir->tahun_terbit }}" readonly>
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="kategori" class="form-label"><b>Kategori</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $tugas_akhir->nama_kategori }}" readonly>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="abstrak" class="form-label"><b>Abstrak</b></label>
                        <textarea class="form-control" id="abstrak" name="abstrak" placeholder="Abstrak" rows="4" readonly>{{ $tugas_akhir->abstrak }}"</textarea>
                    </div>
        
                    <div class="mb-4">
                        <img src="{{ asset('asset/img/' . $tugas_akhir->sampul) }}" alt="Sampul Tugas Akhir" width="20%">
        
                    </div>
        
        
                    <div class="mb-4">
                        <label for="file_pustaka" class="form-label"><b>File pustaka</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugas_akhir->file_daftarpustaka)}}" target="_blank">File Daftar Pustaka</a>
                    </div>
        
                    <div class="mb-4">
                        <label for="bab1" class="form-label"><b>Bab 1</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugas_akhir->bab1)}}" target="_blank">Bab 1</a>
                    </div>

                    
                    <div class="mb-4">
                        <label for="bab2" class="form-label"><b>Bab 2</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugas_akhir->bab2)}}" target="_blank">Bab 2</a>
                    </div>

                    <div class="mb-4">
                        <label for="bab3" class="form-label"><b>Bab 3</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugas_akhir->bab3)}}" target="_blank">Bab 3</a>
                    </div>

                    <div class="mb-4">
                        <label for="bab4" class="form-label"><b>Bab 4</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugas_akhir->bab4)}}" target="_blank">Bab 4</a>
                    </div>

                    <div class="mb-4">
                        <label for="bab5" class="form-label"><b>Bab 5</b></label><br>
                        <a class="btn border" href="{{ asset('asset/file/'. $tugas_akhir->bab5)}}" target="_blank">Bab 5</a>
                    </div>


            </div> <!-- row -->
            
            <br>
            <div class="d-flex justify-content-center">
                <a href="{{route('edittugasakhir.staff', ['id_tugasakhir' => $tugas_akhir->id_tugasakhir])}}" class="btn btn-hijau mt-3" style="width: 20%">Perbarui</a> &nbsp;
                <a href="{{route('datatugas.staff')}}" class="btn btn-secondary mt-3" style="width: 20%">Kembali</a>
            </div>
        </form>
        
        </div>
    </div>
    <br>
@endsection