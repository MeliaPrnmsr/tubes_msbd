@extends('admin.adminlayout')
@php
$active = 'staff';
@endphp
@section('content')
<!-- Register -->
<div class="container mt-5">
    <h3 class="card-title text-center mt-3"><b>Tambah Data Dosen</b></h3>
    <br>
    <div class="card mx-auto">
        <div class="card-body">
            <form action="/insertStaff" method="POST">
                @csrf

                <div class="mt-3">
                    <label for="kode_staff" class="form-label">Kode Dosen</label>
                    <input type="text" class="form-control @error('kode_staff') is-invalid @enderror" id="kode_staff"
                        name="kode_staff" aria-describedby="kode_staff" value="{{ old('kode_staff')}}">
                    @error('kode_staff')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="nama_staff" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_staff') is-invalid @enderror" id="nama_staff"
                        name="nama_staff" aria-describedby="nama_staff" value="{{ old('nama_staff')}}">
                    @error('nama_staff')
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
                    <a href="{{ route('datastaff.admin') }}" class="btn btn-secondary mt-3" style="width: 20%">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection