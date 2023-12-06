@extends('staff.stafflayout')
@php
    $active = 'datamahasiswa';
@endphp
@section('content')
    
    <!-- Register -->
    <div class="container-fluid mt-5">
        <h3 class="card-title text-center mt-3"><b>Tambah Data Mahasiswa</b></h3>
        <br>
        <div class="card mx-auto">
            <div class="card-body">
                <form action="/insertmahasiswa" method="POST">
                    @csrf

                    <div class="mt-3">
                        <label for="NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" aria-describedby="NIM" value="{{ old('NIM') }}">
                        @error('NIM')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mt-3">
                        <label for="nama_mahasiswa" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa" name="nama_mahasiswa" aria-describedby="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
                        @error('nama_mahasiswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mt-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                            @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id_prodi }}">{{$prodi->jenjang}} - {{ $prodi->nama_prodi}}</option>
                            @endforeach
                        </select>
                        @error('prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-hijau mt-3" style="width: 20%">Tambahkan</button>
                        <a href="{{route('datamahasiswa.staff')}}" class="btn btn-secondary mt-3" style="width: 20%">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection