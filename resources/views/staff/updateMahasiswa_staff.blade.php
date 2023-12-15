@extends('staff.stafflayout')
@php
    $active = 'mahasiswa';
@endphp
@section('content')
    
    <!-- Register -->
    <div class="container-fluid mt-5">
        <h3 class="card-title text-center mt-3"><b>Perbarui Mahasiswa</b></h3>
        <br>
        <a href="{{route('datamahasiswa.staff')}}" class="btn btn-hijau text-start" style="width: 10%">Kembali</a>
        <br><br>
        <div class="card mx-auto">
            <div class="card-body">
                <form action="/updatemahasiswa" method="POST">
                    @csrf

                    <div class="mt-3">
                        <label for="NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="NIM" name="NIM" aria-describedby="NIM" value="{{ old('NIM', $mahasiswa->NIM) }}">
                    </div>
                    <div class="mt-3">
                        <label for="nama_mahasiswa" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" aria-describedby="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}">
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" value="{{ old('email', $mahasiswa->email) }}">
                    </div>
                    <div class="mt-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                            <option value="{{$mahasiswa->prodi_id}}">{{$mahasiswa->jenjang}} - {{ $mahasiswa->nama_prodi}}</option>
                            @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id_prodi }}">{{$prodi->jenjang}} - {{ $prodi->nama_prodi}}</option>
                            @endforeach
                        </select>
                    </div> 
                    
                    <input type="hidden" name="user_id" value="{{ old('user_id', $mahasiswa->user_id) }}">
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-hijau mt-3" style="width: 20%">Simpan</button>
                        <a href="{{route('datamahasiswa.staff')}}" class="btn btn-secondary mt-3" style="width: 20%">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection