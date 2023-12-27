@extends('dosen.dlayout')

@section('content')
<div class="container-fluid">
    <br>
    <h3 class="text-center"><b>Bimbingan Saya</b></h3>   
</div>
<div class="container-fluid">
    <!--bimbingan-->
    <div class="card border-0">
        <div class="card-body">
          <div class="row d-flex justify-content-center">
            <div class="col-8">
              <form action="/dbimbingan" method="get">
                <div class="input-group">
                  <input class="form-control border-end-0 border rounded-pill" type="text" value="{{ request('search')}}" name="search" id="example-search-input" placeholder="cari berdasarkan judul/tahun terbit/tipe tugas akhir">
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

            @if ($bimbingans->isEmpty())
            <div class="alert alert-repository-no" role="alert">
              <small><i class="fa-solid fa-circle-info"></i>&nbsp; Tidak ada Tugas Akhir yang dibimbing.</small>
            </div>
        @else      
              {{-- tabel daftar mhs start --}}
              <div class="card-body mx-auto justify-content-center" style="width: 90%">
                <div class="row bg-hijau shadow p-3 mb-2">
                  <div class="col-1">No</div>
                  <div class="col-5">Judul</div>
                  <div class="col-2">Tipe Tugas Akhir</div>
                  <div class="col-2">Tahun Terbit</div>
                  <div class="col-2 text-center">Aksi</div>
                </div>
          
                @php
                $i=1;
                @endphp
                @foreach ($bimbingans as $bimbingan)
                <div class="row shadow p-3 mb-2">
                  <div class="col-1">{{$i}}</div>
                  <div class="col-5">{{$bimbingan->judul}}</div>
                  <div class="col-2">{{$bimbingan->tipe_ta}}</div>
                  <div class="col-2">{{$bimbingan->tahun_terbit}}</div>
                  <div class="col-2 text-center">
                    <a href="{{ route('detail.dosen', ['id_tugasakhir' => $bimbingan->id_tugasakhir]) }}"
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
                {{$bimbingans->links()}}
              </div>
              {{-- pagination end --}}
              @endif
      </div>
</div>
@endsection