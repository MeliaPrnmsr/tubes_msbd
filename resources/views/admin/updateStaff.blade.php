@extends('staff.stafflayout')
@php
    $active = 'datadosen';
@endphp
@section('content')
    <!-- Register -->
<div class="container mt-5">
    <h3 class="card-title text-center mt-3"><b>Perbarui Staff</b></h3>
    <br>
    <div class="card mx-auto">
        <div class="card-body">
            <form action="/updateStaff" method="post">
                @csrf
                <div class="mt-3">
                    <label for="kode" class="form-label">Kode Staff</label>
                    <input type="kode" class="form-control" id="kode" name="kode" aria-describedby="kode" value="{{ old('kode',$staff->kode_staff) }}">
                </div>
                <div class="mt-3">
                    <label for="Name" class="form-label">Nama</label>
                    <input type="name" class="form-control" id="name" name="nama" aria-describedby="name" value="{{ old('nama',$staff->nama_staff) }}">
                </div>
                <div class="mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="email" aria-describedby="email" value="{{ old('email',$staff->email) }}">
                </div>
                <div class="mt-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select class="form-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                        <option value="{{$staff->prodi_id}}">{{$staff->jenjang}} - {{ $staff->nama_prodi}}</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id_prodi }}">{{$prodi->jenjang}} - {{ $prodi->nama_prodi}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="user_id" value="{{ old('user_id', $staff->user_id) }}">

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-hijau mt-3" style="width: 20%">Simpan</button>
                    <a href="{{route('datadosen.staff')}}" class="btn btn-secondary mt-3" style="width: 20%">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection