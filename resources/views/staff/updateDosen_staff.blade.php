@extends('staff.stafflayout')
@php
    $active = 'datadosen';
@endphp
@section('content')
    <!-- Register -->
<div class="container mt-5">
    <h3 class="card-title text-center mt-3"><b>Perbarui Dosen</b></h3>
    <br>
    <div class="card mx-auto">
        <div class="card-body">
            <form action="/updatedosen" method="post">
                @csrf
                <div class="mt-3">
                    <label for="kode" class="form-label">Kode Dosen</label>
                    <input type="kode" class="form-control" id="kode" name="kode" aria-describedby="name" value="{{ old('kode',$dosen->kode_dosen) }}">
                </div>
                <div class="mt-3">
                    <label for="Name" class="form-label">Nama</label>
                    <input type="name" class="form-control" id="name" name="nama" aria-describedby="name" value="{{ old('nama',$dosen->nama_dosen) }}">
                </div>
                <div class="mt-3"> 
                    <label for="nip" class="form-label">NIP</label>
                    <input type="nip" class="form-control" id="nip" name="NIP"  aria-describedby="nip" value="{{ old('NIP',$dosen->NIP) }}">
                </div>
                <div class="mt-3"> 
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="nidn" class="form-control" id="nidn" name="NIDN" aria-describedby="nidn" value="{{ old('NIDN',$dosen->NIDN) }}">
                </div>
                <div class="mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="email" aria-describedby="email" value="{{ old('email',$dosen->email) }}">
                </div>
                <div class="mt-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                        <option value="{{$dosen->prodi_id}}">{{$dosen->jenjang}} - {{ $dosen->nama_prodi}}</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id_prodi }}">{{$prodi->jenjang}} - {{ $prodi->nama_prodi}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="user_id" value="{{ old('user_id', $dosen->user_id) }}">

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-hijau mt-3" style="width: 20%">Simpan</button>
                    <a href="{{route('datadosen.staff')}}" class="btn btn-secondary mt-3" style="width: 20%">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection