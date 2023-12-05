@extends('staff.stafflayout')

@section('content')
    
    <!-- Register -->
    <div class="container-fluid mt-5">
        <h3 class="card-title text-center mt-3"><b>Tambah Data Mahasiswa</b></h3>
        <br>
        <div class="card mx-auto">
            <div class="card-body">
                <form action="/insertmahasiswa" method="POST">
                    @csrf

                    <div class="mt-3">
                        <label for="NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="NIM" name="NIM" aria-describedby="NIM">
                    </div>
                    <div class="mt-3">
                        <label for="nama_mahasiswa" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" aria-describedby="nama_mahasiswa">
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                    </div>
                    <div class="mt-3">
                        <label for="prodi" class="form-label">Prodi</label>
                      <select class="form-select" id="prodi" name="prodi">
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id_prodi }}">{{$prodi->jenjang}} - {{ $prodi->nama_prodi}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-hijau mt-3" style="width: 20%">Tambahkan</button>
                        <a href="{{route('datamahasiswa.staff')}}" class="btn btn-secondary mt-3" style="width: 20%">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection