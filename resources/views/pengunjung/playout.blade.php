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
        @livewireStyles
    </head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand sticky-top shadow bg-repository-hijau">
        <div class="container-fluid justify-content-center">
            <div class="row px-2 w-100 "> <!-- Menggunakan justify-content-center dan px-2 -->
                
                <div class="col p-2 d-flex justify-content-start"> <!-- Update disini -->
                    <a class="navbar-brand text-white" href="/landingpage">
                        <img src="{{asset('asset/img/logo.png')}}" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
                        RepositorySkripsi
                      </a>
                </div>
        
                <div class="col p-2 d-flex justify-content-end"> <!-- Update disini -->
                    <div class="">
                        <a href="/login" class="btn btn-repository" type="button" style="width: 100px">&nbsp;Login&nbsp;</a>
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
    <div class="navbar navbar-inverse navbar-fixed-bottom" style="background-color:  #000000">
        <div class="container d-flex justify-content-center p-2">
            <p class="text-white text-center">Copyright kelompok 5 MSBD</p>
        </div>
    </div>

        <script src="{{asset('asset/js/bootstrap.bundle.min.js')}}"></script>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        @livewireScripts
</body>
</html>