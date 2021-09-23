@include('includes/featureHeader')

	<section>
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									@include('includes/twitter-feed')
                                     @include('includes/shortcut2')
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="messages">
										<h5 class="f-title"><i class="fa fa-line-chart"></i>Statistics <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
										<div class="insight-box">
											<div class="x_panel">
												<div class="x_title">
													<h2>Line Graph</h2>
												</div>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
												<div class="x_content">
													<div id="main"></div>
											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>Bar Graph</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="mainb"></div>

											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>Mini Pie</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="echart_mini_pie"></div>

											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>Pie Graph</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="echart_pie"></div>

											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>Pie Area</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="echart_pie2"></div>

											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>Donut Graph</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="echart_donut"></div>

											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>Line Graph</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="echart_line"></div>

											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>Horizontal Bar</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="echart_bar_horizontal"></div>

											  </div>
											</div>
											<div class="x_panel">
											  <div class="x_title">
												<h2>World Map</h2>
												<ul class="toolbox">
												  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												  </li>
												  <li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
													<ul class="dropdown-menu" role="menu">
													  <li><a href="#">Settings 1</a>
													  </li>
													  <li><a href="#">Settings 2</a>
													  </li>
													</ul>
												  </li>
												  <li><a class="close-link"><i class="fa fa-close"></i></a>
												  </li>
												</ul>
											  </div>
											  <div class="x_content">

												<div id="echart_world_map"></div>

											  </div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									@include('includes/recent_activity')
									@include('includes/who-is-following')
								</aside>
							</div><!-- sidebar -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	{{-- <footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="widget">
						<div class="foot-logo">
							<div class="logo">
								<a href="index.html" title=""><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
							</div>
							<p>
								The trio took this simple idea and built it into the world’s leading carpooling platform.
							</p>
						</div>
						<ul class="location">
							<li>
								<i class="ti-map-alt"></i>
								<p>33 new montgomery st.750 san francisco, CA USA 94105.</p>
							</li>
							<li>
								<i class="ti-mobile"></i>
								<p>+1-56-346 345</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4">
					<div class="widget">
						<div class="widget-title"><h4>follow</h4></div>
						<ul class="list-style">
							<li><i class="fa fa-facebook-square"></i> <a href="https://web.facebook.com/shopcircut/" title="">facebook</a></li>
							<li><i class="fa fa-twitter-square"></i><a href="https://twitter.com/login?lang=en" title="">twitter</a></li>
							<li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/?hl=en" title="">instagram</a></li>
							<li><i class="fa fa-google-plus-square"></i> <a href="https://plus.google.com/discover" title="">Google+</a></li>
							<li><i class="fa fa-pinterest-square"></i> <a href="https://www.pinterest.com/" title="">Pintrest</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4">
					<div class="widget">
						<div class="widget-title"><h4>Navigate</h4></div>
						<ul class="list-style">
							<li><a href="about.html" title="">about us</a></li>
							<li><a href="contact.html" title="">contact us</a></li>
							<li><a href="terms.html" title="">terms & Conditions</a></li>
							<li><a href="#" title="">RSS syndication</a></li>
							<li><a href="sitemap.html" title="">Sitemap</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4">
					<div class="widget">
						<div class="widget-title"><h4>useful links</h4></div>
						<ul class="list-style">
							<li><a href="#" title="">leasing</a></li>
							<li><a href="#" title="">submit route</a></li>
							<li><a href="#" title="">how does it work?</a></li>
							<li><a href="#" title="">agent listings</a></li>
							<li><a href="#" title="">view All</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4">
					<div class="widget">
						<div class="widget-title"><h4>download apps</h4></div>
						<ul class="colla-apps">
							<li><a href="https://play.google.com/store?hl=en" title=""><i class="fa fa-android"></i>android</a></li>
							<li><a href="https://www.apple.com/lae/ios/app-store/" title=""><i class="ti-apple"></i>iPhone</a></li>
							<li><a href="https://www.microsoft.com/store/apps" title=""><i class="fa fa-windows"></i>Windows</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- footer --> --}}
	<div class="bottombar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span class="copyright">© Winku 2018. All rights reserved.</span>
					<i<img src="{{ asset('assets/images/resources/credit-cards.png') }}" alt=""></i>
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

	<script src="js/main.min.js"></script>
	<!-- ECharts -->
    <script src="js/echarts.min.js"></script>
    <script src="js/world.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/script.js"></script>


</body>
</html>
@include('includes/footer')
