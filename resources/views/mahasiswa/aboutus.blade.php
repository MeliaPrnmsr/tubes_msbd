@extends('mahasiswa.mlayout')

@section('content')
<div class="container-fluid bg-orange">
    {{-- menu start --}}
    <br>
    <h3 class="text-center mt-3 mb-3">Apa itu Repository TugasAkhir?</h3>
    <br>
</div>
<br>
<div class="container">
    <div class="row d-flex align-items-center">
        <div class="col-5  d-flex justify-content-center">
            <img src="{{asset('asset/img/imgdashboard.png')}}" alt="">
        </div>
        <div class="col-7">
            <p class="text-black" style="text-align: justify">
                Repository TugasAkhir merupakan repository yang dapat diakses untuk mencari tugas akhir dari mahasiswa-mahasiswa yang sudah
                menyelesaikan tugas akhirnya. Terdiri dari tiga tugas akhir yakni <i>skripsi, tesis, dan disertasi</i> yang diharapkan dapat 
                mempermudah mahasiswa yang sedang mengerjakan tugas akhir mendapatkan ide-ide yang baru.
            </p>
        </div>
    </div>
</div>
<br>
<div class="container-fluid text-center" style="background-color: #cecece">
    <br>
    <h4 class="text-center">Kontak</h4>
    <p><i class="fa-solid fa-phone"></i> 081234-5678</p>
    <p><i class="fa-solid fa-envelope"></i> hubungi@gmail.com</p>
    <br>
</div>
@endsection