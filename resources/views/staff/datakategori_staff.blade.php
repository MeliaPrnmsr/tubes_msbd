@extends('staff.stafflayout')
@php
    $active = 'datakategori';
@endphp
@section('content')
<br>
<h3 class="text-center"><b>Daftar Kategori</b></h3>  
  <div class="row row-cols-2 card-body justify-content-center">
    <div class="card col mx-2 my-2" style="width: 45%">
      <div class="card-body">
        <h5 class="card-header"><b>S1 Ilmu Komputer</b></h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Internet of Things</li>
          <li class="list-group-item">Cyber Security</li>
          <li class="list-group-item">Cryptography</li>
          <li class="list-group-item">Data Science</li>
          <li class="list-group-item">Microcontroller</li>
        </ul>         
      </div>
    </div>

    <div class="card col mx-2 my-2" style="width: 45%">
      <div class="card-body">
        <h5 class="card-header"><b>S1 Teknologi Informasi</b></h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">data science</li>
          <li class="list-group-item">software engineering</li>
          <li class="list-group-item">multimedia</li>
          <li class="list-group-item">computer vision</li>
          <li class="list-group-item">IOT</li>
          <li class="list-group-item">Networking and Security</li>
          <li class="list-group-item">Intelligent Systems</li>
        </ul>
      </div>
    </div>

    <div class="card col mx-2 my-2" style="width: 45%">
      <div class="card-body">
        <h5 class="card-header"><b>S2 Teknik Informatika</b></h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Machine Learning</li>
          <li class="list-group-item">Internet Of Things</li>
          <li class="list-group-item">Cyber Security</li>
        </ul>
      </div>
    </div>

    <div class="card col mx-2 my-2" style="width: 45%">
      <div class="card-body">
        <h5 class="card-header"><b>S3 Ilmu Komputer</b></h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Soft Computing</li>
          <li class="list-group-item">Information Retrieval</li>
          <li class="list-group-item">Intelligent System</li>
          <li class="list-group-item">Mathematical Modelling</li>
          <li class="list-group-item">Advanced Networking</li>
        </ul>
      </div>
    </div>
</div>
@endsection
