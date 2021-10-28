<!DOCTYPE html>
<html lang="en">
	<head>
		@include('includes/head')
	 </head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h2 class="h2 log-title">Edit Profile</h2>
						
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
							<div class="form-group">
							  <input type="password" required="required" name="password_confirmation"/>
							  <label class="control-label" for="input" value="{{ __('Confirm Password') }}">Confirm Password</label><i class="mtrl-select"></i>
							</div>
							<div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="gender" value="0"/><i class="check-box"></i>Male
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="gender" value="1"/><i class="check-box"></i>Female
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
							<a class="already-have" href="{{ route('login') }}" style="width:100%;">
                                {{ __('Already registered?') }}
                            </a>
							<div class="form-group checkbox" style="width:100%;">
								@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
								<div>
									<x-jet-label for="terms">
										<div class="flex items-center">
											<x-jet-checkbox  name="terms"  id="terms"/><i class="check-box"></i>
											{{-- <x-jet-checkbox name="terms" class="check-box" id="terms"/> --}}
												<div class="ml-2">
													{!! __('I agree to the :terms_of_service and :privacy_policy', [
															'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
															'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
													]) !!}
												</div>
										</div>
									</x-jet-label>	
								</div>
							@endif
							</div>
                           
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
	<script src="{{ asset('assets/js/main.min.js') }}"></script>
	<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
