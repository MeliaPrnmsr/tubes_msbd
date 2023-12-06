@extends('dosen.dlayout')

@section('content')
    <div class="container-fluid">
        <br>
        <h3 style="color: #006633"><b>Hasil Pencarian</b></h3>
        <hr>
    </div>
    <br>

    <div class="container-fluid">
            <div class="row m-2">
                
                <div class="col-9">
                    {{-- search button start --}}
                    <form role="search" method="GET" action="{{ route('search.dosen') }}">
                    <div class="d-flex mb-2">
                            <div class="me-2 w-25">
                                <select class="form-select" name="jenis_koleksi" aria-label="tipe">
                                    <option >All</option>
                                    <option value="skripsi" {{ session('pilihan_jeniskoleksi') == 'skripsi' ? 'selected' : '' }}>Skripsi</option>
                                    <option value="tesis" {{ session('pilihan_jeniskoleksi') == 'tesis' ? 'selected' : '' }}>Tesis</option>
                                    <option value="disertasi" {{ session('pilihan_jeniskoleksi') == 'disertasi' ? 'selected' : '' }}>Disertasi</option>
                                  </select>
                            </div>
                            <div class="w-75 d-flex justify-content-center w-100">
                                <input class="form-control me-2" name="search" type="search" value="{{ $search }}" placeholder="Cari Tugas Akhir" aria-label="Search">
                                <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    {{-- search button end --}}

                    {{-- teks --}}
                    <div class="alert alert-repository-no" role="alert">
                        <small><i class="fa-solid fa-circle-info"></i> menampilkan <b>xx</b> tugas akhir </small>
                    </div>
                    {{-- teks --}}
                    <br>
                    {{-- hasil skripsi pencarian start--}}
                    @foreach($results as $result)
                    <div class="card mb-3  ">
                        <div class="row p-2">
                            <div class="col-2">
                                <img src="{{asset('asset/img/sampulskripsi.jpeg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-10 justify-content-start">
                                <h6><b>{{$result->judul}}</b></h6>
                                <small style="font-size: 75%">Penulis : <b>{{$result->author}}</b></small>
                                <hr>
                                <small style="font-size: 70%"><i>
                                {{$result->abstrak}}
                                </i></small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- hasil skripsi pencarian end--}}
                    <br>
                    {{-- pagination start --}}
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
                    {{-- pagination end --}}

                </div> <!--End of col 1-->

                <div class="col-3">
                    <h6><b>Filter Pencarian</b></h6>
                    {{-- Filter 1 --}}
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-hijau">
                          Filter 1
                        </div>
                        <div class="card-body">
                         <form action="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pilihan1">
                                <label class="form-check-label" for="pilihan1">Pilihan 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pilihan2">
                                <label class="form-check-label" for="pilihan2">Pilihan 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pilihan3">
                                <label class="form-check-label" for="pilihan3">Pilihan 3</label>
                              </div>
                         </form>
                        </div>
                    </div>
                    <br>
                    {{-- Filter 1 --}}

                    {{-- Filter 2 --}}
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-hijau">
                          Filter 2
                        </div>
                        <div class="card-body">
                         <form action="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pilihan1">
                                <label class="form-check-label" for="pilihan1">Pilihan 1</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pilihan2">
                                <label class="form-check-label" for="pilihan2">Pilihan 2</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pilihan3">
                                <label class="form-check-label" for="pilihan3">Pilihan 3</label>
                              </div>
                         </form>
                        </div>
                    </div>
                    {{-- Filter 2 --}}

                </div>
            </div>
        <br>
    </div>
@endsection