@extends('staff.stafflayout')
@php
$active = 'dashboard';
@endphp
@section('content')
<br>
<h2 class="text-center pt-2" style="color:#006633">Welcome, Staff <b>Jurusan</b></h2>
<br>

{{-- Jumlah tugas akhir start --}}
<div class="card p-2">
    <div class="card-header" style="background-color: #ffc600">
        <h4 class="mt-2">Data &nbsp; <b>{{$prodi_data->jenjang}} - {{$prodi_data->nama_prodi}}</b></h4>
    </div>
    <br>
    <div class="card-body">
        {{-- Jumlah --}}
        {{-- jumlah user starts --}}
        <div class="row">
            <div class="col ">
                <div class="card">
                    <div class="card-body  bg-orange">
                        <h2 class=" text-center"><b>{{$jumlahMahasiswa}}</b></h2>
                        <p class=" text-center">Mahasiswa</p>
                    </div>
                    <div class="card-footer text-center bg-repository">
                        <a href="{{route('datamahasiswa.staff')}}" class="btn btn-light" style="width: 50%">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-hijau">
                    <div class="card-body">
                        <h2 class=" text-center"><b>{{$jumlahTugasakhir}}</b></h2>
                        <p class=" text-center">Tugas Akhir</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('datatugas.staff')}}" class="btn btn-light" style="width: 50%">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col ">
                <div class="card">
                    <div class="card-body bg-orange">
                        <h2 class=" text-center"><b>{{$jumlahDosen}}</b></h2>
                        <p class=" text-center">Dosen</p>
                    </div>
                    <div class="card-footer text-center bg-repository">
                        <a href="{{route('datadosen.staff')}}" class="btn btn-light" style="width: 50%">Detail</a>
                    </div>
                </div>
            </div>

        </div>
        <!--row end-->
        {{-- jumlah user end --}}
        <br>
    </div>
</div>
{{-- Jumlah tugas akhir end --}}

<br><br>


<div class="row row-cols-2">
    {{-- recently part start --}}
    <div class="col">
        <div class="card">
            <div class="card-header"><b>Baru Ditambahkan</b></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="w-75">Judul</th>
                        <th scope="col" class="w-25">Date</th>
                      </tr>
                    </thead>
                    @foreach($baruDitambah as $tampilJudul)
                    <tbody>
                      <tr>
                        <td><a href="{{ route('detailTugasakhir.staff', ['id_tugasakhir' => $tampilJudul->id_tugasakhir]) }}" class="text-decoration-none text-black">{{ Illuminate\Support\Str::limit($tampilJudul->judul, $limit = 50, $end = '...') }}</a></td>
                        <td id="tanggal">{{ $tampilJudul -> date_added }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
            </div>
        </div>
    </div>
    {{-- recently part end --}}

    {{-- popular part start --}}
    <div class="col">
        <div class="card">
            <div class="card-header"><b>Populer</b></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="w-75">Judul</th>
                        <th scope="col" class="w-25 text-center">Suka</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($topLikeTugasAkhir as $like)
                        <tr>
                          <td><a href="{{ route('detailTugasakhir.staff', ['id_tugasakhir' => $like->id_tugasakhir]) }}" class="text-decoration-none text-black">{{ Illuminate\Support\Str::limit($like->judul, $limit = 50, $end = '...') }}</a></td>
                          <td class="text-center">{{ $like -> total_likes }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    {{-- popular part end --}}
</div>
<br><br>
@endsection