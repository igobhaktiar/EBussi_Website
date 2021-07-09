@extends('auth/layout.app_login')

@section('content')

				<div class="image-holder">
					<img src="loginn/images/register.jpg" alt="">
				</div>
				<form method="POST" action="{{ route('register') }}">
                @csrf
					<h3>Registration Form</h3>
					<div class="form-wrapper">
                    <label for="name" ></label>
    <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
					</div>

					<div class="form-wrapper">
                    <label for="username" ></label>
                    <input type="text" id="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror                                                                  
						<i class="zmdi zmdi-account"></i>
					</div>

					<div class="form-wrapper">
                   
                    <label for="email" ></label>
                    <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                      
            				
						<i class="zmdi zmdi-email"></i>
					</div>
                    
						<div class="form-wrapper">
                        <label for="password" ></label>                           
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
                    
                            <label for="password-confirm" ></label>
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<center>
					<p>Sudah punya akun? <a href ="{{ route('login') }}">Klik disini</a></p>
				</center>
				</form>
			</div>
@endsection
