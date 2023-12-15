<div class="container">
    {{-- <form action="/hasil_search" method="get">
        @csrf --}}

        <form wire:submit.prevent="hasil_search">
            <div>
                {{-- search button start --}}
                <div class="d-flex justify-content-center w-100">
                    <input class="form-control me-2 rounded-pill" type="text" placeholder="Cari Tugas Akhir"
                        aria-label="search" wire:model="search" wire:keyup="hasil_search">
                </div>
                {{-- search button end --}}

                <div class="row row-cols-3 mt-3 mb-3">
                    <div class="col-3">
                        <select class="form-select" wire:model="byTipe_ta" wire:change="hasil_search">
                            <option value="">Tipe Tugas Akhir</option>
                            @foreach ($tipe_ta_lists as $tipe_ta_list)
                            <option value="{{$tipe_ta_list->tipe_ta}}">{{$tipe_ta_list->tipe_ta}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-select" wire:model="byKategori" wire:change="hasil_search">
                            <option value="">Kategori</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-select" wire:model="byProdi" wire:change="hasil_search">
                            <option value="">Prodi</option>
                            @foreach ($prodis as $prodi)
                            <option value="{{$prodi->id_prodi}}">{{$prodi->jenjang}} {{$prodi->nama_prodi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-select" wire:model="sortBy" wire:change="hasil_search">
                            <option value="asc">Ascending</option>
                            <option value="dsc">Descending</option>
                        </select>
                    </div>
                </div>

        </form>

        {{-- teks --}}
        <div class="alert alert-repository-no" role="alert">
            @if($search === null)
                <small><i class="fa-solid fa-circle-info"></i> Cari Tugas Akhir Anda</small>
            @elseif($results->isEmpty())
                <small><i class="fa-solid fa-circle-info"></i> Tidak ada data yang ditemukan untuk pencarian <b>{{ $search }}</b></small>
            @else
                <small><i class="fa-solid fa-circle-info"></i> Menampilkan <b>{{ $results->count() }}</b> tugas akhir untuk pencarian <b>{{ $search }}</b></small>
            @endif
        </div>
        {{-- teks --}}
        <br>
        <div id="hasil_search">
           @if ($results->isEmpty())
               <p>Hasil tidak tersedia</p>
           @else
           @foreach($results as $result)
           <div class="card mb-3  ">
               <div class="row p-2">
                   <div class="col-2">
                       <img src="{{asset('asset/img/'.$result->sampul)}}" alt="" class="w-75">
                   </div>
                   <div class="col-10 justify-content-start">
                       <h6><a href="{{ route('detailTugasakhir', ['id_tugasakhir' => $result->id_tugasakhir]) }}"
                               class="text-decoration-none text-black"><b>{{$result->judul}}</b></a>
                       </h6>
                       <small style="font-size: 75%">Penulis :
                           <b>{{$result->nama_mahasiswa}}</b></small>
                       <hr>
                       <small style="font-size: 70%"><i>{{$result->abstrak}}</i></small>
                   </div>
               </div>
           </div>
           @endforeach
           @endif
        </div>

        <br>
        {{-- pagination start --}}
        <div class="d-flex justify-content-end">
            {{ $results->links() }}
        </div>
        {{-- pagination end --}}

</div>
<br>
</div>