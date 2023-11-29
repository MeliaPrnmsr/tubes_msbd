@extends('staff.stafflayout')

@section('content')
    <!-- Register -->
<div class="container mt-5">
    <h3 class="card-title text-center mt-3"><b>Detail Dosen</b></h3>
    <br>
    <div class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mt-3">
                    <label for="Name" class="form-label">Kode Dosen</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name" value="{{ $dosen->kode_dosen }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="Name" class="form-label">Nama</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name" value="{{ $dosen->nama_dosen }}" readonly>
                </div>
                <div class="mt-3"> 
                    <label for="nip" class="form-label">NIP</label>
                    <input type="nip" class="form-control" id="nip" aria-describedby="nip" value="{{ $dosen->NIP }}" readonly>
                </div>
                <div class="mt-3"> 
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="nidn" class="form-control" id="nidn" aria-describedby="nidn" value="{{ $dosen->NIDN }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" aria-describedby="email" value="{{ $dosen->user->email }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="prodi" class="form-label mt-3">Prodi</label>
                    <input type="nidn" class="form-control" id="nidn" aria-describedby="nidn" value="{{ $dosen->prodi->jenjang }} - {{ $dosen->prodi->nama_prodi }}" readonly>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" href="#" class="btn btn-hijau mt-3" style="width: 20%">Edit</button>
                    <button type="cancel" href="/datadosenstaff" class="btn btn-secondary mt-3" style="width: 20%">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection