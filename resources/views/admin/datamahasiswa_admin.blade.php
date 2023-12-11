@extends('admin.adminlayout')
@php
    $active = 'mahasiswa';
@endphp
@section('content')
<br>
<h3 class="text-center pt-2"><b>Data Mahasiswa</b></h3>
<div class="card">
  <br>
  <div class="card-body">
    <div class="row d-flex justify-content-center">
      <div class="col-8">
        <form action="/datamahasiswa_admin" method="GET">
          <div class="input-group">
            <input class="form-control border-end-0 border rounded-pill" type="text" value="{{ request('search') }}"
              id="example-search-input" name="search">
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
      <div class="col-4">Nama</div>
      <div class="col-2">NIM</div>
      <div class="col-3">Prodi</div>
      <div class="col-2">Aksi</div>
    </div>

    @php
    $i=1;
    @endphp
    @foreach ($cariMahasiswa as $cari)
    <div class="row shadow p-3 mb-2 align-items-center">
      <div class="col-1">{{ $i }}</div>
      <div class="col-4">{{ $cari->nama_mahasiswa }}</div>
      <div class="col-2">{{ $cari->NIM }}</div>
      <div class="col-3">{{ $cari->nama_prodi }}</div>
      <div class="col-2">
        <a href="{{ route('detailmahasiswa.admin', ['NIM' => $cari->NIM]) }}" class="btn btn-repository">Detail</a>
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
    {{ $cariMahasiswa->links() }}
  </div>
  {{-- pagination end --}}
</div>
<br>
@endsection