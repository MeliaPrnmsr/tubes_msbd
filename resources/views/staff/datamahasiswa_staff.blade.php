@extends('staff.stafflayout')
@php
    $active = 'datamahasiswa';
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
<h3 class="text-center p-2" style="color:#006633"><b>Data Mahasiswa</b></h3>
<div class="card">
  <br>
  <div class="card-body">
    <div class="row d-flex justify-content-center">
      <div class="col-3">
        <a href="{{route('tambahmahasiswa.staff')}}" class="btn btn-hijau"><i class="fa-solid fa-user-plus"></i> &nbsp;Tambah Data</a>
      </div>

      <div class="col-8">
        <form action="/datamahasiswa_staff" method="GET">
          <div class="input-group">
            <input class="form-control border-end-0 border rounded-pill" type="text" value="{{$search}}" id="example-search-input" name="search">
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

      @if(isset($noDataMessage))
        <p>{{ $noDataMessage }}</p>
      @else
      @php $i = 1; @endphp
      @foreach($mahasiswas as $mahasiswa)
      <div class="row shadow p-3 mb-2 align-items-center">
        <div class="col-1">{{ $i }}</div>
        <div class="col-4">{{ $mahasiswa->nama_mahasiswa }}</div>
        <div class="col-2">{{ $mahasiswa->NIM }}</div>
        <div class="col-3">{{$mahasiswa->jenjang}} - {{$mahasiswa->nama_prodi}}</div>
        <div class="col-2">
          <a href="{{ route('detailMahasiswa.staff', ['NIM' => $mahasiswa->NIM]) }}" class="btn btn-repository">Detail</a>
        </div>
      </div>
      @php $i++; @endphp
      @endforeach
      
      

    </div>
    {{-- tabel daftar mhs end --}}
    <br>
    {{-- pagination start --}}
    <div class="d-flex justify-content-center card-body">
      {{ $mahasiswas->links() }}
    </div>
    {{-- pagination end --}}
    @endif
</div>
<br>
@endsection