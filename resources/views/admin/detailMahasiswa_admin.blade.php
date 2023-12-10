@extends('admin.adminlayout')
@php
    $active = 'mahasiswa';
@endphp
@section('content')
    
    <!-- Register -->
    <div class="container-fluid mt-5">
        <h3 class="card-title text-center mt-3"><b>Tambah Data Mahasiswa</b></h3>
        <br>
        <a href="{{route('datamahasiswa.admin')}}" class="btn btn-hijau text-start" style="width: 10%">Kembali</a>
        <br><br>
        <div class="card mx-auto">
            <div class="card-body">
                <form action="#" method="GET">
                    @csrf

                    <div class="mt-3">
                        <label for="NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="NIM" name="NIM" aria-describedby="NIM" value="{{ $mahasiswa->NIM }}" readonly>
                    </div>
                    <div class="mt-3">
                        <label for="nama_mahasiswa" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" aria-describedby="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}" readonly>
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{ $mahasiswa->email }}" readonly>
                    </div>
                    <div class="mt-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" aria-describedby="prodi" value="{{ $mahasiswa->jenjang }} - {{ $mahasiswa->nama_prodi }}" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection