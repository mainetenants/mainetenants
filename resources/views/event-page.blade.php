@include('includes/header')
<style>
    .calender-icon{
        width: 15%;
        padding: 5px;
        text-align: center;
        background: #f8f9fa;
        border-radius: 20px;
        box-shadow: 5px 10px 12px #888888;
    }
    .calender-icon span {
        color: #dc3545;
        font-size: 70px;
    }
    small.date-event {
        font-size: 18px;
        font-weight: 500;
        color: #dc3545;
    }
    small.hours {
        font-size: 80%;
        font-weight: bold;
        color: #050505;
    }
</style>
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
                                <div class="col-lg-12 mb-5">
                                    <div class="feature-photo">
                                        <figure>
                                            <img src="http://127.0.0.1:8000/upload/images/profile_photo/1634035119.png">
                                        </figure>
                                        <div class="calender-icon">
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                            <div class="timing">
                                                <small class="date-event">15 Friday</small><br>
                                                <small class="hours">At 18:00</small>
                                            </div>
                                            <div class="event-details">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
               </div>
            </div>
            <div class="col-lg-12">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
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