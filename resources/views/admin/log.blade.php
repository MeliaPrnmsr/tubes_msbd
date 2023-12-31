@extends('admin.adminlayout')
@php
    $active = 'log';
@endphp
@section('content')
<br>
<h3 class="text-center"><b>Log</b></h3> 
<div class="card">
    <br>
    <div class="card-body">
      <div class="row d-flex justify-content-center">  
        <div class="col-8">
          <form action="/log_admin" method="GET">
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
      <div class="card-body mx-auto justify-content-center" style="width: 95%">
        <div class="row bg-hijau shadow p-3 mb-2">
          <div class="col-1">No</div>
          <div class="col-2">Tindakan</div>
          <div class="col-2  ">Waktu</div>
          <div class="col-2 ">Sebelum</div>
          <div class="col-2 ">Sesudah</div>
          <div class="col-2 ">Deskripsi</div>
        </div>
        @php
            $i=1;
        @endphp
  
        @foreach ($cariLog as $data)
          <div class="row shadow p-3 mb-2 align-items-center">
          <div class="col-1">{{ $i }}</div>
          <div class="col-2">{{ $data->action }}</div>
          <div class="col-2 ">{{ $data->waktu }}</div>
          <div class="col-2">{{ $data->sebelum }}</div>
          <div class="col-2">{{ $data->sesudah }}</div>
          <div class="col-2">{{ $data->deskripsi }}</div>

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
        {{ $cariLog->links() }}
      </div>
      {{-- pagination end --}}
  </div>
  <br>
@endsection