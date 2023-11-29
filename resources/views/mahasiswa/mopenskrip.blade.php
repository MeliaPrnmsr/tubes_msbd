@extends('mahasiswa.mlayout')

@section('content')
<div class="card border-0">
    <div class="card-body">
        <div class="row">
            {{-- isi skripsi start --}}
            <div class="col-9">
                
                <div class="row p-2">
                    {{-- kolom judul start --}}
                    <div class="col-9">
                        <h3><b>{{$tugasakhir->judul}}</b></h3>
                    </div>
                    {{-- kolom judul end --}}

                    {{-- kolom button start --}}
                    <div class="col-3 d-flex justify-content-end">
                        <button class="btn"><i class="fa-regular fa-heart"></i></button>
                        <button class="btn"><i class="fa-regular fa-bookmark"></i></button>
                    </div>
                    {{-- kolom button start --}}

                    {{-- kolom sampul start --}}
                    <div class="col-3">
                        <img src="{{asset('asset/img/sampulskripsi.jpeg')}}" alt="" class="w-100">
                    </div>
                    {{-- kolom sampul start --}}

                    {{-- kolom tabel start --}}
                    <div class="col">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 20%"><b>Penulis</b></td>
                                <td style="width: 5%">:</td>
                                <td>{{$tugasakhir->mahasiswa->nama_mahasiswa}}</td>
                            </tr>
                            <tr>
                                <td><b>Tipe TA</b></td>
                                <td>:</td>
                                <td>{{$tugasakhir->tipe_ta}}</td>
                            </tr>
                            @foreach($dosen_pembimbing as $dosen)
                            <tr>
                                <td><b>Pembimbing</b></td>
                                <td>:</td>
                                <td>{{ $dosen->dosen->nama_dosen }}</td>
                            </tr>                       
                            @endforeach
                            <tr>
                                <td><b>Tahun Terbit</b></td>
                                <td>:</td>
                                <td>{{$tugasakhir->tahun_terbit}}</td>
                            </tr>
                            <tr>
                                <td><b>Kategori</b></td>
                                <td>:</td>
                                <td>{{$tugasakhir->kategori->nama_kategori}}</td>
                            </tr>
                        </table>
                    </div>
                    {{-- kolom tabel start --}}
                </div>
                <br><br>

                        {{-- tab skripsi start --}}
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link nav-link-hijau mx-1 active" id="nav-abstrak-tab" data-bs-toggle="tab" data-bs-target="#nav-abstrak" type="button" role="tab" aria-controls="nav-abstrak" aria-selected="true">Abstrak</button>
                                    <button class="nav-link nav-link-hijau mx-1" id="nav-isiskripsi-tab" data-bs-toggle="tab" data-bs-target="#nav-isiskripsi" type="button" role="tab" aria-controls="nav-isiskripsi" aria-selected="false">Skripsi</button>
                                    <button class="nav-link nav-link-hijau mx-1" id="nav-metodologi-tab" data-bs-toggle="tab" data-bs-target="#nav-metodologi" type="button" role="tab" aria-controls="nav-metodologi" aria-selected="false">Metodologi Penelitian</button>
                                    <button class="nav-link nav-link-hijau mx-1" id="nav-pustaka-tab" data-bs-toggle="tab" data-bs-target="#nav-pustaka" type="button" role="tab" aria-controls="nav-pustaka" aria-selected="false">Daftar Pustaka</button>
                                    <button class="nav-link nav-link-hijau mx-1" id="nav-detail-tab" data-bs-toggle="tab" data-bs-target="#nav-detail" type="button" role="tab" aria-controls="nav-detail" aria-selected="false">Detail</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                {{-- isi tab 1 start --}}
                                <div class="tab-pane fade show active bg-white" id="nav-abstrak" role="tabpanel" aria-labelledby="nav-abstrak-tab" tabindex="0">
                                    @include('mahasiswa.mabstrak')
                                </div>
                                {{-- isi tab 1 start --}}

                                {{-- isi tab 2 start --}}
                                <div class="tab-pane fade bg-white" id="nav-pustaka" role="tabpanel" aria-labelledby="nav-pustaka-tab" tabindex="0">
                                    <div class="container">
                                        <br>
                                        <embed src="{{$tugasakhir->dokumenfiles->file_pustaka}}" type="application/pdf" width="100%" height="600px" />
                                    </div>
                                </div>
                                {{-- isi tab 2 end --}}
    
                                {{-- isi tab 3 start --}}
                                <div class="tab-pane fade bg-white" id="nav-isiskripsi" role="tabpanel" aria-labelledby="nav-isiskripsi-tab" tabindex="0">
                                    @include('mahasiswa.misiskripmhs')
                                </div>
                                {{-- isi tab 3 end --}} 

                                {{-- isi tab 4 start --}}
                                <div class="tab-pane fade bg-white" id="nav-metodologi" role="tabpanel" aria-labelledby="nav-metodologi-tab" tabindex="0">
                                    metodologi ini
                                </div>
                                {{-- isi tab 4 end --}}

                                {{-- isi tab 4 start --}}
                                <div class="tab-pane fade bg-white" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab" tabindex="0">
                                    Detail ini
                                </div>
                                {{-- isi tab 4 end --}}
                            </div>
                            
                        </div>
                        {{-- tab skripsi end --}}

                        {{-- saran serupa start --}}
                    <div class="col-3">
                        <small>serupa :</small>
                        <br><br>
                        <div class="card p-2 mb-3">
                            <p><b>Judul Skripsi</b></p>
                            <small>nama_penulis(tahun_terbit)</small>
                        </div>
                        <div class="card p-2 mb-3">
                            <p><b>Judul Skripsi</b></p>
                            <small>nama_penulis(tahun_terbit)</small>
                        </div>
                    </div>
                    {{-- saran serupa end--}}
                        
                    </div>
                    {{-- isi skripsi start --}}

                    

                </div>
            </div>
        </div>
        <br><br>
    
@endsection
