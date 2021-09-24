
    <div class="col-lg-3">
         <aside class="sidebar static left">
            <div class="widget bg-white bg-light">
                <h4 class="widget-title bg-white bg-light">Shortcuts</h4>
                <ul class="naves">
                    <li>
                        <i class="ti-clipboard text-secondary"></i>
                        <a href="../newsfeed" class="text-secondary" title="">News feed</a>
                    </li>
                    <li>
                        <i class="ti-mouse-alt text-secondary"></i>
                        <a href="../inbox" class="text-secondary" title="">Inbox</a>
                    </li>
                    <li>
                        <i class="ti-files text-secondary"></i>
                        <a href="../fav-page" class="text-secondary" title="">My pages</a>
                    </li>
                    <li>
                        <i class="ti-user text-secondary"></i>
                        <a href="../timeline-friends" class="text-secondary" title="">friends</a>
                    </li>
                    <li>
                        <i class="ti-image text-secondary"></i>
                        <a href="../timeline-photos" class="text-secondary" title="">images</a>
                    </li>
                    <li>
                        <i class="ti-video-camera text-secondary"></i>
                        <a href="../timeline-videos" class="text-secondary" title="">videos</a>
                    </li>
                    <li>
                        <i class="ti-comments-smiley text-secondary"></i>
                        <a href="../messages" class="text-secondary" title="">Messages</a>
                    </li>
                    <li>
                        <i class="ti-bell text-secondary"></i>
                        <a href="../notifications" class="text-secondary" title="">Notifications</a>
                    </li>
                    <li>
                        <i class="ti-share text-secondary"></i>
                        <a href="../people-nearby" class="text-secondary" title="">People Nearby</a>
                    </li>
                    <li>
                        <i class="fa fa-bar-chart-o text-secondary"></i>
                        <a href="../insights" class="text-secondary" title="">insights</a>
                    </li>
                    <li class="test">
                        <i class="ti-power-off text-secondary"></i>
                        <form method="post" id="logout_id" action="{{ url("logout"); }}" enctype="multipart/form-data">
                            @csrf
                            <a href="javascript:$('#logout_id').submit();" class="text-secondary">Logout</a>			
                        </form>
                        
                    </li>
                </ul>
            </div>
            <style>

                .test{

                    display: flex !important;
                }
            </style>
       