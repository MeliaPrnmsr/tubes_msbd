@extends('staff.stafflayout')

@section('content')
<br>
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @elseif(session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Berhasil! </strong> {{session('deleted')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
<h3 class="card-body text-center"><b>Data Tugas Akhir</b></h3>
<div class="card">
  <br>
  <div class="card-body">
    <div class="row d-flex justify-content-center">
      <div class="col-3">
        <a href="{{route('tambahtugasakhir.staff')}}" class="btn btn-hijau"><i class="fa-solid fa-user-plus"></i> &nbsp;Tambah Data</a>
      </div>

      <div class="col-8">
        <div class="input-group">
          <input class="form-control border-end-0 border rounded-pill" type="text" value="search" id="example-search-input">
          <span class="input-group-append">
              <button class="btn btn-outline-secondary bg-white border-start-0 border rounded-pill ms-n3" type="button">
                  <i class="fa fa-search"></i>
              </button>
          </span>
        </div>     
      </div>

    </div>
  </div>
  <br>

    {{-- tabel daftar mhs start --}}
    <div class="card-body mx-auto justify-content-center" style="width: 90%">
      <div class="row bg-hijau shadow p-3 mb-2">
        <div class="col-1">No</div>
        <div class="col-4">Judul Tugas Akhir</div>
        <div class="col-3">Penulis</div>
        <div class="col-2 text-center">Tahun Terbit</div>
        <div class="col-2 text-center">Aksi</div>
      </div>

      @foreach($tugas_akhirs as $index => $tugas_akhir)
      <div class="row shadow p-3 mb-2 align-items-center">
        <div class="col-1">{{ $index + 1 }}</div>
        <div class="col-4">{{ $tugas_akhir->judul }}</div>
        <div class="col-3">{{$tugas_akhir->mahasiswa->nama_mahasiswa}}</div>
        <div class="col-2">{{ $tugas_akhir->tahun_terbit }}</div>
        <div class="col-2">
          <a href="{{ route('detailTugasakhir.staff', ['id_tugasakhir' => $tugas_akhir->id_tugasakhir]) }}" class="btn btn-repository">Detail</a>
        </div>
      </div>
      @endforeach

    </div>
    {{-- tabel daftar mhs end --}}
    <br>
    {{-- pagination start --}}
    <div class="d-flex justify-content-center card-body">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous" style="color: #3dae2b">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#"  style="color: #3dae2b">1</a></li>
          <li class="page-item"><a class="page-link" href="#"  style="color: #3dae2b">2</a></li>
          <li class="page-item"><a class="page-link" href="#"  style="color: #3dae2b">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next"  style="color: #3dae2b">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    {{-- pagination end --}}
</div>
<br>
@endsection