@extends('pengunjung.playout')

@section('content')
    <div class="container-fluid">
        <br>
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
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                {{-- isi tab 1 start --}}
                                <div class="tab-pane fade show active bg-white" id="nav-abstrak" role="tabpanel" aria-labelledby="nav-abstrak-tab" tabindex="0">
                                    @include('pengunjung.pabstrak', ['tugasakhir' => $tugasakhir])
                                </div>
                                {{-- isi tab 1 start --}}
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
