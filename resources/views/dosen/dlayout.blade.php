<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/img/logo.png" sizes="16x16 32x32" rel="shortcut icon">
        <title>Repository Tugas Akhir</title>
        
        <link rel="shortcut icon" href="{{ asset('asset/img/logo.png')}}" sizes="16x16 32x32" >
        <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/css/tambahan.css')}}">
        <link rel="stylesheet" href="{{asset('asset/icon/css/all.min.css')}}">
    </head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand sticky-top shadow bg-repository-hijau">
        <div class="container-fluid justify-content-center">
            <div class="row px-2 w-100 "> <!-- Menggunakan justify-content-center dan px-2 -->
                
                <div class="col p-2 d-flex justify-content-start"> <!-- Update disini -->
                    <a class="navbar-brand text-white" href="/dlandingpage">
                        <img src="{{asset('asset/img/logo.png')}}" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
                        RepositorySkripsi
                      </a>
                </div>
        
                <div class="col p-2 d-flex justify-content-end"> <!-- Update disini -->
                    
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          halo, <b>{{ Auth::user()->username }}</b>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('landingpage.dosen') }}"><i class="fa-solid fa-chart-line"></i>&nbsp; Dashboard</a></li>
                          <li><a class="dropdown-item" href="{{ route('profile.dosen') }}"><i class="fa-solid fa-user"></i>&nbsp; Profil</a></li>
                          <li><a class="dropdown-item" href="{{ route('bookmark.dosen') }}"><i class="fa-solid fa-bookmark"></i>&nbsp; Bookmark</a></li>
                          <li><a class="dropdown-item" href="{{ route('bimbingan.dosen') }}"><i class="fa-solid fa-chalkboard-user"></i>&nbsp; Bimbingan Saya</a></li>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i>&nbsp; Logout
                            </button>
                        </form>
                        </ul>
                      </div>

                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- START KONTEN UTAMA--> 
    <div id="konten utama">
        @yield('content')
        <br>
    </div>       
    <!-- END KONTEN UTAMA-->        
        
    <!--Footer-->
    <div class="navbar navbar-inverse navbar-fixed-bottom" style="background-color: #1d1d1d">
        <div class="container d-flex justify-content-center p-2">
          <p class="text-white">helpdesk?<br>011-22-33</p>
        </div>
    </div>

        <script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>