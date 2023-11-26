@extends('staff.stafflayout')

@section('content')
    
    <!-- Register -->
    <div class="container-fluid mt-5">
        <h3 class="card-title text-center mt-3"><b>Tambah Data Mahasiswa</b></h3>
        <br>
        <div class="card mx-auto">
            <div class="card-body">
                <form>
                    <div class="mt-3">
                        <label for="Name" class="form-label">NIM</label>
                        <input type="name" class="form-control" id="name" aria-describedby="name">
                    </div>
                    <div class="mt-3">
                        <label for="Name" class="form-label">Nama</label>
                        <input type="name" class="form-control" id="name" aria-describedby="name">
                    </div>
                    <div class="mt-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" aria-describedby="email">
                    </div>
                    <div class="mt-3">
                        <label for="prodi" class="form-label">Prodi</label>
                      <select class="form-select" aria-label="prodi">
                        <option>S1 Teknologi Informasi</option>
                        <option>S1 Ilmu Komputer</option>
                        <option>S2 Teknik Informatika</option>
                        <option>S3 Ilmu Komputer</option>
                      </select>
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