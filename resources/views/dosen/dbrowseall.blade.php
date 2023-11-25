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
                    <div class="me-2 w-25">
                        <select class="form-select" aria-label="tipe">
                            <option selected>All</option>
                            <option value="skripsi">Skripsi</option>
                            <option value="tesis">Tesis</option>
                            <option value="disertasi">Disertasi</option>
                          </select>
                    </div>
                    <div class="w-75">
                        <form class="d-flex justify-content-center w-100" role="search">
                            <input class="form-control me-2" type="search" placeholder="Cari Tugas Akhir" aria-label="Search">
                            <button class="btn btn-repository-hijau" type="submit">Cari</button>
                        </form>
                    </div>
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
                    <button class="nav-link mx-1" id="nav-prodi-tab" data-bs-toggle="tab" data-bs-target="#nav-prodi" type="button" role="tab" aria-controls="nav-prodi" aria-selected="false">Jurusan</button>
                    <button class="nav-link mx-1" id="nav-tipe-tab" data-bs-toggle="tab" data-bs-target="#nav-tipe" type="button" role="tab" aria-controls="nav-tipe" aria-selected="false">Tipe Tugas Akhir</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                {{-- isi tab 1 start --}}
                <div class="tab-pane fade show active bg-white" id="nav-tanggal" role="tabpanel" aria-labelledby="nav-tanggal-tab" tabindex="0">
                    @include('dosen.dlisttgl')
                </div>
                {{-- isi tab 1 start --}}

                {{-- isi tab 2 start --}}
                <div class="tab-pane fade bg-white" id="nav-tipe" role="tabpanel" aria-labelledby="nav-tipe-tab" tabindex="0">
                    @include('dosen.dlisttgl')
                </div>
                {{-- isi tab 2 end --}}

                {{-- isi tab 3 start --}}
                <div class="tab-pane fade bg-white" id="nav-prodi" role="tabpanel" aria-labelledby="nav-prodi-tab" tabindex="0">
                    @include('dosen.dlisttgl')
                </div>
                {{-- isi tab 3 end --}} 
            </div>
        </div>
    </div>
@endsection