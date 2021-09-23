@include('includes/featureHeader')
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">

									@include('includes/recent-post')
									@include('includes/shortcut2')
								</aside>
							</div>
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="editing-interest">
										<h5 class="f-title"><i class="ti-bell"></i>All Notifications </h5>
										<div class="notification-box">
											<ul>
												<li>
													<figure><img src="{{ asset('assets/images/resources/friend-avatar.jpg') }}" alt=""></figure>
													<div class="notifi-meta">
														<p>bob frank like your post</p>
														<span>30 mints ago</span>
													</div>
													<i class="del fa fa-close"></i>
												</li>
												<li>
													<figure><img src="{{ asset('assets/images/resources/friend-avatar2.jpg') }}" alt=""></figure>
													<div class="notifi-meta">
														<p>Sarah Hetfield commented on your photo. </p>
														<span>1 hours ago</span>
													</div>
													<i class="del fa fa-close"></i>
												</li>
												<li>
													<figure><img src="{{ asset('assets/images/resources/friend-avatar3.jpg') }}" alt=""></figure>
													<div class="notifi-meta">
														<p>Mathilda Brinker commented on your new profile status. </p>
														<span>2 hours ago</span>
													</div>
													<i class="del fa fa-close"></i>
												</li>
												<li>
													<figure><img src="{{ asset('assets/images/resources/friend-avatar4.jpg') }}" alt=""></figure>
													<div class="notifi-meta">
														<p>Green Goo Rock invited you to attend to his event Goo in Gotham Bar. </p>
														<span>2 hours ago</span>
													</div>
													<i class="del fa fa-close"></i>
												</li>
												<li>
													<figure><img src="{{ asset('assets/images/resources/friend-avatar5.jpg') }}" alt=""></figure>
													<div class="notifi-meta">
														<p>Chris Greyson liked your profile status. </p>
														<span>1 day ago</span>
													</div>
													<i class="del fa fa-close"></i>
												</li>
												<li>
													<figure><img src="{{ asset('assets/images/resources/friend-avatar6.jpg') }}" alt=""></figure>
													<div class="notifi-meta">
														<p>You and Nicholas Grissom just became friends. Write on his wall. </p>
														<span>2 days ago</span>
													</div>
													<i class="del fa fa-close"></i>
												</li>
											</ul>
										</div>
									</div>
								</div>	
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
											<div class="banner medium-opacity bluesh">
											<div class="bg-image" style="background-image: url(images/resources/baner-widgetbg.jpg)"></div>
											<div class="baner-top">
												<span><img src="{{ asset('assets/images/book-icon.png') }}" alt=""></span>
												<i class="fa fa-ellipsis-h"></i>
											</div>
											<div class="banermeta">
												<p>
													create your own favourit page.
												</p>
												<span>like them all</span>
												<a data-ripple="" title="" href="#">start now!</a>
											</div>
										</div>											
										</div>
									    @include('includes/who-is-following')
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