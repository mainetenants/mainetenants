
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
        @include('includes/shortcut')
      <!-- Shortcuts -->
            @include('includes/recent_activity')
            {{-- <div class="widget bg-white bg-light">
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
            </div><!-- recent activites --> --}}
            @include('includes/who-is-following')
        <!-- who's following -->
        </aside>
    </div><!-- sidebar -->