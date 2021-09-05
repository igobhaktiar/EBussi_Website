@extends('auth/layout.app_login')

@section('content')

      <div class="image-holder">
					<img src="{{asset('loginn/images/login.jpg')}}" alt="">
				</div>
				<form action="{{ route('login')}}" class="sign-in-form" method="post">
					<h3>Login</h3>
          @csrf 
          @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
					<br>
					<div class="form-wrapper">
						<input id="username" type="text" class="form-control"  @error('usernames') is-invalid @enderror" name="username" 
            value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus  />
						<i class="zmdi zmdi-account"></i>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
					</div>
					
					<div class="form-wrapper">
						<input id="password" type="password" placeholder="Password" class="form-control" @error('password') is-invalid @enderror" name="password"
            autocomplete="current-password" placeholder="Password" required />
						<i class="zmdi zmdi-lock"></i>
            @error('password')
                <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
               @enderror
					</div>
                
					
                        <button>Login <i type="submit" value="Login"  ></i>
                        <div class="bzmdi zmdi-arrow-right">
                            
                        </button>
                        <br>
                        <center>
                        <p>Belum punya akun? <a href ="{{ route('register') }}">Klik disini</a></p>
                    </center>
                </br>
                
                    
                    @if (Route::has('password.request'))
              <center><a  href="{{ route('password.request') }}">
                 <!-- Forgot your password? -->
              </a></center>
            @endif
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
      @endsection
