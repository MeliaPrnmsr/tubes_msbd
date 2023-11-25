@extends('staff.stafflayout')

@section('content')
<br>
<h2 class="text-center pt-2" style="color:#006633"><b>Welcome, Staff Jurusan</b></h2>
<br>

{{-- Jumlah tugas akhir start --}}
<div class="card p-2">
    <div class="card-header" style="background-color: #ffc600">
        <h4 class="mt-2"><b>Jumlah Tugas Akhir</b></h4>
    </div>
    <br>
    <div class="card-body">
        {{-- Jumlah --}}
{{-- jumlah user starts --}}
    <div class="row">
        <div class="col ">
            <div class="card">
                <div class="card-body">
                    <h4 class=" text-center"><b>500.000 jiwa</b></h4>
                    <p class=" text-center">Mahasiswa</p>
                </div>
                <div class="card-footer">
                    <small>Update at: <b>added_date</b> </small>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white" style="background-color: #3dae2b">
                <div class="card-body">
                    <h4 class=" text-center"><b>120</b></h4>
                    <p class=" text-center">Tugas Akhir</p>
                </div>
                <div class="card-footer">
                    <small>Update at: <b>added_date</b> </small>
                </div>
            </div>
        </div>

        <div class="col ">
            <div class="card">
                <div class="card-body">
                    <h4 class=" text-center"><b>500.000 jiwa</b></h4>
                    <p class=" text-center">Staff</p>
                </div>
                <div class="card-footer">
                    <small>Update at: <b>added_date</b> </small>
                </div>
            </div>
        </div>

    </div> <!--row end-->
{{-- jumlah user end --}}
        <br>
        <div class="d-flex justify-content-center p-2">
            <a href="/datatugasakhirstaff" class="btn" style="background-color: #ffa400; width: 30%;">Selengkapnya</a>
        </div>
    </div>
</div>
{{-- Jumlah tugas akhir end --}}

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
                        <tbody>
                          <tr>
                            <td><a href="#">judul_skripsi</a></td>
                            <td>06/07/2004</td>
                          </tr>
                          <tr>
                            <td><a href="#">judul_skripsi</a></td>
                            <td>06/07/2004</td>
                          </tr>
                          <tr>
                            <td><a href="#">judul_skripsi</a></td>
                            <td>06/07/2004</td>
                          </tr>
                        </tbody>
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
                          <tr>
                            <td><a href="#">judul_skripsi</a></td>
                            <td>200</td>
                          </tr>
                          <tr>
                            <td><a href="#">judul_skripsi</a></td>
                            <td>200</td>
                          </tr>
                          <tr>
                            <td><a href="#">judul_skripsi</a></td>
                            <td>200</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        {{-- popular part end --}}
    </div>
<br><br>
@endsection