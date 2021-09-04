<!DOCTYPE html>
<html lang="en">
	<head>
		@include('includes/head');
	 </head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Winku</h1>
						<p>
							Winku is free to use for as long as you want with two active projects.
						</p>
						<div class="friend-logo">
							<span><img src="{{ asset('assets/images/wink.png') }}" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h2 class="log-title">Login</h2>
							<p>
								Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
                            <span class="text-danger">
                            <!-- <div class="alert alert-danger" role="alert"> -->
                                <x-jet-validation-errors class="alert alert-danger" role="alert" />
                            <!-- </div> -->
                            </span>
							@if (session('status'))
							<div class="mb-4 font-medium text-sm text-green-600">
								{{ session('status') }}
							</div>
						    @endif
						<form method="post" action="{{ route('login') }}">
                            @csrf
							<div class="form-group">
							  <input type="text" id="input" required="required" name="email"/>
							  <label class="control-label" for="input" value="{{ __('Email') }}">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">
							  <input type="password" required="required" name="password"/>
							  <label class="control-label" for="input" value="{{ __('Password') }}">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							<label for="remember_me" class="flex items-center">
								<x-jet-checkbox id="remember_me" name="remember" /><i class="check-box"></i>
								<span class="ml-2 text-sm text-gray-600">{{ __('Always Remember Me.') }}</span>
							</label>
							</div>
							@if (Route::has('password.request'))
                    <a class="forgot-pwd" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
							<div class="submit-btns">
							<x-jet-button class="ml-4">
							    {{ __('Log in') }}
						    </x-jet-button>
                            <button class="ml-4 px-4 py-2 signup" type="button"><span>Register</span></button>
                            <!-- <x-jet-button class="mtr-btn signup">
                                {{ __('Register') }}
                            </x-jet-button> -->
							</div>
						</form>
					</div>
					<div class="log-reg-area reg">
						<h2 class="log-title">Register</h2>
							<p>
								Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
                            <x-jet-validation-errors class="mb-4" />
							@if (session('status'))
							<div class="mb-4 font-medium text-sm text-green-600">
								{{ session('status') }}
							</div>
						    @endif
                            <form action="{{ route('register') }}" method="POST">
                                @csrf

							<div class="form-group">
							  <input type="text" required="required" name="name"/>
							  <label class="control-label" for="input" value="{{ __('Name') }}">First & Last Name</label><i class="mtrl-select"></i>

							</div>
							<div class="form-group">
						
							  <input type="text" required="required" name="email"/>
							  <label class="control-label" for="input" value="{{ __('Email') }}">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">
							  <input type="password" required="required" name="password"/>
							  <label class="control-label" for="input" value="{{ __('Password') }}">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="radio" checked="checked"/><i class="check-box"></i>Male
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="radio"/><i class="check-box"></i>Female
								</label>
							  </div>
							</div>
							<div class="form-group">
							  <input type="text" required="required"/>
							  <label class="control-label" for="input">Email@</label><i class="mtrl-select"></i>
                              @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                              @endif
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Accept Terms & Conditions ?
							  </label>
							</div>
                            <a class="already-have" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
							<!-- <a href="#" title="" class="already-have">Already have an account</a> -->
							<div class="submit-btns">
                            <x-jet-button class="ml-4">
                                {{ __('Register') }}
                            </x-jet-button>
								<!-- <button class="mtr-btn signup" type="button"><span>Register</span></button> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script src="{{ asset('assets/js/main.min.js') }}"></script>
	<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
