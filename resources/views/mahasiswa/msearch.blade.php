@extends('mahasiswa.mlayout')

@section('content')
<div class="container-fluid">
    <br>
    <h3 class="text-center" style="color: #006633"><b>Koleksi Repository</b></h3>
    <hr>
</div>
<br>

<div class="container-fluid">
    {{-- <form action="/hasil_search" method="get">
        @csrf --}}
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
    
                            <input class="form-control me-2" type="text" placeholder="Cari Tugas Akhir"
                                aria-label="Search" id="search" name="search" onfocus="this.value=''">
                            {{-- <button class="btn btn-primary" type="submit">Cari</button> --}}
                        </div>
                    </div>
                </div>
                {{-- search button end --}}
    
                {{-- teks --}}
                <div class="alert alert-repository-no" role="alert">
                    <small><i class="fa-solid fa-circle-info"></i> menampilkan <b>xx</b> tugas akhir untuk pencarian <b>{{$searchTerm}}</b></small>
                </div>
                {{-- teks --}}
                <br>
               <div id="hasil_search">
                 @livewire('tugas-akhirs')
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
                                <input class="form-check-input" type="radio" name="kategori" value="{{$kategori->id_kategori}}" id="{{$kategori->id_kategori}}">
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
                                <input class="form-check-input" type="radio" name="prodi" value="{{$prodi->id_prodi}}" id="{{$prodi->id_prodi}}">
                                <label class="form-check-label" for="prodi">{{$prodi->jenjang}} - {{$prodi->nama_prodi}}</label>
                            </div>
                            @endforeach
                    </div>
                </div>
                {{-- Filter 2 --}}
    
            </div>
        </div>
    {{-- </form> --}}
    <br>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search').on('keyup', function(){
            var query = $(this).val();

            $.ajax({
                url:"search",
                type: "GET",
                results: {'search' : query},
                
                success:function(results){
                    $('#hasil_search')
                }
            })
        });
    });
</script>
@endsection