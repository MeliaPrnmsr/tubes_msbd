@extends('dosen.dlayout')

@section('content')
    <div class="container-fluid">
        <br>
        <h3 style="color: #006633"><b>Hasil Pencarian</b></h3>
        <hr>
    </div>
    <br>

    <div class="container-fluid">
        <form action="/dsearch" method="GET">
            @csrf

            <div class="row m-2">
                
                <div class="col-9">
                    {{-- search button start --}}
                    <div class="d-flex mb-2">
                            <div class="me-2 w-25">
                                <select class="form-select" aria-label="tipe">
                                    <option selected>All</option>
                                    <option value="skripsi">Skripsi</option>
                                    <option value="tesis">Tesis</option>
                                    <option value="disertasi">Disertasi</option>
                                  </select>
                            </div>
                            <div class="w-75">
                                <div class="d-flex justify-content-center w-100">
                                    <input class="form-control me-2" type="search" placeholder="Cari Tugas Akhir" aria-label="Search">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                    </div>
                    {{-- search button end --}}

                    {{-- teks --}}
                    <div class="alert alert-repository-no" role="alert">
                        <small><i class="fa-solid fa-circle-info"></i> menampilkan <b>xx</b> tugas akhir </small>
                    </div>
                    {{-- teks --}}
                    <br>
                    {{-- hasil skripsi pencarian start--}}
                    <div class="card mb-3  ">
                        <div class="row p-2">
                            <div class="col-2">
                                <img src="{{asset('asset/img/sampulskripsi.jpeg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-10 justify-content-start">
                                <h6><b>Ini Judul Skripsi</b></h6>
                                <small style="font-size: 75%">Penulis : <b>nama_penulis</b></small>
                                <hr>
                                <small style="font-size: 70%"><i>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Labore, aliquam quae! Asperiores, assumenda aut sed ullam labore corrupti tempora quae,
                                    laborum sunt quos voluptas nemo quas saepe quasi at iste.
                                </i></small>
                            </div>
                        </div>
                    </div>
                    {{-- hasil skripsi pencarian end--}}

                    {{-- hasil skripsi pencarian 2 start--}}
                    <div class="card mt-2 mb-2">
                        <div class="row p-2">
                            <div class="col-2">
                                <img src="{{asset('asset/img/sampulskripsi.jpeg')}}" alt="" class="w-100">
                            </div>
                            <div class="col-10 justify-content-start">
                                <h6><b>Ini Judul Skripsi</b></h6>
                                <small style="font-size: 75%">Penulis : <b>nama_penulis</b></small>
                                <hr>
                                <small style="font-size: 70%"><i>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Labore, aliquam quae! Asperiores, assumenda aut sed ullam labore corrupti tempora quae,
                                    laborum sunt quos voluptas nemo quas saepe quasi at iste.
                                </i></small>
                            </div>
                        </div>
                    </div>
                    {{-- hasil skripsi pencarian 2 end--}}
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
                    {{-- Filter 1 --}}
                <div class="card rounded-0">
                    <div class="card-header rounded-0 bg-hijau">
                        Kategori
                    </div>
                    <div class="card-body">
                            @foreach ($kategoris as $kategori)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="kategori" value="{{$kategori->id_kategori}}" id="{{$kategori->id_kategori}}">
                                <label class="form-check-label" for="kategori">{{$kategori->nama_kategori}}</label>
                            </div>
                            @endforeach
                    </div>
                </div>
                <br>
                {{-- Filter 1 --}}
    
                {{-- Filter 2 --}}
                <div class="card rounded-0">
                    <div class="card-header rounded-0 bg-hijau">
                        Prodi
                    </div>
                    <div class="card-body">
                            @foreach ($prodis as $prodi)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="prodi" value="{{$prodi->id_prodi}}" id="{{$prodi->id_prodi}}">
                                <label class="form-check-label" for="prodi">{{$prodi->jenjang}} - {{$prodi->nama_prodi}}</label>
                            </div>
                            @endforeach
                    </div>
                </div>
                {{-- Filter 2 --}}
                    {{-- Filter 2 --}}

                </div>
            </div>
        <br>
    </form>
    </div>
@endsection