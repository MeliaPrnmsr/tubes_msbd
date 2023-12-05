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

     <style>
        body {
          overflow-x: hidden;
        }

        .sidebar {
          position: fixed;
          top: 0;
          left: 0;
          height: 100vh;
          width: 240px;
          z-index: 1;
          padding-top: 3.5rem;
          background-color: #343a40;
          color: white;
        }

        .main-content {
          margin-left: 240px;
        }
     </style>

</head>
<body>

  {{-- Navbar Start --}}
  <nav class="navbar navbar-expand-lg sticky-top shadow" style="background-color:#006633">
    <div class="container-fluid">      

        <div class="row px-2 w-100 ">
                
            <div class="col p-2 d-flex justify-content-start">
                <a class="navbar-brand text-white" href="#" >
                    <img src="{{asset('asset/img/logo.png')}}" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
                    RepositorySkripsi
                  </a>
            </div>
    
            <div class="col p-2 d-flex justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      halo, <b>prodi</b>
                    </button>
                    <ul class="dropdown-menu">
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

{{-- Navbar End --}}

<div class="container-fluid">
  <div class="row">

    {{-- Sidebar Start --}}
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: #ffc600">
      <div class="position-sticky pt-3">
        <br>
        <ul class="nav justify-content-center align-items-center">
            <li class="nav-item pt-3">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" width="60%">
            </li>
        </ul>
        <br>
        <ul class="nav flex-column pt-3">
            <li class="nav-item">
                <a class="nav-link {{ ($active == 'dashboard') ? 'active' : '' }}" href="{{ route('dashboard.staff') }}">
                    <i class="fa-solid fa-chart-simple"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($active == 'datamahasiswa') ? 'active' : '' }}" href="{{ route('datamahasiswa.staff') }}">
                    <i class="fa-solid fa-users-rectangle"></i>
                    Data Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($active == 'datadosen') ? 'active' : '' }}" href="{{ route('datadosen.staff') }}">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Data Dosen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($active == 'datatugas') ? 'active' : '' }}" href="{{ route('datatugas.staff') }}">
                    <i class="fa-solid fa-folder-open"></i>
                    Data Tugas Akhir
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($active == 'datakategori') ? 'active' : '' }}" href="{{ route('datakategori.staff') }}">
                    <i class="fa-solid fa-list"></i>
                    Data Kategori
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($active == 'notifikasi') ? 'active' : '' }}" href="{{ route('notifikasi.staff') }}">
                  <i class="fa-solid fa-clipboard-user"></i>
                  Notifikasi
              </a>
          </li>
            <!-- Add more menu items as needed -->
        </ul>
      </div>
    </nav>
    {{-- Sidebar End --}}
    
    {{-- Content Start --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('content')
    </main>
    {{-- content end --}}
    
  <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>