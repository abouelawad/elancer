@extends('layouts-hireo.app')

@section('title', config('app.name').'| Register')

@section('content')
  
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Register</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Register</li>
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
					<h3 style="font-size: 26px;">Let's create your account!</h3>
					<span>Already have an account? <a href="{{ route('login') }}">Log In!</a></span>
				</div>

				<!-- Account Type -->
				<div class="account-type">
					<div>
						<input type="radio" name="account-type-radio" id="freelancer-radio" class="account-type-radio " checked/>
						<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
					</div>


					<div>
						<input type="radio" name="account-type-radio" id="employer-radio" class="account-type-radio"/>
						<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
					</div>
				</div>
  
    
				<!-- Form -->
				<form method="post" id="register-account-form" action="{{ route('register') }}">
          @csrf

					<div class="input-with-icon-left form-group">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="form-control input-text with-border @error('name') is-invalid @enderror"  
                    name="name" id="name" placeholder="Name" value="{{old('name')}}" />
            @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="form-control input-text with-border @error('email') is-invalid  @enderror" 
                    name="email" id="emailaddress-register" placeholder="Email Address" value="{{old('email')}}" />
            @error('email')
            <p class="invalid-feedback">{{ $message }} </p>
            @enderror
  
					</div>

					<div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border @error('password') is-invalid @enderror" name="password" id="password-register" placeholder="Password" " />
            @error('password')
            <p class="invalid-feedback">{{ $message }} </p>
            @enderror
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" placeholder="Repeat Password" />
					</div>
				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="register-account-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->
@endsection