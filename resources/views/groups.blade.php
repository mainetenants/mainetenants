<!DOCTYPE html>
<html lang="en">
	<head>
		@include('includes/head');
	 </head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
			<span class="mh-text">
				<a href="newsfeed" title=""><img src="{{ asset('assets/images/logo2.png') }}" alt="">
				</a>
			</span>
			<span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>
		</div>
		<div class="mh-head second">
			<form class="mh-form">
				<input placeholder="search" />
				<a href="#/" class="fa fa-search"></a>
			</form>
		</div>
		<nav id="menu" class="res-menu">
			<ul>
				<li><span>Home</span>
					<ul>
						<li><a href="index" title="">Home Social</a></li>
						<li><a href="index2" title="">Home Social 2</a></li>
						<li><a href="index-company" title="">Home Company</a></li>
						<li><a href="landing" title="">Login page</a></li>
						<li><a href="logout" title="">Logout Page</a></li>
						<li><a href="newsfeed" title="">news feed</a></li>
					</ul>
				</li>
				<li><span>Time Line</span>
					<ul>
						<li><a href="time-line" title="">timeline</a></li>
						<li><a href="timeline-friends" title="">timeline friends</a></li>
						<li><a href="timeline-groups" title="">timeline groups</a></li>
						<li><a href="timeline-pages" title="">timeline pages</a></li>
						<li><a href="timeline-photos" title="">timeline photos</a></li>
						<li><a href="timeline-videos" title="">timeline videos</a></li>
						<li><a href="social-post-single" title="">Post Single</a></li>
						<li><a href="fav-page" title="">favourit page</a></li>
						<li><a href="groups" title="">groups page</a></li>
						<li><a href="page-likers" title="">Likes page</a></li>
						<li><a href="people-nearby" title="">people nearby</a></li>
						
						
					</ul>
				</li>
				<li><span>Account Setting</span>
					<ul>
						<li><a href="create-fav-page" title="">create fav page</a></li>
						<li><a href="edit-account-setting" title="">edit account setting</a></li>
						<li><a href="edit-interest" title="">edit-interest</a></li>
						<li><a href="edit-password" title="">edit-password</a></li>
						<li><a href="edit-profile-basic" title="">edit profile basics</a></li>
						<li><a href="edit-work-eductation" title="">edit work educations</a></li>
						<li><a href="messages" title="">message box</a></li>
						<li><a href="inbox" title="">Inbox</a></li>
						<li><a href="notifications" title="">notifications page</a></li>
					</ul>
				</li>
				<li><span>forum</span>
					<ul>
						<li><a href="forum" title="">Forum Page</a></li>
						<li><a href="forums-category" title="">Fourm Category</a></li>
						<li><a href="forum-open-topic" title="">Forum Open Topic</a></li>
						<li><a href="forum-create-topic" title="">Forum Create Topic</a></li>
					</ul>
				</li>
				<li><span>Our Shop</span>
					<ul>
						<li><a href="shop" title="">Shop Products</a></li>
						<li><a href="shop-masonry" title="">Shop Masonry Products</a></li>
						<li><a href="shop-single" title="">Shop Detail Page</a></li>
						<li><a href="shop-cart" title="">Shop Product Cart</a></li>
						<li><a href="shop-checkout" title="">Product Checkout</a></li>
					</ul>
				</li>
				<li><span>Our Blog</span>
					<ul>
						<li><a href="blog-grid-wo-sidebar" title="">Our Blog</a></li>
						<li><a href="blog-grid-right-sidebar" title="">Blog with R-Sidebar</a></li>
						<li><a href="blog-grid-left-sidebar" title="">Blog with L-Sidebar</a></li>
						<li><a href="blog-masonry" title="">Blog Masonry Style</a></li>
						<li><a href="blog-list-wo-sidebar" title="">Blog List Style</a></li>
						<li><a href="blog-list-right-sidebar" title="">Blog List with R-Sidebar</a></li>
						<li><a href="blog-list-left-sidebar" title="">Blog List with L-Sidebar</a></li>
						<li><a href="blog-detail" title="">Blog Post Detail</a></li>
					</ul>
				</li>
				<li><span>Portfolio</span>
					<ul>
						<li><a href="portfolio-2colm" title="">Portfolio 2col</a></li>
						<li><a href="portfolio-3colm" title="">Portfolio 3col</a></li>
						<li><a href="portfolio-4colm" title="">Portfolio 4col</a></li>
					</ul>
				</li>
				<li><span>Support & Help</span>
					<ul>
						<li><a href="support-and-help" title="">Support & Help</a></li>
						<li><a href="support-and-help-detail" title="">Support & Help Detail</a></li>
						<li><a href="support-and-help-search-result" title="">Support & Help Search Result</a></li>
					</ul>
				</li>
				<li><span>More pages</span>
					<ul>
						<li><a href="careers" title="">Careers</a></li>
						<li><a href="career-detail" title="">Career Detail</a></li>
						<li><a href="404" title="">404 error page</a></li>
						<li><a href="404-2" title="">404 Style2</a></li>
						<li><a href="faq" title="">faq's page</a></li>
						<li><a href="insights" title="">insights</a></li>
						<li><a href="knowledge-base" title="">knowledge base</a></li>
					</ul>
				</li>
				<li><a href="about" title="">about</a></li>
				<li><a href="about-company" title="">About Us2</a></li>
				<li><a href="contact" title="">contact</a></li>
				<li><a href="contact-branches" title="">Contact Us2</a></li>
				<li><a href="widgets" title="">Widgts</a></li>
			</ul>
		</nav>
		<nav id="shoppingbag">
			<div>
				<div class="">
					<form method="post">
						<div class="setting-row">
							<span>use night mode</span>
							<input type="checkbox" id="nightmode"/> 
							<label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notifications</span>
							<input type="checkbox" id="switch2"/> 
							<label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notification sound</span>
							<input type="checkbox" id="switch3"/> 
							<label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>My profile</span>
							<input type="checkbox" id="switch4"/> 
							<label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show profile</span>
							<input type="checkbox" id="switch5"/> 
							<label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
					<h4 class="panel-title">Account Setting</h4>
					<form method="post">
						<div class="setting-row">
							<span>Sub users</span>
							<input type="checkbox" id="switch6" /> 
							<label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>personal account</span>
							<input type="checkbox" id="switch7" /> 
							<label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Business account</span>
							<input type="checkbox" id="switch8" /> 
							<label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show me online</span>
							<input type="checkbox" id="switch9" /> 
							<label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Delete history</span>
							<input type="checkbox" id="switch10" /> 
							<label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Expose author name</span>
							<input type="checkbox" id="switch11" /> 
							<label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
				</div>
			</div>
		</nav>
	</div><!-- responsive header -->
	
	<div class="topbar stick">
		<div class="logo">
			<a title="" href="newsfeed"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
		</div>
		
		<div class="top-area">
			<ul class="main-menu">
				<li>
					<a href="#" title="">Home</a>
					<ul>
						<li><a href="index" title="">Home Social</a></li>
						<li><a href="index2" title="">Home Social 2</a></li>
						<li><a href="index-company" title="">Home Company</a></li>
						<li><a href="landing" title="">Login page</a></li>
						<li><a href="logout" title="">Logout Page</a></li>
						<li><a href="newsfeed" title="">news feed</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">timeline</a>
					<ul>
						<li><a href="time-line" title="">timeline</a></li>
						<li><a href="timeline-friends" title="">timeline friends</a></li>
						<li><a href="timeline-groups" title="">timeline groups</a></li>
						<li><a href="timeline-pages" title="">timeline pages</a></li>
						<li><a href="timeline-photos" title="">timeline photos</a></li>
						<li><a href="timeline-videos" title="">timeline videos</a></li>
						<li><a href="social-post-single" title="">Post Single</a></li>
						<li><a href="fav-page" title="">favourit page</a></li>
						<li><a href="groups" title="">groups page</a></li>
						<li><a href="page-likers" title="">Likes page</a></li>
						<li><a href="people-nearby" title="">people nearby</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">account settings</a>
					<ul>
						<li><a href="create-fav-page" title="">create fav page</a></li>
						<li><a href="edit-account-setting" title="">edit account setting</a></li>
						<li><a href="edit-interest" title="">edit-interest</a></li>
						<li><a href="edit-password" title="">edit-password</a></li>
						<li><a href="edit-profile-basic" title="">edit profile basics</a></li>
						<li><a href="edit-work-eductation" title="">edit work educations</a></li>
						<li><a href="messages" title="">message box</a></li>
						<li><a href="inbox" title="">Inbox</a></li>
						<li><a href="notifications" title="">notifications page</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">more pages</a>
					<ul>
						<li><a href="404" title="">404 error page</a></li>
						<li><a href="about" title="">about</a></li>
						<li><a href="contact" title="">contact</a></li>
						<li><a href="faq" title="">faq's page</a></li>
						<li><a href="insights" title="">insights</a></li>
						<li><a href="knowledge-base" title="">knowledge base</a></li>
						<li><a href="widgets" title="">Widgts</a></li>
					</ul>
				</li>
			</ul>
			<ul class="setting-area">
				<li>
					<a href="" title="Home" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<form method="post" class="form-search">
							<input type="text" placeholder="Search Friend">
							<button data-ripple><i class="ti-search"></i></button>
						</form>
					</div>
				</li>
				<li><a href="newsfeed" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
				<li>
					<a href="#" title="Notification" data-ripple="">
						<i class="ti-bell"></i><span>20</span>
					</a>
					<div class="dropdowns">
						<span>4 New Notifications</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-1.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-2.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-3.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-4.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-5.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="notifications" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li>
					<a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
					<div class="dropdowns">
						<span>5 New Messages</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-1.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-2.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-3.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-4.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-5.jpg') }}" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="messages" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
					<div class="dropdowns languages">
						<a href="#" title=""><i class="ti-check"></i>English</a>
						<a href="#" title="">Arabic</a>
						<a href="#" title="">Dutch</a>
						<a href="#" title="">French</a>
					</div>
				</li>
			</ul>
			<div class="user-img">
				<img src="{{ asset('assets/images/resources/admin.jpg') }}" alt="">
				<span class="status f-online"></span>
				<div class="user-setting">
					<a href="#" title=""><span class="status f-online"></span>online</a>
					<a href="#" title=""><span class="status f-away"></span>away</a>
					<a href="#" title=""><span class="status f-off"></span>offline</a>
					<a href="#" title=""><i class="ti-user"></i> view profile</a>
					<a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
					<a href="#" title=""><i class="ti-target"></i>activity log</a>
					<a href="#" title=""><i class="ti-settings"></i>account setting</a>
					<a href="#" title=""><i class="ti-power-off"></i>log out</a>
				</div>
			</div>
			<span class="ti-menu main-menu" data-ripple=""></span>
		</div>
	</div><!-- topbar -->	
		
	<section>
		<div class="page-header">
			<div class="header-inner">
				<h2>your Searched Groups</h2>
				<nav class="breadcrumb">
				  <a href="index" class="breadcrumb-item"><i class="fa fa-home"></i></a>
				  <span class="breadcrumb-item active">Groups</span>
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
									<div class="widget">
											<h4 class="widget-title">Shortcuts</h4>
											<ul class="naves">
												<li>
													<i class="ti-clipboard"></i>
													<a href="newsfeed" title="">News feed</a>
												</li>
												<li>
													<i class="ti-mouse-alt"></i>
													<a href="inbox" title="">Inbox</a>
												</li>
												<li>
													<i class="ti-files"></i>
													<a href="fav-page" title="">My pages</a>
												</li>
												<li>
													<i class="ti-user"></i>
													<a href="timeline-friends" title="">friends</a>
												</li>
												<li>
													<i class="ti-image"></i>
													<a href="timeline-photos" title="">images</a>
												</li>
												<li>
													<i class="ti-video-camera"></i>
													<a href="timeline-videos" title="">videos</a>
												</li>
												<li>
													<i class="ti-comments-smiley"></i>
													<a href="messages" title="">Messages</a>
												</li>
												<li>
													<i class="ti-bell"></i>
													<a href="notifications" title="">Notifications</a>
												</li>
												<li>
													<i class="ti-share"></i>
													<a href="people-nearby" title="">People Nearby</a>
												</li>
												<li>
													<i class="fa fa-bar-chart-o"></i>
													<a href="insights" title="">insights</a>
												</li>
												<li>
													<i class="ti-power-off"></i>
													<a href="landing" title="">Logout</a>
												</li>
											</ul>
										</div><!-- Shortcuts -->
									{{-- <div class="widget stick-widget">
										<h4 class="widget-title">Profile intro</h4>
										<ul class="short-profile">
											<li>
												<span>about</span>
												<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
											</li>
											<li>
												<span>fav tv show</span>
												<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
											</li>
											<li>
												<span>favourit music</span>
												<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
											</li>
										</ul>
									</div><!-- profile intro widget --> --}}

								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="groups">
										<span><i class="fa fa-users"></i> Groups</span>
									</div>
									<ul class="nearby-contct">
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group1.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">funparty</a></h4>
													<span>public group</span>
													<em>32k Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group2.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">ABC News</a></h4>
													<span>Private group</span>
													<em>5M Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
										{{-- <li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group3.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">SEO Zone</a></h4>
													<span>Public group</span>
													<em>32k Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li> --}}
										{{-- <li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group4.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">Max Us</a></h4>
													<span>Public group</span>
													<em> 756 Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group5.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">Banana Group</a></h4>
													<span>Friends Group</span>
													<em>32k Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group6.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">Bad boys n Girls</a></h4>
													<span>Public group</span>
													<em>32k Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group7.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">bachelor's fun</a></h4>
													<span>Public Group</span>
													<em>500 Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group4.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">Max Us</a></h4>
													<span>Public group</span>
													<em> 756 Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="time-line" title=""><img src="{{ asset('assets/images/resources/group3.jpg') }}" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="time-line" title="">SEO Zone</a></h4>
													<span>Public group</span>
													<em>32k Members</em>
													<a href="#" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li> --}}
									</ul>
								</div><!-- photos -->
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static right">
									@include('includes/who-is-following')
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="widget">
						<div class="foot-logo">
							<div class="logo">
								<a href="index" title=""><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
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
							<li><a href="about" title="">about us</a></li>
							<li><a href="contact" title="">contact us</a></li>
							<li><a href="terms" title="">terms & Conditions</a></li>
							<li><a href="#" title="">RSS syndication</a></li>
							<li><a href="sitemap" title="">Sitemap</a></li>
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
	</footer><!-- footer -->
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
	
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/map-init.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

</body>	
</html>