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
                    <input type="name" class="form-control" id="name" aria-describedby="name" value="isinya" readonly>
                </div>
                <div class="mt-3">
                    <label for="Name" class="form-label">Nama</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name" value="isinya" readonly>
                </div>
                <div class="mt-3"> 
                    <label for="nip" class="form-label">NIP</label>
                    <input type="nip" class="form-control" id="nip" aria-describedby="nip" value="isinya" readonly>
                </div>
                <div class="mt-3"> 
                    <label for="nidn" class="form-label">NIDN</label>
                    <input type="nidn" class="form-control" id="nidn" aria-describedby="nidn" value="isinya" readonly>
                </div>
                <div class="mt-3">
                    <label for="fakultas" class="form-label mt-3">Fakultas</label> 
                    <input type="nidn" class="form-control" id="nidn" aria-describedby="nidn" value="isinya" readonly>
                </div>
                <div class="mt-3">
                    <label for="prodi" class="form-label mt-3">Prodi</label>
                    <input type="nidn" class="form-control" id="nidn" aria-describedby="nidn" value="isinya" readonly>
                </div>
                <div class="mt-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" aria-describedby="email" value="isinya" readonly>
                </div>
                <div class="mt-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password" value="isinya" readonly>
                </div>
                <div class="mt-3">
                    <label for="Alamat" class="form-label">Alamat</label>
                    <textarea type="alamat" class="form-control" id="Alamat" aria-describedby="alamat" value="isinya" readonly></textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" href="#" class="btn btn-hijau mt-3" style="width: 20%">Edit</button>
                    <button type="cancel" href="/datamahasiswastaff" class="btn btn-secondary mt-3" style="width: 20%">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection