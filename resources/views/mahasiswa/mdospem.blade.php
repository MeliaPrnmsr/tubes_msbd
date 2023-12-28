@extends('mahasiswa.mlayout')

@section('content')
<div class="container">
  <br>
  <div class="col-1">
    <button class="btn btn-hijau rounded-circle" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
  </div>
  <br>
  <h3 class="text-center" style="color: #006633"><b>{{$dosen->nama_dosen}}</b></h3>
</div>
<br>
<div class="container">
  <!--bookmark-->
  <div class="card border-0">
    <div class="card-body">
      <div class="row d-flex justify-content-center">
        <div class="col-8">
          <form action="/mdosenpembimbing/{{$dosen->nama_dosen}}" method="get">
            <div class="input-group">
              <input class="form-control border-end-0 border rounded-pill" type="text" value="{{ request('search')}}"
                name="search" id="search" placeholder="cari berdasarkan judul/tahun terbit/tipe tugas akhir">
              <span class="input-group-append">
                <button class="btn btn-outline-secondary bg-white border-start-0 border rounded-pill ms-n3"
                  type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>

    @if ($tugas_akhir->isEmpty())
    <div class="alert alert-repository-no" role="alert">
      <small><i class="fa-solid fa-circle-info"></i>&nbsp; Tidak ada bookmark yang disimpan.</small>
    </div>
    @else
    {{-- tabel daftar mhs start --}}
    <div class="card-body mx-auto justify-content-center" style="width: 100%">
      <div class="row bg-hijau shadow p-3 mb-2">
        <div class="col-1 text-center">No</div>
        <div class="col-5">Judul</div>
        <div class="col-2 text-center">Tahun Terbit</div>
        <div class="col-2 text-center">Tipe</div>
        <div class="col-2 text-center">Aksi</div>
      </div>

      @php
      $i=1;
      @endphp
      @foreach ($tugas_akhir as $tugasakhir)
      <div class="row shadow p-3 mb-2 align-items-center">
        <div class="col-1">{{$i}}</div>
        <div class="col-5">{{$tugasakhir->judul}}</div>
        <div class="col-2 text-center">{{$tugasakhir->tahun_terbit}}</div>
        <div class="col-2 text-center">{{$tugasakhir->tipe_ta}}</div>
        <div class="col-2 text-center">
          <a href="{{ route('detail.mahasiswa', ['id_tugasakhir' => $tugasakhir->id_tugasakhir]) }}"
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
      {{$tugas_akhir->links()}}
    </div>
    {{-- pagination end --}}
    @endif

  </div>
</div>
@endsection