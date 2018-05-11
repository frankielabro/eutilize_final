@extends('layouts.auth')

@section('content')
<div class="limiter">
		<div class="container-login100" style="background-image: url('auth/images/bg-01.jpg');">
			<div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf

					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
                    </span>
                    
                    @if (count($errors))
                        <ul>
                            @foreach($errors->all() as $error)
                            <div style="margin: 15px 0px 0px; font-size: 13px;" class="alert alert-danger text-center" role="alert">
                                {{ $error }}
                            </div>
                            @endforeach
                        </ul>
                    @endif
        
					<span class="login100-form-title p-b-34 p-t-27">
                        {{ __('Login') }}
                    </span>
                    
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input id="email" type="email" class="input100" name="email"
                               placeholder="Email"  value="{{ old('email') }}" required autofocus autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input id="password" type="password" class="input100" name="password" 
                               placeholder="Password" required autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="LOGIN">
						</input>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection
