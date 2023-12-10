@extends('admin.adminlayout')
@php
    $active = 'tugas_akhir';
@endphp
@section('content')
<br>
<h3 class="card-body text-center"><b>Data Tugas Akhir</b></h3>
<div class="card">
  <br>
  <div class="card-body">
    <div class="row d-flex justify-content-center">
      <div class="col-8">
        <form action="/datatugasakhir_admin" method="GET">
          <div class="input-group">
            <input class="form-control border-end-0 border rounded-pill" type="text" value="{{ request('search') }}" id="example-search-input" name="search">
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
        <div class="col-3">Prodi</div>
        <div class="col-2 text-center">Tahun Terbit</div>
        <div class="col-2 text-center">Aksi</div>
      </div>

      @php
      $i=1;
    @endphp
    @foreach ($cariTugas as $cari)

    <div class="row shadow p-3 mb-2 align-items-center">
      <div class="col-1">{{ $i }}</div>
      <div class="col-4">{{ $cari ->judul }}</div>
      <div class="col-3">{{ $cari ->tipe_ta }}</div>
      <div class="col-2 text-center">{{ $cari ->tahun_terbit }}</div>
      <div class="col-2 text-center">
        <a href="{{ route('detailtugas.admin', ['id_tugasakhir' => $cari->id_tugasakhir]) }}" class="btn btn-repository">Detail</a>
      </div>
    </div>
    @php
        $i++
    @endphp
    @endforeach


    </div>
    {{-- tabel daftar mhs end --}}
    <br>
    {{-- pagination start --}}
    <div class="d-flex justify-content-center card-body">
      {{ $cariTugas->links() }}
    </div>
    {{-- pagination end --}}
</div>
<br>
@endsection