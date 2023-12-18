@extends('staff.stafflayout')
@php
$active = 'datatugas';
@endphp
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
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                    placeholder="judul" value="{{ old('judul')}}">
                @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row row-cols-2">
                <!-- row -->
                <div class="col">
                    <div class="mb-4">
                        <label for="author" class="form-label"><b>Penulis</b></label>
                        <select class="form-select @error('author') is-invalid @enderror" id="author" name="author">
                            @foreach($mahasiswas as $mahasiswa)
                            <option value="{{ sprintf('%09d', $mahasiswa->NIM) }}">{{ $mahasiswa->nama_mahasiswa }}</option>
                            @endforeach
                        </select>
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="mb-4">
                        <label for="tipe_ta" class="form-label"><b>Tipe Tugas Akhir</b></label>
                        <select class="form-select @error('tipe_ta') is-invalid @enderror" id="tipe_ta" name="tipe_ta">
                            <option value="skripsi">Skripsi</option>
                            <option value="tesis">Tesis</option>
                            <option value="disertasi">Disertasi</option>
                        </select>
                        @error('tipe_ta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="mb-4">
                        <label for="dospem1" class="form-label"><b>Pembimbing 1</b></label>
                        <select class="form-select @error('dospem1') is-invalid @enderror" id="dospem1" name="dospem1">
                            @foreach($dosens as $dosen)
                            <option value="{{ $dosen->kode_dosen }}">{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                        @error('dospem1')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="mb-4">
                        <label for="dospem2" class="form-label"><b>Pembimbing 2</b></label>
                        <select class="form-select @error('dospem2') is-invalid @enderror" id="dospem2" name="dospem2">
                            @foreach($dosens as $dosen)
                            <option value="{{ $dosen->kode_dosen }}">{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                        @error('dospem2')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    </div>
                </div>

                <div class="col">
                    <div class="mb-4">
                        <label for="tahun_terbit" class="form-label"><b>Tahun Terbit</b></label>
                        <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror"
                            id="tahun_terbit" name="tahun_terbit" placeholder="tahun_terbit" min="1900" max="2099"
                            step="1" value="{{ old('tahun_terbit')}}">
                            @error('tahun_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="mb-4">
                        <label for="kategori" class="form-label"><b>Kategori</b></label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                            name="kategori">
                            @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div> <!-- row -->
            <div class="mb-4">
                <label for="abstrak" class="form-label"><b>Abstrak</b></label>
                <textarea class="form-control @error('abstrak') is-invalid @enderror" id="abstrak" name="abstrak"
                    placeholder="Abstrak" rows="4">{{ old('abstrak')}}</textarea>
                    @error('abstrak')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="mb-4">
                <label for="sampul" class="form-label"><b>Sampul</b></label>
                <input class="form-control @error('sampul') is-invalid @enderror" type="file" value="{{ old('sampul')}}" id="sampul" name="sampul">
                    @error('sampul')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="mb-4">
                <label for="file_metodologi" class="form-label"><b>File metodologi</b></label>
                <input class="form-control @error('file_metodologi') is-invalid @enderror" type="file" value="{{ old('file_metodologi')}}"
                    id="file_metodologi" name="file_metodologi">
                    @error('file_metodologi')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="mb-4">
                <label for="file_pustaka" class="form-label"><b>File pustaka</b></label>
                <input class="form-control @error('file_pustaka') is-invalid @enderror" type="file" value="{{ old('file_pustaka')}}" id="file_pustaka"
                    name="file_pustaka">
                    @error('file_pustaka')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="mb-4">
                <label for="file_tugasakhir" class="form-label"><b>File Isi Tugas Akhir</b></label>
                <input class="form-control @error('file_tugasakhir') is-invalid @enderror" type="file" value="{{ old('file_tugasakhir')}}"
                    id="file_tugasakhir" name="file_tugasakhir">
                    @error('file_tugasakhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn" style="background-color:  #3dae2b; width: 25%; color:white">Tambah</button> &nbsp; &nbsp;
                <a class="btn btn-secondary" href="{{route('datatugas.staff')}}" style=" width: 25%">Batal</a>
            </div>
        </form>

    </div>
</div>
<br>
@endsection