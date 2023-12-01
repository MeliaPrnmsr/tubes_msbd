@extends('admin.adminlayout')

@section('content')
<br>
<h2 class="text-center pt-2" style="color:#006633"><b>Welcome, Admin</b></h2>
<br>

{{-- Jumlah tugas akhir start --}}
<div class="card p-2">
    <div class="card-header" style="background-color: #ffc600">
        <h4 class="mt-2"><b>Jumlah Tugas Akhir</b></h4>
    </div>
    <br>
    <div class="card-body">
        <div class="row">
            {{-- Skripsi start --}}
            <div class="col card p-3 mx-2 text-center">
                <small>Jumlah Skripsi</small><br>
                <h3><b>{{ $jumlahSkripsi }}</b></h3><br>
                <small class="card-footer">update at: <b> {{  $tugasAkhirSkripsiTerbaru -> date_added }}</b></small>
            </div>
            {{-- Skripsi end --}}

            {{-- Tesis start --}}
            <div class="col card p-3 mx-2 text-center">
                <small>Jumlah Tesis</small><br>
                <h3><b>{{ $jumlahTesis }}</b></h3><br>
                <small class="card-footer">update at: <b>{{ $tugasAkhirTesisTerbaru -> date_added }}</b></small>
            </div>
            {{-- Tesis end --}}

            {{-- Disertasi start --}}
            <div class="col card p-3 mx-2 text-center">
                <small>Jumlah Disertasi</small><br>
                <h3><b>{{ $jumlahDisertasi }}</b></h3><br>
                <small class="card-footer">update at: <b>{{ $tugasAkhirDisertasiTerbaru -> date_added }}</b></small>
            </div>
            {{-- Disertasi end --}}
        </div>
        <br>
        <div class="d-flex justify-content-center p-2">
            <a href="/datatugasakhirstaff" class="btn" style="background-color: #ffa400; width: 30%;">Selengkapnya</a>
        </div>
    </div>
</div>
{{-- Jumlah tugas akhir end --}}

<br><br>
{{-- Jumlah --}}
{{-- jumlah user starts --}}
    <div class="row">
        <div class="col ">
            <div class="card">
                <div class="card-body">
                    <h4 class=" text-center"><b>{{ $jumlahMahasiswa }} jiwa</b></h4>
                    <p class=" text-center">Mahasiswa</p>
                </div>
                <div class="card-footer">
                    <small>Update at: <b>{{ $MahasiswaTerbaru -> created_at }}</b> </small>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white" style="background-color: #3dae2b">
                <div class="card-body">
                    <h4 class=" text-center"><b>{{ $jumlahDosen }} jiwa</b></h4>
                    <p class=" text-center">Dosen</p>
                </div>
                <div class="card-footer">
                    <small>Update at: <b>{{ $DosenTerbaru -> created_at }}</b> </small>
                </div>
            </div>
        </div>

        <div class="col ">
            <div class="card">
                <div class="card-body">
                    <h4 class=" text-center"><b>{{ $jumlahStaff }} jiwa</b></h4>
                    <p class=" text-center">Staff</p>
                </div>
                <div class="card-footer">
                    <small>Update at: <b>{{ $StaffTerbaru -> created_at }}</b> </small>
                </div>
            </div>
        </div>

    </div> <!--row end-->
{{-- jumlah user end --}}

<br><br>

{{-- recently & popular --}}
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
                            <td><a href="#">{{ $tampilJudul -> judul  }}</a></td>
                            <td>{{ $tampilJudul -> date_added }}</td>
                          </tr>

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
                            <th scope="col" class="w-25">Suka</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($topLikeTugasAkhir as $like)
                          <tr>
                            <td><a href="#">{{ $like -> judul }}</a></td>
                            <td>{{ $like -> total_likes }}</td>
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