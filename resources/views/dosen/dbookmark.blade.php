@extends('dosen.dlayout')

@section('content')
<div class="container-fluid">
    <br>
    <h3 class="text-center"><b>Bookmark Saya</b></h3>   
</div>
<div class="container-fluid">
    <!--bookmark-->
    <div class="card border-0">
        <div class="card-body">
          <div class="row d-flex justify-content-center">
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
      
          {{-- tabel daftar mhs start --}}
          <div class="card-body mx-auto justify-content-center" style="width: 90%">
            <div class="row bg-hijau shadow p-3 mb-2">
              <div class="col-1">No</div>
              <div class="col-5">Judul</div>
              <div class="col-2">Penulis</div>
              <div class="col-2 text-center">Tahun Terbit</div>
              <div class="col-2 text-center">Aksi</div>
            </div>
      
            <div class="row shadow p-3 mb-2 align-items-center">
              <div class="col-1">1</div>
              <div class="col-5">Kim Seok Jin</div>
              <div class="col-2">12021992</div>
              <div class="col-2 text-center">Teknologi Informasi</div>
              <div class="col-2 text-center">
                <a href="/detailmahasiswastaff" class="btn btn-repository">Detail</a>
              </div>
            </div>
      
            <div class="row shadow p-3 mb-2 align-items-center">
              <div class="col-1">2</div>
              <div class="col-5">Kim Min Seok</div>
              <div class="col-2">12021992</div>
              <div class="col-2 text-center">Teknologi Informasi</div>
              <div class="col-2 text-center">
                <a href="/detailmahasiswastaff" class="btn btn-repository">Detail</a>
              </div>
            </div>
      
            <div class="row shadow p-3 mb-2 align-items-center">
              <div class="col-1">3</div>
              <div class="col-5">Kim Seok Jin</div>
              <div class="col-2">12021992</div>
              <div class="col-2 text-center">Teknologi Informasi</div>
              <div class="col-2 text-center">
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
</div>
@endsection