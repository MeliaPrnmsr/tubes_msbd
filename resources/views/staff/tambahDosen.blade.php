@extends('staff.stafflayout')
@php
$active = 'datadosen';
@endphp
@section('content')
<!-- Register -->
<div class="container mt-5">
    <h3 class="card-title text-center mt-3"><b>Tambah Data Dosen</b></h3>
    <br>
    <div class="card mx-auto">
        <div class="card-body">
            <form action="/insertdosen" method="POST">
                @csrf

                <div class="mt-3">
                    <label for="kode_dosen" class="form-label">Kode Dosen</label>
                    <input type="text" class="form-control @error('kode_dosen') is-invalid @enderror" id="kode_dosen"
                        name="kode_dosen" aria-describedby="kode_dosen" value="{{ old('kode_dosen')}}">
                    @error('kode_dosen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="nama_dosen" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" id="nama_dosen"
                        name="nama_dosen" aria-describedby="nama_dosen" value="{{ old('nama_dosen')}}">
                    @error('nama_dosen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="NIP" name="NIP"
                        aria-describedby="NIP" value="{{ old('NIP')}}">
                    @error('NIP')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="NIDN" class="form-label">NIDN</label>
                    <input type="text" class="form-control @error('NIDN') is-invalid @enderror" id="NIDN" name="NIDN"
                        aria-describedby="NIDN" value="{{ old('NIDN')}}">
                    @error('NIDN')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" aria-describedby="email" value="{{ old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="prodi" class="form-label mt-3">Prodi</label>
                    <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                        <option value="0" selected disabled>Pilih prodi</option>
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
                    <a href="{{ route('datadosen.staff') }}" class="btn btn-secondary mt-3" style="width: 20%">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection