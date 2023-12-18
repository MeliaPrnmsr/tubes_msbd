@extends('pengunjung.playout')

@section('content')
<div class="card border-0">
    <div class="card-body">
        <br>
        <div class="row p-2">
            {{-- isi skripsi start --}}
            <div class="col-9">

                <div class="row p-2">
                    {{-- kolom judul start --}}
                    <div class="col-1">
                        <button class="btn btn-hijau rounded-circle" onclick="goBack()"><i
                                class="fa-solid fa-arrow-left"></i></button>
                    </div>

                    <div class="col-8">
                        <h3 style="color: #006633;"><b>{{$tugasakhir->judul}}</b></h3>
                    </div>
                    {{-- kolom judul end --}}

                    {{-- kolom button start --}}

                    <div class="col-3 d-flex justify-content-end">
                    </div>                

                    {{-- kolom sampul start --}}
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <img src="{{asset('asset/img/'.$tugasakhir->sampul)}}" alt="" class="w-75 h-75">
                    </div>
                    {{-- kolom sampul start --}}

                    {{-- kolom tabel start --}}
                    <div class="col d-flex align-items-center">
                        <table class="table table-border">
                            <tr>
                                <td style="width: 20%"><b>Penulis</b></td>
                                <td style="width: 5%">:</td>
                                <td>{{$tugasakhir->nama_mahasiswa}}</td>
                            </tr>
                            <tr>
                                <td><b>Pembimbing 1</b></td>
                                <td>:</td>
                                <td><a href="#" class="btn btn-hijau text-start">{{ $tugasakhir->nama_dosen_dospem1
                                        }}</a></td>
                            </tr>

                            <tr>
                                <td><b>Pembimbing 2</b></td>
                                <td>:</td>
                                <td><a href="#" class="btn btn-warning text-start">{{ $tugasakhir->nama_dosen_dospem2
                                        }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Tipe TA</b></td>
                                <td>:</td>
                                <td><a href="#" class="btn btn-primary text-start">{{ $tugasakhir->tipe_ta }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Kategori</b></td>
                                <td>:</td>
                                <td><a href="#" class="btn btn-info text-start">{{ $tugasakhir->nama_kategori }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tahun Terbit</b></td>
                                <td>:</td>
                                <td>{{$tugasakhir->tahun_terbit}}</td>
                            </tr>
                            <tr>
                                <td><b>Penerbit</b></td>
                                <td>:</td>
                                <td>Universitas Sumatera Utara</td>
                            </tr>
                        </table>
                    </div>
                    {{-- kolom tabel start --}}
                </div>
                <br>

                {{-- tab skripsi start --}}
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link nav-link-hijau mx-1 active" id="nav-abstrak-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-abstrak" type="button" role="tab" aria-controls="nav-abstrak"
                            aria-selected="true">Abstrak</button>
                        <button class="nav-link nav-link-hijau mx-1" id="nav-login-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login"
                            aria-selected="false">Lihat Detail</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    {{-- isi tab 1 start --}}
                    <div class="tab-pane fade show active bg-white" id="nav-abstrak" role="tabpanel"
                        aria-labelledby="nav-abstrak-tab" tabindex="0">
                        <div class="container">
                            <br>
                            <p style="text-align:justify;">{{$tugasakhir->abstrak}}</p>
                        </div>
                    </div>
                    {{-- isi tab 1 start --}}

                    {{-- isi tab 2 start --}}
                    <div class="tab-pane fade bg-white" id="nav-login" role="tabpanel"
                        aria-labelledby="nav-login-tab" tabindex="0">
                        <div class="container">
                            <br>
                            <p style="text-align:justify;">Login untuk melihat detail</p>
                            <a href="/login" class="btn btn-repository">Login</a>
                        </div>
                    </div>
                    {{-- isi tab 2 start --}}
                </div>

            </div>
            {{-- tab skripsi end --}}

            {{-- saran serupa start --}}
            <div class="col-3">
                <small>serupa :</small>
                <br><br>
                @foreach ($serupa as $item)
                <div class="card p-2 mb-3">
                    <p><b><a href="{{ route('detailTugasakhir', ['id_tugasakhir' => $item->id_tugasakhir]) }}"
                                class="text-decoration-none text-black"><b>{{$item->judul}}</b></a></b></p>
                    <small>{{$item->nama_mahasiswa}} ({{$item->tahun_terbit}})</small>
                </div>
                @endforeach
            </div>
            {{-- saran serupa end--}}

        </div>
        {{-- isi skripsi start --}}



    </div>
</div>
<br><br>

@endsection