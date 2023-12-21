@extends('staff.stafflayout')
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
        <div class="alert alert-repository" role="alert">
          <div class="row">
            <div class="col-11">
              notifikasi penambahan data skripsi atau data user
            </div>
            <div class="col-1">
              <div class="d-flex justify-content-end">
                <button class="btn fa-solid fa-circle-exclamation"></button>
              </div>
            </div>
          </div>
        </div>

        <div class="alert alert-repository" role="alert">
          <div class="row">
            <div class="col-11">
              notifikasi penambahan data skripsi atau data user
            </div>
            <div class="col-1">
              <div class="d-flex justify-content-end">
                <button class="btn fa-solid fa-circle-exclamation"></button>
              </div>
            </div>
          </div>
        </div>
        {{-- notifikasi end --}}
        <br>
        <nav aria-label="Page-navigation-example">
            <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection