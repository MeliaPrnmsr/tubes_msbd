{{-- @extends('admin.adminlayout')

@section('content')

@endsection
 --}}

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
         <link rel="stylesheet" href="{{asset('asset/icon/css/all.min.css')}}">
     </head>
 <body>

 <nav class="navbar navbar-expand-lg sticky-top shadow" >
    <div class="container-fluid">      

      <div class="row">
        <div class="col-2 p-2">
            <img src="{{asset('asset/img/logo.png')}}" alt="" width="30%" class="ps-3">
        </div>

        <div class="col p-2">
            <div class="position-relative">
                <ul id="myNavbar" class="navbar-nav justify-content-center">
                    <li class="nav-item" style="font-size: 18px;">
                      <a class="nav-link" aria-current="page" href="/home"><b>Home</b></a>
                    </li>
                    <li class="nav-item" style="font-size: 18px;">
                      <a class="nav-link" href="/umenu"><b>All Menu</b></a>
                    </li>
                    <li class="nav-item" style="font-size: 18px;">
                        <a class="nav-link" href="/urating"><b>Rating</b></a>
                    </li>
                    <li class="nav-item" style="font-size: 18px;">
                        <a class="nav-link" href="/uevent"><b>Event</b></a>
                    </li>
                    <li class="nav-item" style="font-size: 18px;">
                      <a class="nav-link" href="/reservasi"><b>Reservasi</b></a>
                  </li>
                  <li class="nav-item" style="font-size: 18px;">
                    <a class="nav-link" href="/history"><b>Histori</b></a>
                  </li>
                </ul>
            </div>
        </div>

        <div class="col-2 p-2">
          <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            </span>
            <img class="img-profile rounded-circle" src="{{ asset('asset/img/logo.png')}}" style="width: 10%">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="btn d-flex align-items-start" href="/profile" style="width: 100%">Profil</a>
            </li>
            <hr>
            <li>
              <form action="" method="POST">
                @csrf
                <button class="btn d-flex align-items-start" href="/login" style="width: 100%">Logout</button>
            </form>
            </li>
          </ul>
        </li>
      </ul>
        </div>
      </div>

    </div>
  </nav>

{{-- Navbar End --}}
</body>
</html>