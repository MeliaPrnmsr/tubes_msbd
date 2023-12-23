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
                        <select class="form-control ch @error('author') is-invalid @enderror" id="author" name="author">
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->NIM }}" @if(old('author') == $mahasiswa->NIM) selected @endif>{{ $mahasiswa->nama_mahasiswa }}</option>
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
                        <select class="ch form-select @error('tipe_ta') is-invalid @enderror" id="tipe_ta" name="tipe_ta">
                            <option value="skripsi" @if(old('tipe_ta') == 'skripsi') selected @endif>Skripsi</option>
                            <option value="tesis" @if(old('tipe_ta') == 'tesis') selected @endif>Tesis</option>
                            <option value="disertasi" @if(old('tipe_ta') == 'disertasi') selected @endif>Disertasi</option>
                        </select>
                        @error('tipe_ta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                </div>


                @if ($jenjangStaff=='S1' || $jenjangStaff=='S2')
                    

                <div class="col">
                    <div class="mb-4">
                        <label for="dospem1" class="form-label"><b>Pembimbing 1</b></label>
                        <select class="ch form-select @error('dospem1') is-invalid @enderror" id="dospem1" name="dospem1">
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->kode_dosen }}" @if(old('dospem1') == $dosen->kode_dosen) selected @endif>{{ $dosen->nama_dosen }}</option>
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
                        <select class="ch form-select @error('dospem2') is-invalid @enderror" id="dospem2" name="dospem2">
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->kode_dosen }}" @if(old('dospem2') == $dosen->kode_dosen) selected @endif>{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                        @error('dospem2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        

                    </div>
                </div>


                @else


                <div class="col">
                    <div class="mb-4">
                        <label for="promotor1" class="form-label"><b>Promotor1 1</b></label>
                        <select class="ch form-select @error('promotor1') is-invalid @enderror" id="promotor1" name="promotor1">
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->kode_dosen }}" @if(old('promotor1') == $dosen->kode_dosen) selected @endif>{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                        @error('promotor1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                </div>

                <div class="col">
                    <div class="mb-4">
                        <label for="promotor2" class="form-label"><b>Promotor 2</b></label>
                        <select class="ch form-select @error('promotor2') is-invalid @enderror" id="promotor2" name="promotor2">
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->kode_dosen }}" @if(old('promotor2') == $dosen->kode_dosen) selected @endif>{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                        @error('promotor2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        

                    </div>
                </div>
            
                <div class="col">
                    <div class="mb-4">
                        <label for="promotor3" class="form-label"><b>Promotor 3</b></label>
                        <select class="ch form-select @error('promotor3') is-invalid @enderror" id="promotor3" name="promotor3">
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->kode_dosen }}" @if(old('promotor3') == $dosen->kode_dosen) selected @endif>{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                        @error('promotor3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        

                    </div>
                </div>

                    
                @endif


               




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
                        <select class="ch form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id_kategori }}" @if(old('kategori') == $kategori->id_kategori) selected @endif>{{ $kategori->nama_kategori }}</option>
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
                <label for="file_pustaka" class="form-label"><b>File pustaka</b></label>
                <input class="form-control @error('file_pustaka') is-invalid @enderror" type="file" value="{{ old('file_pustaka')}}" id="file_pustaka"
                    name="file_pustaka">
                    @error('file_pustaka')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>


        
            <div class="mb-4">
                <label for="bab1" class="form-label"><b>Bab 1</b></label>
                <input class="form-control @error('bab1') is-invalid @enderror" type="file" value="{{ old('bab1')}}"
                    id="bab1" name="bab1">
                    @error('bab1')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>

            <div class="mb-4">
                <label for="bab2" class="form-label"><b>Bab 2</b></label>
                <input class="form-control @error('bab2') is-invalid @enderror" type="file" value="{{ old('bab2')}}"
                    id="bab2" name="bab2">
                    @error('bab2')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>


            <div class="mb-4">
                <label for="bab3" class="form-label"><b>Bab 3</b></label>
                <input class="form-control @error('bab3') is-invalid @enderror" type="file" value="{{ old('bab3')}}"
                    id="bab3" name="bab3">
                    @error('bab3')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>


            <div class="mb-4">
                <label for="bab4" class="form-label"><b>Bab 4</b></label>
                <input class="form-control @error('bab4') is-invalid @enderror" type="file" value="{{ old('bab4')}}"
                    id="bab4" name="bab4">
                    @error('bab4')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
            </div>


            <div class="mb-4">
                <label for="bab5" class="form-label"><b>Bab 5</b></label>
                <input class="form-control @error('bab5') is-invalid @enderror" type="file" value="{{ old('bab5')}}"
                    id="bab5" name="bab5">
                    @error('bab5')
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