@extends('layouts-hireo.app')

@section('title', config('app.name').'| Login')

@section('content')
  

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Log In</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Log In</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">


			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="{{ route('register') }}">Sign Up!</a></span>
				</div>

    
				<!-- Form -->
				<form method="post" id="login-form" action="{{ route('login') }}">
          @csrf


					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="form-control input-text with-border @error('email') is-invalid @enderror" 
            name="email" id="email" placeholder="Email Address" value="{{old('name')}}" />
            @error('email')
            <p class="invalid-feedback">{{ $message }} </p>
            @enderror
					</div>
					

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="form-control input-text with-border @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" />
            @error('password')
            <p class="invalid-feedback">{{ $message }} </p>
            @enderror
					</div>
					<a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->
@endsection