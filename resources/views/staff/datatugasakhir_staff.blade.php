@extends('staff.stafflayout')
@php
$active = 'datatugas';
@endphp
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
        <a href="{{route('tambahtugasakhir.staff')}}" class="btn btn-hijau"><i class="fa-solid fa-user-plus"></i>
          &nbsp;Tambah Data</a>
      </div>

      <div class="col-8">
        <form action="/datatugasakhir_staff" method="GET">
          <div class="input-group">
            <input class="form-control border-end-0 border rounded-pill" type="text" name="search"
              id="search" value="{{ request('search') }}">
            <span class="input-group-append">
              <button class="btn btn-outline-secondary bg-white border-start-0 border rounded-pill ms-n3" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
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
    @php
    $i = 1;
    @endphp
    @foreach($tugas_akhirs as $tugas_akhir)
    <div class="row shadow p-3 mb-2 align-items-center">
      <div class="col-1">{{ $i }}</div>
      <div class="col-4">{{ Illuminate\Support\Str::limit($tugas_akhir->judul, $limit = 50, $end = '...') }}</div>
      <div class="col-3">{{ $tugas_akhir->nama_mahasiswa }}</div>
      <div class="col-2 text-center">{{ $tugas_akhir->tahun_terbit }}</div>
      <div class="col-2 text-center">
        <a href="{{ route('detailTugasakhir.staff', ['id_tugasakhir' => $tugas_akhir->id_tugasakhir]) }}"
          class="btn btn-repository">Detail</a>
      </div>
    </div>
    @php
    $i++;
    @endphp
    @endforeach

  </div>
  {{-- tabel daftar mhs end --}}
  <br>
  {{-- pagination start --}}
  <div class="d-flex justify-content-center card-body">
    {{$tugas_akhirs->links()}}
    </nav>
  </div>
  {{-- pagination end --}}
</div>
<br>
@endsection