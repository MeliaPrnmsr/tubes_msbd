@extends('staff.stafflayout')

@section('content')
    <!-- Register -->
<div class="container mt-5">
    <h3 class="card-title text-center mt-3"><b>Tambah Data Dosen</b></h3>
    <br>
    <div class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mt-3">
                    <label for="Name" class="form-label">Kode Dosen</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mt-3">
                    <label for="Name" class="form-label">Nama</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name">
                </div>
                <div class="mt-3"> 
                    <label for="nip" class="form-label">NIP</label>
                    <input type="nip" class="form-control" id="nip" aria-describedby="nip">
                </div>
                <div class="mt-3"> 
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="nidn" class="form-control" id="nidn" aria-describedby="nidn">
                </div>
                <div class="mt-3">
                    <label for="fakultas" class="form-label mt-3">Fakultas</label> 
                    <select class="form-select" aria-label="fakultas">
                        <option>Fasilkom TI</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="prodi" class="form-label mt-3">Prodi</label>
                  <select class="form-select" aria-label="prodi">
                    <option>S1 Teknologi Informasi</option>
                    <option>S1 Ilmu Komputer</option>
                    <option>S2 Teknik Informatika</option>
                    <option>S3 Ilmu Komputer</option>
                  </select>
                </div>
                <div class="mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" aria-describedby="email">
                </div>
                <div class="mt-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password">
                </div>
                <div class="mt-3">
                    <label for="Alamat" class="form-label">Alamat</label>
                    <textarea type="alamat" class="form-control" id="Alamat" aria-describedby="alamat"></textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" href="#" class="btn btn-hijau mt-3" style="width: 20%">Tambahkan</button>
                    <button type="cancel" href="/datamahasiswastaff" class="btn btn-secondary mt-3" style="width: 20%">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection