<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/logo.png" sizes="16x16 32x32" rel="shortcut icon">
    <title>Repository Tugas Akhir</title>

    <link rel="shortcut icon" href="{{ asset('asset/img/logo.png')}}" sizes="16x16 32x32">
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/tambahan.css')}}">
    <link rel="stylesheet" href="{{asset('asset/icon/css/all.min.css')}}">

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand sticky-top shadow bg-repository-hijau">
        <div class="container-fluid justify-content-center">
            <div class="row px-2 w-100 ">
                <!-- Menggunakan justify-content-center dan px-2 -->

                <div class="col p-2 d-flex justify-content-start">
                    <!-- Update disini -->
                    <a class="navbar-brand text-white" href="#">
                        <img src="{{asset('asset/img/logo.png')}}" alt="Logo" width="35" height="35"
                            class="d-inline-block align-text-top">
                        Repository TugasAkhir
                    </a>
                </div>

                <div class="col p-2 d-flex justify-content-end">
                    <!-- Update disini -->
                    {{-- <div class="">
                        <a href="/login" class="btn btn-repository" type="button"
                            style="width: 100px">&nbsp;Login&nbsp;</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container mt-4">
        <div class="row">
            <div class="col ms-5 mt-5 pe-3">
                <div class="container-fluid">
                    <h3 style="color: #006633">Repository Tugas Akhir</h3>
                    <p>
                        Menyimpan kreativitas dan inovasi mahasiswa
                        untuk tugas akhir yang membawa perubahan
                    </p>
                    <img src="{{asset('asset/img/imgdashboard.png')}}" alt="" class="w-50">
                </div>
            </div>
            <div class="col mt-5 p-3">
                <div class="card border-0 rounded-0 shadow w-100" style="background-color">
                    <div class="card-body">
                        <h2 class="card-title text-center mt-3 p-2">LOGIN</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="d-flex flex-column align-items-center">
                                <div class="mt-4 w-75">
                                    <label for="username" :value="__('username')" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username"
                                        name="username" :value="old('username')" required autofocus autocomplete="username">
                                </div>
                                <div class="mt-3  w-75">
                                    <label for="password" :value="__('password')" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" aria-describedby="password"
                                        name="password" :value="old('password')" required autofocus autocomplete="password">
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-repository mt-4 w-50">Login</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="footer mt-5" style="background-color:black; height: 70px;">
        <div class="container-fluid">
            <p class="text-center" style="color: white;">Ada Masalah? <br> Hubungi Administrator
                <a href="">[helpdesk@usu.ac.id]</a>
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>