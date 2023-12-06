@extends('mahasiswa.mlayout')

@section('content')
    <div class="container-fluid bg-orange">
        {{-- menu start --}}
        <br>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn rounded square-btn bg-repository">
                <i class="fas fa-hourglass-half icon"></i>
                <small>Lastest</small>
            </a>
            <a href="{{ route ('browseall.mahasiswa') }}" class="btn rounded square-btn bg-repository">
                <i class="fas fa-list icon"></i>
                <small>Browse All</small>
            </a>
            {{-- <a href="#" class="btn rounded square-btn bg-repository">
                <i class="fa-solid fa-fire icon"></i>
                <small>Popular</small>
            </a> --}}
            <a href="#" class="btn rounded square-btn bg-repository">
                <i class="fas fa-info-circle icon"></i>
                <small>About Us</small>
            </a>
        </div>
        {{-- menu end --}}
        <br>
    </div>

    <div class="container-fluid" style="display: flex; flex-direction: column; background-color: #006633">
        <br>
        <div class="container-fluid">
            <div class="container">
                <div id="baris1" style="flex: 1;">
                    <div id="baris1" style="flex: 1; display: flex; align-items: center;">
                        <div class="card p-2">
                            <div class="card-body">
                                <h2 style="color: #006633"><b>Repository Skripsi</b></h2>
                                <div class="row">
                                    <div class="col-9">
                                        <p>Skripsi adalah makanan yang digandrungi oleh sejuta umat. Dan repository skripsi adalah pameran skripsi agar pengunjung bisa melihat-lihat mana tau tertarik</p>
                                        <form action="{{ route('search.mahasiswa') }}" method="GET" class="d-flex">
                                            @csrf

                                            <input class="form-control me-2 rounded-pill" type="text" placeholder="Cari Tugas Akhir" aria-label="Search" id="search" name="search">
                                            <button type="submit" class="btn btn-repository rounded-pill">Cari</button>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <small><a href="#">Lebih lanjut--</a></small>
                                <br>
                            </div>
                           </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid" id="baris2" style="flex: 1;" style="background-color: white">
            <img src="{{asset('asset/img/imgdashboard.png')}}" alt="Potrait" style="position: absolute; top: 40%; transform: translateY(-48%); right: 0;">
        </div>
    </div>
    <br>

    {{-- baris 2 starts --}}
    <div class="container">
        <div class="card border-0 w-75">
         <div class="card-body">
             <p>
                <b>| Melalui mahasiswa-mahasiswa yang sudah menyelesaikan tugas akhir,
                saat in sudah terdapat sebanyak <i>{{$totalTugasAkhir}}</i> tugas akhir di dalam repository skripsi ini
                </b>
            </p>
         </div>
        </div>
    </div>  
    {{-- baris 2 starts --}}


    {{-- baris 3 start --}}
    <div class="container-fluid" style="background-color: #cecece">
        <br>
        <h3 class="text-center">Daftar Tugas Akhir</h3>
        <br>
        <div class="container justify-content-center align-items-center">
            <div class="row row-cols-3">
                {{-- Jumlah Tugas Akhir berdasarkan Tipe --}}
                @foreach($results as $result)
                    @if($result->tipe_ta === 'skripsi')
                        <div class="col text-center">
                            <div class="card">
                                <br>
                                <div class="card-body">
                                    <img src="{{ asset('asset/img/paper 1.png') }}" alt="">
                                    <h4><b>{{ $result->jumlah }}</b></h4>
                                    <p>Skripsi</p>
                                </div>
                            </div>
                        </div>
                    @endif
                
            
            
    
                {{-- tesis --}}
                @if($result->tipe_ta === 'tesis')
                <div class="col text-center ">
                    <div class="card">
                        <br>
                        <div class="card-body">
                            <img src="{{asset('asset/img/paper2.png')}}" alt="">
                            <h4><b>{{ $result->jumlah }}</b></h4>
                            <p>Tesis</p>
                        </div>
                    </div>
                </div>
                @endif
    
                {{-- disertasi --}}
                @if($result->tipe_ta === 'disertasi')
                <div class="col text-center ">
                    <div class="card">
                        <br>
                        <div class="card-body">
                            <img src="{{asset('asset/img/paper3.png')}}" alt="">
                            <h4><b>{{ $result->jumlah }}</b></h4>
                            <p>Disertasi</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <br><br>
    </div>
    {{-- baris 3 end --}}
    <br>
    
    {{-- baris 4 start --}}
    <div class="container justify-content-center m-3 mx-auto">
        <h3><i class="fa-solid fa-chart-line"></i>&nbsp;Terpopuler</h3>
        <br>
        <div class="row row-cols-3">
            @foreach ($popular_skripsi as $skripsi)
            <div class="col">
                <ul class="list-unstyled text-muted">
                    <li><small>{{ $skripsi->nama_mahasiswa }}</small></li>
                    <li><a href="#" class="text-black"><b>{{ $skripsi->judul }}</b></a></li>
                    <li><small>{{ $skripsi->tahun_terbit }}</small></li>
                </ul>   
            </div>
            @endforeach
        </div>
        <br>
    </div>
    
    {{-- baris 4 end --}}
@endsection