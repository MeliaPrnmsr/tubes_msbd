<div class="container-fluid">
    {{-- <form action="/hasil_search" method="get">
        @csrf --}}

        <form wire:submit.prevent="render">
            <div class="row m-2">

                <div class="col-9">
                    {{-- search button start --}}
                    <div class="d-flex mb-2">
                        <div class="me-2 w-25">
                            <select class="form-select" aria-label="tipe">
                                <option selected>All</option>
                                @foreach ($tipe_ta_lists as $tipe_ta_list)
                                <option value="{{$tipe_ta_list->tipe_ta}}">{{$tipe_ta_list->tipe_ta}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-75">
                            <div class="d-flex justify-content-center w-100">
                                <input class="form-control me-2" type="text" placeholder="Cari Tugas Akhir" aria-label="search" wire:model="search" wire:keyup="hasil_search" value="{{ $search }}">
                            </div>
                        </div>
                    </div>
                    {{-- search button end --}}

                    {{-- teks --}}
                    <div class="alert alert-repository-no" role="alert">
                        <small><i class="fa-solid fa-circle-info"></i> menampilkan <b>xx</b> tugas akhir untuk
                            pencarian</small>
                    </div>
                    {{-- teks --}}
                    <br>
                    <div id="hasil_search">
                        @foreach($results as $result)
                        <div class="card mb-3  ">
                            <div class="row p-2">
                                <div class="col-2">
                                    <img src="{{asset('asset/img/'.$result->sampul)}}" alt="" class="w-75">
                                </div>
                                <div class="col-10 justify-content-start">
                                    <h6><a href="{{ route('detail.mahasiswa', ['id_tugasakhir' => $result->id_tugasakhir]) }}" class="text-decoration-none text-black"><b>{{$result->judul}}</b></a></h6>
                                    <small style="font-size: 75%">Penulis : <b>{{$result->nama_mahasiswa}}</b></small>
                                    <hr>
                                    <small style="font-size: 70%"><i>{{$result->abstrak}}</i></small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <br>
                    {{-- pagination start --}}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous" style="color: #3dae2b">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #3dae2b">1</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #3dae2b">2</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #3dae2b">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next" style="color: #3dae2b">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    {{-- pagination end --}}

                </div>
                <!--End of col 1-->

                <div class="col-3">
                    <h6><i class="fa-solid fa-filter"></i> &nbsp;<b>Filter Pencarian</b></h6>
                    {{-- Filter 1 --}}
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-hijau">
                            Kategori
                        </div>
                        <div class="card-body">
                            @foreach ($kategoris as $kategori)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="kategori"
                                    wire:click="hasil_kategori('kategori_search','{{$kategori->id_kategori}}' )"
                                    value="{{$kategori->id_kategori}}" id="{{$kategori->id_kategori}}">
                                {{-- {{$kategori}} --}}
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
                                <input class="form-check-input" type="radio" wire:model="prodi"
                                    value="{{$prodi->id_prodi}}" id="{{$prodi->id_prodi}}">
                                <label class="form-check-label" for="prodi">{{$prodi->jenjang}} -
                                    {{$prodi->nama_prodi}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Filter 2 --}}

                </div>
            </div>
        </form>
        <br>
</div>