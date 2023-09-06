<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	<style>
		.login{
			background-color: #ff5c97
		}
		.login:hover{
			#D37194
		}
	</style>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">


				<form method="POST" action="{{ route('register') }}" class="login100-form validate-form" >
					@csrf
					<span class="login100-form-title">
						DAFTAR AKUN
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid nik is required: 16digit">
						<input class="input100 @error('nik') is-invalid @enderror" type="number" name="nik" placeholder="NIK" required="" value="{{ old('nik') }}" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-globe" aria-hidden="true"></i>
						</span>
						@error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
                        <input type="text" name="foto" hidden="" value="avatar.png">
                        <input type="text" name="level" hidden="" value="masyarakat">

					<div class="wrap-input100 validate-input" data-validate = "Valid name is required">
						<input class="input100 @error('name') is-invalid @enderror" required="" type="text" name="name" value="{{ old('name') }}"   placeholder="Nama" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid name is required">
						<input class="input100" type="number" name="telp" required="" value="{{ old('telp') }}" placeholder="Telp">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						 
					</div>
							@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Email Sudah Terdaftar</strong>
                                    </span>
                                @enderror
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="password" required placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_confirmation" required  id="password-confirm" required placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>





					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn login">
							DAFTAR
						</button>
					</div>

					<div class="text-center p-t-12">
						<!-- <span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a> -->
						<a class="txt2" href="{{url('login-user')}}">
							kembali
							<i class="fa fa-long-arrow-right " aria-hidden="true"></i>
						</a>
					</div>

					<div class="text-center p-t-150">
					
					</div>
				</form>
				<div class="login100-pic js-tilt" data-tilt style="padding-top: 10%">
					<img src="{{asset('login/images/img-01.png')}}" alt="IMG">
				</div>
			</div>
		</div>
	</div>
	
	

<!--===============================================================================================-->	
	<script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('login/js/main.js')}}"></script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
