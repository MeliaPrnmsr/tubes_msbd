@extends('staff.stafflayout')
{{-- @php
    $active = 'datamahasiswa';
@endphp --}}
@section('content')
<br>
<h3 class="text-center pt-2"><b>Data Staff</b></h3>
<div class="card">
  <br>
  <div class="card-body">
    <div class="row d-flex justify-content-center">
      <div class="col-3">
        <a href="/tambahstaff" class="btn btn-hijau"><i class="fa-solid fa-user-plus"></i> &nbsp;Tambah Data</a>
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
        <div class="col-4">Nama</div>
        <div class="col-2">NIP</div>
        <div class="col-3">NIDN</div>
        <div class="col-2">Aksi</div>
      </div>

      <div class="row shadow p-3 mb-2 align-items-center">
        <div class="col-1">1</div>
        <div class="col-4">Kim Seok Jin</div>
        <div class="col-2">12021992</div>
        <div class="col-3">19921202</div>
        <div class="col-2">
          <a href="/detailmahasiswastaff" class="btn btn-repository">Detail</a>
        </div>
      </div>

      <div class="row shadow p-3 mb-2 align-items-center">
        <div class="col-1">2</div>
        <div class="col-4">Kim Min Seok</div>
        <div class="col-2">12021992</div>
        <div class="col-3">19921202</div>
        <div class="col-2">
          <a href="/detailmahasiswastaff" class="btn btn-repository">Detail</a>
        </div>
      </div>

      <div class="row shadow p-3 mb-2 align-items-center">
        <div class="col-1">3</div>
        <div class="col-4">Kim Seok Jin</div>
        <div class="col-2">12021992</div>
        <div class="col-3">19921202</div>
        <div class="col-2">
          <a href="/detailmahasiswastaff" class="btn btn-repository">Detail</a>
        </div>
      </div>

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