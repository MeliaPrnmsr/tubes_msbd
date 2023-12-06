@extends('dosen.dlayout')

@section('content')
    <div class="container-fluid">
        <br>
        <h3 class="text-center" style="color: #006633"><b>Repository Skripsi</b></h3>
        <hr>
        {{-- advanced search start --}}
            <h5 class="text-center">Advanced Search</h5>
            <div class="d-flex justify-content-center">
                <div class="d-flex mb-2 w-50 bg-hijau p-3">
                    <form class="d-flex justify-content-center w-100" role="search" method="GET" action="{{ route('search.dosen') }}">
                    <div class="me-2 w-25">
                        <select name="jenis_koleksi" class="form-select" aria-label="tipe">
                            <option selected>All</option>
                            <option value="skripsi">Skripsi</option>
                            <option value="tesis">Tesis</option>
                            <option value="disertasi">Disertasi</option>
                          </select>
                    </div>
                    <div class="w-75">
                        <input class="form-control me-2" name="search" type="search" placeholder="Cari Tugas Akhir" aria-label="Search">
                    </div>
                    <div>
                        <button class="btn btn-repository-hijau" type="submit">Cari</button>
                    </div>
                </form>
                </div>
            </div>
            {{-- advanced search start --}}
    </div>
    <br>


    <div class="container rounded-0">
        <div class="">
            <nav class="d-flex justify-content-center">
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link mx-1 active" id="nav-tanggal-tab" data-bs-toggle="tab" data-bs-target="#nav-tanggal" type="button" role="tab" aria-controls="nav-tanggal" aria-selected="true">Tanggal</button>
                    <button class="nav-link mx-1" id="nav-kategori-tab" data-bs-toggle="tab" data-bs-target="#nav-kategori" type="button" role="tab" aria-controls="nav-kategori" aria-selected="false">Jurusan</button>
                    <button class="nav-link mx-1" id="nav-skripsi-tab" data-bs-toggle="tab" data-bs-target="#nav-skripsi" type="button" role="tab" aria-controls="nav-skripsi" aria-selected="false">Skripsi</button>
                    <button class="nav-link mx-1" id="nav-tesis-tab" data-bs-toggle="tab" data-bs-target="#nav-tesis" type="button" role="tab" aria-controls="nav-tesis" aria-selected="false">Tesis</button>
                    <button class="nav-link mx-1" id="nav-disertasi-tab" data-bs-toggle="tab" data-bs-target="#nav-disertasi" type="button" role="tab" aria-controls="nav-disertasi" aria-selected="false">Disertasi</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                {{-- isi tab 1 start --}}
                <div class="tab-pane fade show active bg-white" id="nav-tanggal" role="tabpanel" aria-labelledby="nav-tanggal-tab" tabindex="0">
                    @include('dosen.dlisttgl', ['tahun_terbit' => $tahun_terbit])
                </div>
                {{-- isi tab 1 start --}}

                {{-- isi tab 3 start --}}
                <div class="tab-pane fade bg-white" id="nav-kategori" role="tabpanel" aria-labelledby="nav-kategori-tab" tabindex="0">
                    @include('dosen.dlistkategori', ['kategori' => $kategori])
                </div>
                {{-- isi tab 3 end --}} 

                {{-- isi tab 2 start --}}
                <div class="tab-pane fade bg-white" id="nav-skripsi" role="tabpanel" aria-labelledby="nav-skripsi-tab" tabindex="0">
                    @include('dosen.dlistskripsi', ['skripsi' => $skripsi])
                </div>
                {{-- isi tab 2 end --}}

                {{-- isi tab 2 start --}}
                <div class="tab-pane fade bg-white" id="nav-tesis" role="tabpanel" aria-labelledby="nav-tesis-tab" tabindex="0">
                    @include('dosen.dlisttesis', ['tesis' => $tesis])
                </div>
                {{-- isi tab 2 end --}}

                {{-- isi tab 2 start --}}
                <div class="tab-pane fade bg-white" id="nav-disertasi" role="tabpanel" aria-labelledby="nav-disertasi-tab" tabindex="0">
                    @include('dosen.dlistdisertasi', ['disertasi' => $disertasi])
                </div>
                {{-- isi tab 2 end --}}
            </div>
        </div>
    </div>
@endsection