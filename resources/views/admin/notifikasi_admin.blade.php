@extends('admin.adminlayout')
@php
    $active = 'notifikasi';
@endphp
@section('content')
<br>
<h3 class="text-center"><b>Pemberitahuan</b></h3> 
<div class="card border-0">
    <div class="card-body">
        <br>
        {{-- notifikasi start --}}
        @foreach ($query as $data)
            
        
        <div class="alert alert-repository" role="alert">
          <div class="row">
            <div class="col-11">
           <b> {{ $data->username }}</b>  telah menyukai tugas akhir berjudul <b> "{{ $data->judul }}"</b> pada 
             {{ $data->waktu_dibuat }}

            </div>
            <div class="col-1">
              <div class="d-flex justify-content-end">
                <button class="btn fa-solid fa-circle-exclamation"></button>
              </div>
            </div>
          </div>
        </div>


        @endforeach
        

        {{-- notifikasi end --}}
        <br>
        <div class="d-flex justify-content-center card-body">
          {{ $query->links() }}
        </div>

    </div>
</div>
@endsection