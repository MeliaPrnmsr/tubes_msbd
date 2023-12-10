@extends('admin.adminlayout')
@php
    $active = 'staff';
@endphp
@section('content')
    <!-- Register -->
<div class="container mt-5">
    <h3 class="card-title text-center mt-3"><b>Detail staff</b></h3>
    <br>
    <a href="{{route('datastaff.admin')}}" class="btn btn-hijau text-start" style="width: 10%">Kembali</a>
        <br><br>
    <div class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mt-3">
                    <label for="Name" class="form-label">Kode staff</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name" value="{{ $staff->kode_staff }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="Name" class="form-label">Nama</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name" value="{{ $staff->nama_staff }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" aria-describedby="email" value="{{ $staff->email }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="prodi" class="form-label mt-3">Prodi</label>
                    <input type="prodi" class="form-control" id="prodi" aria-describedby="prodi" value="{{ $staff->jenjang }} - {{ $staff->nama_prodi }}" readonly>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" href="#" class="btn btn-hijau mt-3" style="width: 20%">Edit</button>
                    <button type="cancel" href="/datastaffstaff" class="btn btn-secondary mt-3" style="width: 20%">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection