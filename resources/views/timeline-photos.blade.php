  @include('includes/featureHeader')

	<section>
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
							
									@include('includes/shortcut')
									<!-- Shortcuts -->
								    @include('includes/profile_info')
									<!-- profile intro widget -->

								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<ul class="photos">

										<li>
											<a class="strip" href="images/resources/photo-22.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo2.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-33.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo3.jpg') }}" alt="">/a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-44.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo4.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-55.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo5.jpg') }}" alt=""></a>
										</li>

										<li>
											<a class="strip" href="images/resources/photo-66.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo6.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-77.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo7.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-88.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo8.jpg') }}" alt=""></a>
										</li>

										<li>
											<a class="strip" href="images/resources/photo-99.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo12.jpg') }}" alt="">></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-101.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo10.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-101.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo11.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-22.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo1.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-33.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo9.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-99.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo12.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-66.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo6.jpg') }}" alt=""></a>
										</li>
										<li>
											<a class="strip" href="images/resources/photo-66.jpg" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{ asset('assets/images/resources/photo13.jpg') }}" alt=""></a>
										</li>
									</ul>
									<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
								</div><!-- photos -->
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									@include('includes/twitter-feed')
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
					<i><img src="{{ asset('assets/images/credit-cards.png') }}" alt=""></i>
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