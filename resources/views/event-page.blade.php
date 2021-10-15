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
        font-size: 20px;
        font-weight: 500;
        color: #dc3545;
    }
    small.hours {
        font-size: 80%;
        font-weight: bold;
        color: #050505;
    }
    .event-details {
        position: relative;
        top: 100px;
        left: 17px;
    }
    .outer-div.d-flex {
    position: relative;
    bottom: 90px;
    left: 40px;
}
    .event-details h2 {
        font-weight: 600;
        color: #dc3545;
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
                                <a title="" class="btn btn-sm btn-secondary text-white" href="{{ url('/create-event') }}">Create New Event</a>
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
                                            <img src="https://www.learningcontainer.com/wp-content/uploads/2020/09/Sample-Image-File-for-Testing.png?ezimgfmt=ng%3Awebp%2Fngcb4%2Frs%3Adevice%2Frscb4-1">
                                        </figure>
                                        <div class="outer-div d-flex">
                                            <div class="calender-icon">
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                                <div class="timing">
                                                    <small class="date-event">15 Friday</small><br>
                                                    <small class="hours">At 18:00</small>
                                                </div>
                                            </div>
                                            <div class="event-details">
                                                <h2>Dushera</h2>
                                                <span>Online Event</span>
                                            </div>
                                        </div>
                                        <hr style="margin: 0px; margin-top: -60px;">
                                    </div>
                                        <div class="timeline-info">
                                            <ul>
                                                <li class="about-dis">
                                                    <a class="active" href="" title="" data-ripple="">About</a>
                                                    <a class="" href="" title="" data-ripple="">Discussion</a>
                                                </li>
                                                <li class="float-right">
                                                    <button class="btn btn-sm btn-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> Invite</button>
                                                    <button class="btn btn-sm btn-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                    <button class="btn btn-sm btn-secondary"><i class="fa fa-share" aria-hidden="true"></i> Share</button>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="about mb-5">
                                        <div class="card w-100">
                                            <div class="card-body">
                                                <h3 class="card-title text-dark">Details</h3>
                                                <div class="pl-3 events-about">
                                                    <p class="card-text"><i class="fa fa-users" aria-hidden="true"></i>&nbsp 2 people responded</p>
                                                    <p>Event by</p>
                                                    <p>Location</p>
                                                    <p>Tickets</p>
                                                    <p>Class by</p>
                                                    <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp Events by <span>Username</span></p>
                                                    <p><i class="fa fa-globe" aria-hidden="true"></i>&nbsp Public .Anyone on or off Facebook</p>
                                                    <p>Celebrate with us</p>
                                                    <a class="btn btn-sm btn-secondary text-white">Categories</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="about mb-5">
                                        <div class="card w-100">
                                            <div class="card-body">
                                                <h3 class="card-title text-dark">Meet your host</h3>
                                                <div class="card w-100">
                                                    <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c7e290dc7%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c7e290dc7%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                                                    <div class="card-body text-center">
                                                      <h5 class="card-title">User Name</h5>
                                                      <a href="#" class="btn btn-primary w-100"><i class="ti-user"></i>&nbsp View</a>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="about-side-bar">
                                        <div class="card w-100">
                                            <div class="card-body">
                                                <h5 class="card-title">Guest</h5>
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <div><span>1</span><br><span>Going</span></div>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <div><span>1</span><br><span>Going</span></div>
                                                    </div>
                                                    
                                                </div>
                                                <hr>
                                                <h5 class="card-title">Go with friends</h5>
                                                <div class="friend-info">
                                                    <figure>
                                                       <img src="http://127.0.0.1:8000/assets/images/resources/friend-avatar10.jpg" alt="">
                                                    </figure>
                                                    <span>Name</span>
                                                    <a href="#" class="btn btn-sm btn-secondary float-right">Invite</a>
                                                    <span>Name</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
</html>`