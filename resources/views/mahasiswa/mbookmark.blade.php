@extends('mahasiswa.mlayout')

@section('content')
<div class="container-fluid">
    <br>
    <h3 class="text-center"><b>Bookmark Saya</b></h3>   
</div>
<div class="container">
    <!--bookmark-->
    <div class="card border-0">
        <div class="card-body">
          <div class="row d-flex justify-content-center">
            <div class="col-8">
              <form action="/mbookmark" method="get">
                <div class="input-group">
                  <input class="form-control border-end-0 border rounded-pill" type="text" value="{{ request('search')}}" name="search" id="search" placeholder="cari berdasarkan judul/tahun terbit/tipe tugas akhir/prodi">
                  <span class="input-group-append">
                      <button class="btn btn-outline-secondary bg-white border-start-0 border rounded-pill ms-n3" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
                </div>    
              </form> 
            </div>
          </div>
        </div>

        @if ($bookmarks->isEmpty())
        <div class="alert alert-repository-no" role="alert">
          <small><i class="fa-solid fa-circle-info"></i>&nbsp; Tidak ada bookmark yang disimpan.</small>
        </div>
    @else      
          {{-- tabel daftar mhs start --}}
          <div class="card-body mx-auto justify-content-center" style="width: 90%">
            <div class="row bg-hijau shadow p-3 mb-2">
              <div class="col-1">No</div>
              <div class="col-5">Judul</div>
              <div class="col-2 text-center">Tahun Terbit</div>
              <div class="col-2 text-center">Prodi</div>
              <div class="col-2 text-center">Aksi</div>
            </div>
      
            @php
            $i=1;
            @endphp
            @foreach ($bookmarks as $bookmark)
            <div class="row shadow p-3 mb-2 align-items-center">
              <div class="col-1">{{$i}}</div>
              <div class="col-5">{{$bookmark->judul}}</div>
              <div class="col-2 text-center">{{$bookmark->tahun_terbit}}</div>
              <div class="col-2 text-center">{{$bookmark->jenjang}} {{$bookmark->nama_prodi}}</div>
              <div class="col-2 text-center">
                <a href="{{ route('detail.mahasiswa', ['id_tugasakhir' => $bookmark->id_tugasakhir]) }}"
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
            {{$bookmarks->links()}}
          </div>
          {{-- pagination end --}}
          @endif
      </div>
</div>
@endsection