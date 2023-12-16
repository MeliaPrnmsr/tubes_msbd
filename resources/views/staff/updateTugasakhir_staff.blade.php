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
            <form action="/updatetugasakhir" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="judul" class="form-label"><b>Judul</b></label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ old('judul', $tugas_akhir->judul) }}">
                  </div>
            <div class="row row-cols-2">
                    <div class="col">
                        <div class="mb-4">
                            <label for="author" class="form-label"><b>Penulis</b></label>
                            <input type="text" class="form-control" id="judul" name="author" placeholder="judul" value="{{ old('author', $tugas_akhir->author) }}">
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="tipe_ta" class="form-label"><b>Tipe Tugas Akhir</b></label>
                        <select class="form-select @error('tipe_ta') is-invalid @enderror" id="tipe_ta" name="tipe_ta">
                                <option value="{{old('tipe_ta', $tugas_akhir->tipe_ta)}}">{{$tugas_akhir->tipe_ta}}</option>
                                <option value="skripsi">Skripsi</option>
                                <option value="tesis">Tesis</option>
                                <option value="disertasi">Disertasi</option>
                        </select>
                        
                        </div>
                    </div>
                    </div>
                  

                    <div class="col">
                        <div class="mb-4">
                            <label for="tahun_terbit" class="form-label"><b>Tahun Terbit</b></label>
                            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $tugas_akhir->tahun_terbit) }}">
                          </div>
                    </div>

                    <div class="col">
                        <div class="mb-4">
                            <label for="kategori" class="form-label"><b>Kategori</b></label>
                            <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id_kategori }}" {{ $tugas_akhir->kategori_id ? 'selected' : ''}}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="abstrak" class="form-label"><b>Abstrak</b></label>
                        <textarea class="form-control" id="abstrak" name="abstrak" placeholder="Abstrak" rows="4">{{ old('abstrak', $tugas_akhir->abstrak) }}"</textarea>
                    </div>
        
                    <div class="mb-4">
                        <img src="{{ asset('asset/img/' . $tugas_akhir->sampul) }}" alt="Sampul Tugas Akhir" width="20%">
                        <input class="form-control" type="file" id="file_metodologi" name="sampul" value="{{ old('sampul', $tugas_akhir->sampul) }}">
        
                    </div>
        
                    <div class="mb-4">
                        <label for="file_metodologi" class="form-label"><b>File metodologi</b></label>
                        <input class="form-control" type="file" id="file_metodologi" name="file_metodologi" value="{{ old('file_metodologi', $tugas_akhir->file_metodologi) }}">
                    </div>
        
                    <div class="mb-4">
                        <label for="file_pustaka" class="form-label"><b>File pustaka</b></label>
                        <input class="form-control" type="file" id="file_pustaka" name="file_pustaka" value="{{ old('file_daftarpustaka', $tugas_akhir->file_daftarpustaka) }}">
                    </div>
        
                    <div class="mb-4">
                        <label for="file_tugasakhir" class="form-label"><b>File Tugas Akhir</b></label>
                        <input class="form-control" type="file" id="file_tugasakhir" name="file_tugasakhir" value="{{ old('file_tugasakhir', $tugas_akhir->file_tugasakhir)}}">
                    </div>
            </div> <!-- row -->

            <input type="hidden" name="tugasakhir_id" value="{{ old('tugasakhir_id', $tugas_akhir->id_tugasakhir) }}">
            
            <br>
            <div class="d-flex justify-content-center">
                <button class="btn btn-hijau" type="submit" style="width: 20%">Simpan</button> &nbsp;
                <a href="{{route('datatugas.staff')}}" class="btn btn-secondary" style="width: 20%">Kembali</a>
            </div>
        </form>
        
        </div>
    </div>
    <br>
@endsection