 @include('includes/header')
	<section>
		<div class="page-header">
			<div class="header-inner">
				<h2>People Nearby "searched"</h2>
				<nav class="breadcrumb">
				  <a href="index.html" class="breadcrumb-item"><i class="fa fa-home"></i></a>
				  <span class="breadcrumb-item active">People Nearby</span>
				</nav>
			</div>
		</div>
	</section>
		
	<section>
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									@include('includes/profile-intro')
									@include('includes/shortcut2')
									

								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="nearby-pepl">
										<div class="nearby-map">
											<div id="map-canvas"></div>
										</div>
									</div><!-- near by map -->
									<ul class="nearby-contct">
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line.html" title=""><img src="{{ asset('assets/images/resources/friend-avatar9.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line.html" title="">jhon kates</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>400m away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line.html" title=""><img src="{{ asset('assets/images/resources/nearly1.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line.html" title="">sophia Gate</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>800mm away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line.html" title=""><img src="{{ asset('assets/images/resources/nearly2.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line.html" title="">sara grey</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>1km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line.html" title=""><img src="{{ asset('assets/images/resources/nearly3.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line.html" title="">Sexy cat</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>1.3km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line.html" title=""><img src="{{ asset('assets/images/resources/nearly4.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line.html" title="">Sara grey</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>2km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line.html" title=""><img src="{{ asset('assets/images/resources/nearly5.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line.html" title="">Amy watson</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>2km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line.html" title=""><img src="{{ asset('assets/images/resources/nearly6.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line.html" title="">caty lasbo</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>2.5km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>

									</ul>
								</div><!-- photos -->
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									@include('includes/who-is-following')
									@include('includes/friends')						
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<div class="bottombar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span class="copyright">© Winku 2018. All rights reserved.</span>
					<i><img src="{{ asset('assets/images/credit-cards.png') }}" alt="">></i>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="side-panel">
			<h4 class="panel-title">General Setting</h4>
			<form method="post">
				<div class="setting-row">
					<span>use night mode</span>
					<input type="checkbox" id="nightmode1"/> 
					<label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Notifications</span>
					<input type="checkbox" id="switch22" /> 
					<label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Notification sound</span>
					<input type="checkbox" id="switch33" /> 
					<label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>My profile</span>
					<input type="checkbox" id="switch44" /> 
					<label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Show profile</span>
					<input type="checkbox" id="switch55" /> 
					<label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
				</div>
			</form>
			<h4 class="panel-title">Account Setting</h4>
			<form method="post">
				<div class="setting-row">
					<span>Sub users</span>
					<input type="checkbox" id="switch66" /> 
					<label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>personal account</span>
					<input type="checkbox" id="switch77" /> 
					<label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Business account</span>
					<input type="checkbox" id="switch88" /> 
					<label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Show me online</span>
					<input type="checkbox" id="switch99" /> 
					<label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Delete history</span>
					<input type="checkbox" id="switch101" /> 
					<label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
				</div>
				<div class="setting-row">
					<span>Expose author name</span>
					<input type="checkbox" id="switch111" /> 
					<label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
				</div>
			</form>
		</div><!-- side panel -->	
	

</body>	
</html>
@include('includes/footer')