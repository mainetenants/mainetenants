@php
    
    $allusers = alluser();



@endphp
	<div class="fixed-sidebar left">
		<div class="menu-left">
			<ul class="left-menu">
				<li><a href="newsfeed" title="Newsfeed Page" data-toggle="tooltip" data-placement="right"><i class="ti-magnet text-secondary"></i></a></li>
				<li><a href="fav-page" title="favourit page" data-toggle="tooltip" data-placement="right"><i class="fa fa-star-o text-secondary"></i></a></li>
				<li><a href="insights" title="Account Stats" data-toggle="tooltip" data-placement="right"><i class="ti-stats-up text-secondary"></i></a></li>
				<li><a href="inbox" title="inbox" data-toggle="tooltip" data-placement="right"><i class="ti-import text-secondary"></i></a></li>
				<li><a href="messages" title="Messages" data-toggle="tooltip" data-placement="right"><i class="ti-comment-alt text-secondary"></i></a></li>
				<li><a href="edit-account-setting" title="Setting" data-toggle="tooltip" data-placement="right"><i class="ti-panel text-secondary"></i></a></li>
				<li><a href="faq" title="Faq's" data-toggle="tooltip" data-placement="right"><i class="ti-light-bulb text-secondary"></i></a></li>
				<li><a href="timeline-friends" title="Friends" data-toggle="tooltip" data-placement="right"><i class="ti-themify-favicon text-secondary"></i></a></li>
				<li><a href="widget bg-white bg-lights" title="widget bg-white bg-lights" data-toggle="tooltip" data-placement="right"><i class="ti-eraser text-secondary"></i></a></li>
				<li><a href="notifications" title="Notification" data-toggle="tooltip" data-placement="right"><i class="ti-bookmark-alt text-secondary"></i></a></li>
			</ul>
		</div>
	</div><!-- left sidebar menu -->

    <div class="col-lg-3">
        <aside class="sidebar static left">
            <div class="widget bg-white bg-light">
                <h4 class="widget-title bg-white bg-light">Shortcuts</h4>
                <ul class="naves">
                    <li>
                        <i class="ti-clipboard text-secondary"></i>
                        <a href="newsfeed" class="text-secondary" title="">News feed</a>
                    </li>
                    <li>
                        <i class="ti-mouse-alt text-secondary"></i>
                        <a href="inbox" class="text-secondary" title="">Inbox</a>
                    </li>
                    <li>
                        <i class="ti-files text-secondary"></i>
                        <a href="fav-page" class="text-secondary" title="">My pages</a>
                    </li>
                    <li>
                        <i class="ti-user text-secondary"></i>
                        <a href="timeline-friends" class="text-secondary" title="">friends</a>
                    </li>
                    <li>
                        <i class="ti-image text-secondary"></i>
                        <a href="timeline-photos" class="text-secondary" title="">images</a>
                    </li>
                    <li>
                        <i class="ti-video-camera text-secondary"></i>
                        <a href="timeline-videos" class="text-secondary" title="">videos</a>
                    </li>
                    <li>
                        <i class="ti-comments-smiley text-secondary"></i>
                        <a href="messages" class="text-secondary" title="">Messages</a>
                    </li>
                    <li>
                        <i class="ti-bell text-secondary"></i>
                        <a href="notifications" class="text-secondary" title="">Notifications</a>
                    </li>
                    <li>
                        <i class="ti-share text-secondary"></i>
                        <a href="people-nearby" class="text-secondary" title="">People Nearby</a>
                    </li>
                    <li>
                        <i class="fa fa-bar-chart-o text-secondary"></i>
                        <a href="insights" class="text-secondary" title="">insights</a>
                    </li>
                    <li>
                        <i class="ti-power-off text-secondary"></i>
                        <form method="post" id="logout_id" action="{{ url("logout"); }}" enctype="multipart/form-data">
                            @csrf
                            <a href="javascript:$('#logout_id').submit();" class="text-secondary">Logout</a>			
                        </form>
                        
                    </li>
                </ul>
            </div><!-- Shortcuts -->
            <div class="widget bg-white bg-light">
                <h4 class="widget-title bg-white bg-light">Recent Activity</h4>
                <ul class="activitiez">
                    <li>
                        <div class="activity-meta text-secondary text-secondary">
                            <i>10 hours Ago</i>
                            <span><a href="#" class="text-secondary"" title="">Commented on Video posted </a></span>
                            <h6>by <a href="time-line">black demon.</a></h6>
                        </div>
                    </li>
                    <li>
                        <div class="activity-meta text-secondary text-secondary">
                            <i>30 Days Ago</i>
                            <span><a href="#" class="text-secondary"" title="">Posted your status. “Hello guys, how are you?”</a></span>
                        </div>
                    </li>
                    <li>
                        <div class="activity-meta text-secondary text-secondary">
                            <i>2 Years Ago</i>
                            <span><a href="#" class="text-secondary"" title="">Share a video on her timeline.</a></span>
                            <h6>"<a href="#" class="text-secondary"">you are so funny mr.been.</a>"</h6>
                        </div>
                    </li>
                </ul>
            </div><!-- recent activites -->
            <div class="widget bg-white bg-light stick-widget bg-white bg-light">
                <h4 class="widget-title bg-white bg-light">Who's follownig</h4>
                <ul class="followers">
                    @foreach($allusers as $alluser)
                
                    <li>
                        <figure><img src="{{ asset('assets/images/resources/friend-avatar2.jpg') }}" alt=""></figure>
                        <div class="friend-meta">
                            <h4><a href="time-line" title="">{{$alluser->name}}</a></h4>
                            <a href="see_friend/{{ $alluser->id }}" title="" class="underline">Add Friend</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div><!-- who's following -->
        </aside>
    </div><!-- sidebar -->