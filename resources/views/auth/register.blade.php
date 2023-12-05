<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

     <!-- bootstrap -->
	 <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
	 {{-- <link rel="stylesheet" href="{{ asset('asset/css/tambahan.css') }}"> --}}
	 <link rel="stylesheet" href="{{ asset('asset/icon/css/font-awesome.min.css') }}">

</head>
<body>
<section>
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="card-wrapper">

					<br>
					<div class="card mx-auto" style="width: 650px;">
						<div class="card-body">
							<h1 class="card-title text-center">Daftar</h1>
							<form method="POST" action="{{ route('register') }}">
                                @csrf

                                <br>

								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email"  name="email" :value="old('email')" required autocomplete="email" >
									@error('email')
									<div class="text-danger">{{$message}}</div>
									@enderror
								</div>

                                <br>

								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" :value="old('username')"  required >
									@error('username')
									<div class="text-danger">{{$message}}</div>
									@enderror
								</div>

								<br>

                                <div>
                                    <label for="role">Role</label>
                                    <select class="form-select" id="role" name="role">
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="staff">Staff</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                
                                <br>
								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
									@error('password')
									<div class="text-danger">{{$message}}</div>
									@enderror
								</div>

                                <br>

                                <div class="form-group">
									<label for="password"> Confirm Password</label>
									<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">
									@error('password')
									<div class="text-danger">{{$message}}</div>
									@enderror
								</div>

                                <br>


								<div class="form-group m-0 text-center">
                                    <a class="underline text-sm text-dark" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    &nbsp;
									<button class="btn btn-primary btn-block" style="width: 250px">
										{{ __('Register') }}
                                    </button>
								</div>
							</form>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </section>

</body>
</html>