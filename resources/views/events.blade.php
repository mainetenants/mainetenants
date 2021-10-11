@include('includes/header')
<section>
   <div class="gap gray-bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="row merged20" id="page-contents">
                <div class="col-lg-3">
								
                    <aside class="sidebar static">
                        <div class="widget">
                        <h4 class="widget-title">Events</h4>
                        <div class="container">
                            <div id="searchEvent">
                                <form class="filterform" action="#">
                                    <input class="filterinput" type="text" placeholder="Search Events">
                                </form>
                            </div>
                        </div>
                        <ul class="naves">
                            
                            <li>
                                <a title="" class="btn btn-sm btn-info text-white" href="{{ url('/create-event') }}">Create New Event</a>
                            </li>
                            <li>
                                <i class="ti-home"></i>
                                <a title="" href="">Home</a>
                            </li>
                            <li>
                                <i class="ti-user"></i>
                                <a title="" href="">Your Events</a>
                                <ul class="naves">
                                    <li>
                                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                        <a title="" href="">Going</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <a title="" href="">Invitation</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <a title="" href="">Interested</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-h-square" aria-hidden="true"></i>
                                        <a title="" href="">Hosting</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <a title="" href="">Past Events</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <i class="fa fa-birthday-cake"></i>
                                <a title="" href="">Birthday</a>
                            </li>
                            <li>
                                <i class="fa fa-bell-o"></i>
                                <a title="" href="">Notification</a>
                            </li>
                            
                        </ul>
                    </div>
                    </aside>
                </div>
               	<div class="col-lg-9">
                    <div class="feature-photo">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-info">
                                        <ul>
                                            <li><span><h4><i class="fa fa-search"></i>&nbsp;&nbsp;Discover Events</h4></span></li>
                                            <li class="float-right">
                                                <a class="" href="time-line.html" title="" data-ripple="">Top</a>
                                                <a class="" href="timeline-photos.html" title="" data-ripple="">This weak</a>
                                                <a class="" href="timeline-videos.html" title="" data-ripple="">Online Events</a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                                @foreach ($events as $event)
                                    <div class="col-lg-6 mt-5">
                                        <div class="card" style="width: 18rem;">
                                            @if(isset($event->cover_photo) && !empty($event->cover_photo))
                                            <img class="card-img-top" src="{{ asset('upload/images/events/'.$event->cover_photo) }}" alt="Card image cap">
                                            @else
                                                <img class="card-img-top" src="{{ asset('assets/images/default/card280_180.svg') }}" alt="Card image cap">
                                            @endif
                                            <div class="card-body">
                                            <h5 class="card-title">{{ $event->event_name }}</h5>
                                            <p class="card-text">{{ $event->description }}</p>
                                            <a href="#" class="btn btn-sm btn-info float-right"><i class="ti-share"></i></a>
                                            <a href="#" class="btn btn-sm btn-info mx-2 float-right">Interested</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
                 
               </div>
            </div>
	
               <!-- centerl meta -->
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<div class="bottombar bg-light">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <span class="copyright">© Winku 2018. All rights reserved.</span>
            <i><img src="{{ asset('assets/images/credit-cards.png') }}" alt=" text-secondary"></i>
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
      {{ csrf_field() }}
   </form>
</div>
<!-- side panel -->

@include('includes/footer')
</body>
</html>