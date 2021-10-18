@php
	
	$skills = notifications();
    $allnotification = $skills['allnotification']->all();
    $count =$skills['count'];


@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
      @include('includes/head')
	</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="postoverlay"></div>
	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify text-secondary"></i></a>
			</span>
			<span class="mh-text">
				<a href="newsfeed" title=""><img src="{{ asset('assets/images/logo2.png') }}" alt=""></a>
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
						<li><a href="{{ url('logout'); }}" title="">Logout Page</a></li>
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
				<li><a href="widget bg-white bg-lights" title="">Widgts</a></li>
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

	<div class="topbar stick bg-white bg-light">
		<div class="logo">
			<a title="" href="/homepage"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
		</div>

		<div class="top-area bg-white bg-light">
			<div class="top-search">
				<form method="post" class="">
					<input type="text" placeholder="Search Friend" id="employee_search">
					<button data-ripple><i class="ti-search text-secondary"></i></button>
				</form>
			</div>
			<ul class="setting-area bg-white bg-light">
				<li><a href="newsfeed" title="Home" data-ripple=""><i class="ti-home text-secondary"></i></a></li>
				<li>
					<a href="#" title="Notification"  onclick="seen_notification()" data-ripple="">
						<i class="ti-bell"></i><span>{{ $count }}</span>
					</a>
					<div class="dropdowns">
						<span>@if( $count != "" or  $count != 0){{ count($allnotification) }}@else No @endif  New Notifications</span>
						
						<ul class="drops-menu">
							@foreach ($allnotification  as $notification )		
							@if($notification->type =="pageRequest")
							<li>
								<a href="/fav-page/{{ $notification->page_id }}"  title="">
									<img src="{{ asset('assets/images/resources/thumb-1.jpg') }}" alt="">
								<div class="mesg-meta">
										 <h6>{{ $notification->message }}</h6>
									</div>
								</a>
								@if( $notification->is_seen == '1')
								<span class="tag green">New</span>
								@endif

							</li>
							@else
							<li>
								<a href="notifications" title="">
									<img src="{{ asset('assets/images/resources/thumb-1.jpg') }}" alt="">
								<div class="mesg-meta">
										 <h6>{{ $notification->message }}</h6>
										</div>
								</a>
								@if( $notification->is_seen == '1')
								<span class="tag green">New</span>
								@endif

							</li>
                       	@endif

							@endforeach
							{{-- <li>
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
							</li> --}}
						</ul>
						<a href="notifications" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li>
					<a href="#" class="text-secondary"" title="Messages" data-ripple=""><i class="ti-comment text-secondary"></i><span>12</span></a>
					<div class="dropdowns">
						<span>5 New Messages</span>
						<ul class="drops-menu m-2">
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
				<li><a href="#" class="text-secondary"" title="Languages" data-ripple=""><i class="fa fa-globe text-secondary"></i></a>
					<div class="dropdowns languages">
						<a href="#" class="text-secondary"" title=""><i class="ti-check text-secondary"></i>English</a>
						<a href="#" class="text-secondary"" title="">Arabic</a>
						<a href="#" class="text-secondary"" title="">Dutch</a>
						<a href="#" class="text-secondary"" title="">French</a>
					</div>
				</li>
			</ul>
			<div class="user-img">
				<img src="{{ asset('assets/images/resources/admin.jpg') }}" alt="">
				<span class="status f-online"></span>
				<div class="user-setting">
					<a href="#" class="text-secondary"" title=""><span class="status f-online"></span>online</a>
					<a href="#" class="text-secondary"" title=""><span class="status f-away"></span>away</a>
					<a href="#" class="text-secondary"" title=""><span class="status f-off"></span>offline</a>
					<a href="about" title=""><i class="ti-user text-secondary"></i> view profile</a>
					<a href="#" class="text-secondary"" title=""><i class="ti-pencil-alt text-secondary"></i>edit profile</a>
					<a href="#" class="text-secondary"" title=""><i class="ti-target text-secondary"></i>activity log</a>
					<a href="#" class="text-secondary"" title=""><i class="ti-settings text-secondary"></i>account setting</a>
					<a href="#" class="text-secondary"" title=""><i class="ti-power-off text-secondary"></i>log out</a>
				</div>
			</div>
			<span class="ti-menu main-menu" data-ripple=""></span>
		</div>
	</div><!-- topbar -->

	<div class="fixed-sidebar right bg-white bg-light">
		<div class="chat-friendz">
			<ul class="chat-users">
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend1.jpg') }}" alt="">
						<span class="status f-online"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend2.jpg') }}" alt="">
						<span class="status f-away"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend3.jpg') }}" alt="">
						<span class="status f-online"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend4.jpg') }}" alt="">
						<span class="status f-offline"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend5.jpg') }}" alt="">
						<span class="status f-online"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend6.jpg') }}" alt="">
						<span class="status f-online"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend7.jpg') }}" alt="">
						<span class="status f-offline"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend8.jpg') }}" alt="">
						<span class="status f-online"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend9.jpg') }}" alt="">
						<span class="status f-away"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend10.jpg') }}" alt="">
						<span class="status f-away"></span>
					</div>
				</li>
				<li>
					<div class="author-thmb">
						<img src="{{ asset('assets/images/resources/side-friend8.jpg') }}" alt="">
						<span class="status f-online"></span>
					</div>
				</li>
			</ul>
			<div class="chat-box">
				<div class="chat-head">
					<span class="status f-online"></span>
					<h6>Bucky Barnes</h6>
					<div class="more">
						<span class="more-optns"><i class="ti-more-alt text-secondary"></i>
							<ul>
								<li>block chat</li>
								<li>unblock chat</li>
								<li>conversation</li>
							</ul>
						</span>
						<span class="close-mesage"><i class="ti-close text-secondary"></i></span>
					</div>
				</div>
				<div class="chat-list">
					<ul>
						<li class="me">
							<div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist1.jpg') }}" alt=""></div>
							<div class="notification-event">
								<span class="chat-message-item">
									Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
								</span>
								<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
							</div>
						</li>
						<li class="you">
							<div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist2.jpg') }}" alt=""></div>
							<div class="notification-event">
								<span class="chat-message-item">
									Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
								</span>
								<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
							</div>
						</li>
						<li class="me">
							<div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist1.jpg') }}" alt=""></div>
							<div class="notification-event">
								<span class="chat-message-item">
									Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
								</span>
								<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
							</div>
						</li>
					</ul>
					<form class="text-box">
						<textarea placeholder="Post enter to post..."></textarea>
						<div class="add-smiles">
							<span title="add icon" class="em em-expressionless"></span>
						</div>
						<div class="smiles-bunch">
							<i class="em em---1 text-secondary"></i>
							<i class="em em-smiley text-secondary"></i>
							<i class="em em-anguished text-secondary"></i>
							<i class="em em-laughing text-secondary"></i>
							<i class="em em-angry text-secondary"></i>
							<i class="em em-astonished text-secondary"></i>
							<i class="em em-blush text-secondary"></i>
							<i class="em em-disappointed text-secondary"></i>
							<i class="em em-worried text-secondary"></i>
							<i class="em em-kissing_heart text-secondary"></i>
							<i class="em em-rage text-secondary"></i>
							<i class="em em-stuck_out_tongue text-secondary"></i>
						</div>
						<button type="submit"></button>
					</form>
				</div>
			</div>
		</div>
	</div><!-- right sidebar user chat -->


	    <!-- Script -->
		<script type="text/javascript">

			// CSRF Token
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$(document).ready(function(){
		
			  $( "#employee_search" ).autocomplete({
				source: function( request, response ) {
				  // Fetch data
				  $.ajax({
					url:"#",
					type: 'post',
					dataType: "json",
					data: {
					   _token: CSRF_TOKEN,
					   search: request.term
					},
					success: function( data ) {
					   response( data );
					}
				  });
				},
				select: function (event, ui) {
				   // Set selection
				   $('#employee_search').val(ui.item.label); // display the selected text
				   $('#employeeid').val(ui.item.value); // save selected id to input
				   return false;
				}
			  });
		
			});
			</script>

	