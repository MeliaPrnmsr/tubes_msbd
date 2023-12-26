@extends('dosen.dlayout')

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
                        <form action="/dslike" method="post">
                            @csrf
                            <input type="hidden" name="id_tugasakhir" value="{{$tugasakhir->id_tugasakhir}}">
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                            <button class="btn" type="submit">
                                @if($isLikedByUser)
                                <i class="fa-solid fa-heart"></i>
                                @else
                                <i class="fa-regular fa-heart"></i>
                                @endif
                            </button>
                        </form>

                        <form action="/dsbookmark" method="post">
                            @csrf
                            <input type="hidden" name="id_tugasakhir" value="{{$tugasakhir->id_tugasakhir}}">
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id_user  }}">
                            <button class="btn" type="submit">
                                @if($isBookmarkByUser)
                                <i class="fa-solid fa-bookmark"></i>
                                @else
                                <i class="fa-regular fa-bookmark"></i>
                                @endif
                            </button>
                        </form>
                    </div>
                    {{-- kolom button start --}}

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
                            @if ($tugasakhir->tipe_ta =='disertasi')
                            <tr>
                                <td><b>Promotor 1</b></td>
                                <td>:</td>
                                <td><a href="#" class="btn btn-hijau text-start">{{ $tugasakhir->nama_promotor1}}</a>
                                </td>
                            </tr>

                            <tr>
                                <td><b>Promotor 2</b></td>
                                <td>:</td>
                                <td><a href="#" class="btn btn-warning text-start">{{ $tugasakhir->nama_promotor2}}</a>
                                </td>
                            </tr>

                            <tr>
                                <td><b>Promotor 3</b></td>
                                <td>:</td>
                                <td><a href="#" class="btn btn-danger text-start">{{ $tugasakhir->nama_promotor3}}</a>
                                </td>
                            </tr>
                            @else
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
                            @endif
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
                        <button class="nav-link nav-link-hijau mx-1" id="nav-bab1-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-bab1" type="button" role="tab" aria-controls="nav-bab1"
                            aria-selected="false">Bab 1</button>
                        <button class="nav-link nav-link-hijau mx-1" id="nav-bab2-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-bab2" type="button" role="tab" aria-controls="nav-bab2"
                            aria-selected="false">Bab 2</button>
                        <button class="nav-link nav-link-hijau mx-1" id="nav-bab3-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-bab3" type="button" role="tab" aria-controls="nav-bab3"
                            aria-selected="false">Bab 3</button>
                        <button class="nav-link nav-link-hijau mx-1" id="nav-bab4-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-bab4" type="button" role="tab" aria-controls="nav-bab4"
                            aria-selected="false">Bab 4</button>
                        <button class="nav-link nav-link-hijau mx-1" id="nav-bab5-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-bab5" type="button" role="tab" aria-controls="nav-bab5"
                            aria-selected="false">Bab 5</button>
                        <button class="nav-link nav-link-hijau mx-1" id="nav-pustaka-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-pustaka" type="button" role="tab" aria-controls="nav-pustaka"
                            aria-selected="false">Daftar Pustaka</button>
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
                    <div class="tab-pane fade bg-white" id="nav-pustaka" role="tabpanel"
                        aria-labelledby="nav-pustaka-tab" tabindex="0">
                        <div class="container">
                            <br>
                            <embed src="{{ asset('asset/file/'.$tugasakhir->file_daftarpustaka) }}"
                                type="application/pdf" width="80%" height="700px" />
                        </div>
                    </div>
                    {{-- isi tab 2 end --}}


                    {{-- isi tab 4 start --}}
                    <div class="tab-pane fade bg-white" id="nav-bab1" role="tabpanel" aria-labelledby="nav-bab1-tab"
                        tabindex="0">
                        <div class="container">
                            <br>
                            <embed src="{{ asset('asset/file/'.$tugasakhir->bab1) }}" type="application/pdf" width="80%"
                                height="700px" />
                        </div>
                    </div>
                    {{-- isi tab 4 end --}}

                    {{-- isi tab 4 start --}}
                    <div class="tab-pane fade bg-white" id="nav-bab2" role="tabpanel" aria-labelledby="nav-bab2-tab"
                        tabindex="0">
                        <div class="container">
                            <br>
                            <embed src="{{ asset('asset/file/'.$tugasakhir->bab2) }}" type="application/pdf" width="80%"
                                height="700px" />
                        </div>
                    </div>
                    {{-- isi tab 4 end --}}

                    {{-- isi tab 4 start --}}
                    <div class="tab-pane fade bg-white" id="nav-bab3" role="tabpanel" aria-labelledby="nav-bab3-tab"
                        tabindex="0">
                        <div class="container">
                            <br>
                            <embed src="{{ asset('asset/file/'.$tugasakhir->bab3) }}" type="application/pdf" width="80%"
                                height="700px" />
                        </div>
                    </div>
                    {{-- isi tab 4 end --}}

                    {{-- isi tab 4 start --}}
                    <div class="tab-pane fade bg-white" id="nav-bab4" role="tabpanel" aria-labelledby="nav-bab4-tab"
                        tabindex="0">
                        <div class="container">
                            <br>
                            <embed src="{{ asset('asset/file/'.$tugasakhir->bab4) }}" type="application/pdf" width="80%"
                                height="700px" />
                        </div>
                    </div>
                    {{-- isi tab 4 end --}}

                    {{-- isi tab 4 start --}}
                    <div class="tab-pane fade bg-white" id="nav-bab5" role="tabpanel" aria-labelledby="nav-bab5-tab"
                        tabindex="0">
                        <div class="container">
                            <br>
                            <embed src="{{ asset('asset/file/'.$tugasakhir->bab5) }}" type="application/pdf" width="80%"
                                height="700px" />
                        </div>
                    </div>
                    {{-- isi tab 4 end --}}
                </div>

            </div>
            {{-- tab skripsi end --}}

            {{-- saran serupa start --}}
            <div class="col-3">
                <small>serupa :</small>
                <br><br>
                @foreach ($serupa as $item)
                <div class="card p-2 mb-3">
                    <p><b><a href="{{ route('detail.dosen', ['id_tugasakhir' => $item->id_tugasakhir]) }}"
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