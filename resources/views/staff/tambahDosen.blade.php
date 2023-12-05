@extends('staff.stafflayout')

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
                    <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" aria-describedby="kode_dosen">
                </div>
                <div class="mt-3">
                    <label for="nama_dosen" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" aria-describedby="nama_dosen">
                </div>
                <div class="mt-3"> 
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="NIP" name="NIP" aria-describedby="NIP">
                </div>
                <div class="mt-3"> 
                    <label for="NIDN" class="form-label">NIDN</label>
                    <input type="text" class="form-control" id="NIDN" name="NIDN" aria-describedby="NIDN">
                </div>
                <div class="mt-3">
                    <label for="prodi" class="form-label mt-3">Prodi</label>
                    <select class="form-select" id="prodi" name="prodi">
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id_prodi }}">{{ $prodi->jenjang }} - {{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-hijau mt-3" style="width: 20%">Tambahkan</button>
                    <button type="cancel" href="/datamahasiswastaff" class="btn btn-secondary mt-3" style="width: 20%">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection