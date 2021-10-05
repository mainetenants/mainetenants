@include('includes/header')
<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">

                <div class="row merged20" id="page-contents">
                    <div class="col-lg-3 col-md-12 col-sm-12">

                        <aside class="sidebar static">
                            <div class="widget">
                                <h4 class="widget-title">Create Events</h4>
                                <div class="container mb-3 ml-2">
                                    <div class="new-postbox">
                                        <span class="host">
                                            <img src="http://127.0.0.1:8000/assets/images/resources/admin2.jpg" alt="">
                                        </span>
                                        {{-- <span class="owner">Username Host</span> --}}
                                        <span class="owner"> <span class="host">Username </span> <span
                                                class="host">Host</span></span>
                                    </div>
                                </div>
                                <ul class="naves">
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
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="feature-photo">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="timeline-info">
                                            <ul>
                                                <li><span>
                                                        <h4><i class="fa fa-search"></i>&nbsp;&nbsp;Discover Events
                                                        </h4>
                                                    </span></li>
                                                <li class="float-right">
                                                    <a class="" href="time-line.html" title="" data-ripple="">Top</a>
                                                    <a class="" href="timeline-photos.html" title="" data-ripple="">This
                                                        weak</a>
                                                    <a class="" href="timeline-videos.html" title=""
                                                        data-ripple="">Online Events</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    
                             
                                    <div class="col-md-12 text-center p-0 mt-3 mb-2">
                                        <div class="mt-3 mb-3">
                                            <form id="form" method="POST" name="create_page" class="create_page" action="create_page_user">
                            
                                                @csrf
                                                <div class="col-md-8 offset-md-2">
                                                    <ul id="progressbar">
                                                        <li class="active" id="step1">
                                                            <strong>Step 1</strong>
                                                        </li>
                                                        <li id="step2"><strong>Step 2</strong></li>
                                                        <li id="step3"><strong>Step 3</strong></li>
                                                    </ul>
                                                </div>
                                                <br>
                                                <fieldset class="bg-color">
                                                    <div class="container ">
                                                        <div class="row mt-5">
                                                            <div class="col-sm-6">
                                                                <div class="card">
                                                                    <div class="card-body text-center">
                                                                        <label for="online">
                                                                            
                                                                        {{-- <input type="checkbox" name="online" id ="online"  class="d-none" /> --}}
                                                                        <input type="radio" name="create_event" id ="online" class="radio" style="float: left;" />
                                                                            <h4><i class="ti-world" aria-hidden="true"></i></h4>
                                                                            <h5 class="card-title">Online</h5>
                                                                            <p class="card-text">Video chat with Messenger Rooms,
                                                                                broadcast with Facebook Live or add an external link.
                                                                            </p>
                                                                        </div>
                                                                    
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="card">
                                                                    <label for="in_person">
                                                                    <div class="card-body text-center">
                                                                            {{-- <input type="checkbox" name="in_person" id ="in_person"  class="d-none" /> --}}
                                                                            <input type="radio" name="create_event" id ="in_person" class="radio" style="float: left;" />
                                                                            <h4><i class="fa fa-users" aria-hidden="true"></i></h4>
                                                                            <h5 class="card-title">In Person</h5>
                                                                            <p class="card-text">Get together with people in a specific
                                                                                location.</p>
                                                                            </div>
                                                                        </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <input type="button" name="next-step" id="btn_event_next" class="next-step" value="Next" />
                                                </fieldset>
                                                <fieldset class="bg-color">
                                                    <div class="container ">
                                                        <div class="row mt-5">
                                                            <div class="col-sm-6">
                                                                <div class="card">
                                                                    <div class="card-body text-center">
                                                                        <label for="general">
                                                                        <input type="radio" name="general" id ="general" />
                                                                            <h4><i class="ti-world" aria-hidden="true"></i></h4>
                                                                            <h5 class="card-title">General</h5>
                                                                            <p class="card-text">Add event details, a cover photo and
                                                                                choose your audience.</p>
                                                                            </div>
                                                                        </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="card">
                                                                    <div class="card-body text-center">
                                                                        <label for="class">
                                                                        <input type="radio" name="class" id ="class" />
                                                                            <h4><i class="fa fa-users" aria-hidden="true"></i></h4>
                                                                            <h5 class="card-title">Class</h5>
                                                                            <p class="card-text">Schedule live and interactive classes.
                                                                            </p>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <input type="button" id="page_desc_btn" name="next-step" class="next-step" value="Next Step" />
                                                    <input type="button" name="previous-step" class="previous-step" value="Back" />
                                                </fieldset>
                                                <fieldset class="bg-color">
                                                    <div class="form-group col-sm-12 mx-auto text-left">
                                                        <label for="exampleFormControlInput1" class="custom-label">Page Description</label>
                                                        <textarea type="text" class="form-control page_info" id="page_Description"
                                                            name="page_descripition" placeholder="Page Name(required)"></textarea>
                                                    </div>
                                                    <input type="button" name="previous-step" class="previous-step" value="Back" />
                                                    <input type="submit" class="next-step" name="submit" id="submit" value="Submit" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <form action="post" class="col-md-12" action="{{url("abc")}}" ">
                                        <div class="col-md-8 order-md-1 offset-md-2 bg-light mt-5 p-4">
                                            <h2 class="text-center">Event details</h2>
                                            <div class="p-3">
                                                <div class="mb-3">
                                                    <label for="email">Event Name</label>
                                                    <input type="text" class="form-control" id="event_name"
                                                        placeholder="Event Name">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="start_date">Start Date</label>
                                                        <input type="date" class="form-control" id="start_date" required="">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="start_time">Start Time</label>
                                                        <input type="time" class="form-control" id="start_time" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="end_date">End Date</label>
                                                        <input type="date" class="form-control" id="end_date" required="">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="end_time">End Time</label>
                                                        <input type="time" class="form-control" id="end_time" required="">
                                                    </div>
                                                </div>



                                                <div class="mb-3">
                                                    <label for="country">Privacy</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="privacy"
                                                            id="private">
                                                        <label class="form-check-label" for="private">
                                                            Private
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="privacy"
                                                            id="friends" checked>
                                                        <label class="form-check-label" for="friends">
                                                            Friends
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr class="mb-4">
                                                <button class="btn btn-info btn-sm float-right" type="submit">Next</button>
                                            </div>
                                        </div>
                                        <div class="col-md-8 order-md-1 offset-md-2 bg-light mt-5 p-4">
                                            <h2 class="text-center">Location</h2>
                                            <h6 class="text-muted text-center">Choose a way for people to join your event
                                                online.</h6>
                                            <div class="p-3">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-other" type="radio" name="location"
                                                            id="other">
                                                        <label class="form-check-label" for="other">
                                                            Other
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-external_link" type="radio" name="location"
                                                            id="external_link" checked="">
                                                        <label class="form-check-label" for="external_link">
                                                            External Link
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="event_link">Event Link</label>
                                                    <input type="text" class="form-control" id="event_link" required="">
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <label for="event_link">Description</label>
                                                    <textarea class="form-control" id="description" required=""></textarea>
                                                </div>
                                                <hr class="mb-4">
                                                <button class="btn btn-info btn-sm float-right" type="submit">Next</button>
                                            </div>
                                        </div>
                                        <div class="col-md-8 order-md-1 offset-md-2 bg-light mt-5 p-4">
                                            <h2 class="text-center">Additional details</h2>
                                            <div class="p-3">
                                                <div class="mb-3 mt-3">
                                                    <label for="event_link">Cover photo</label>
                                                    <input type="file" class="form-control" id="cover_photo" required="">
                                                </div>
                                                
                                                <div class="mb-3 mt-3">
                                                    <label for="event_link">Co-host</label>
                                                    <input type="text" class="form-control" id="add_frnd" placeholder="Add Friend" required="">
                                                </div>
                                                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="show_guest_list"
                                                        id="show_guest_list" checked>
                                                    <label class="form-check-label" for="show_guest_list">
                                                        Show Guest List
                                                    </label>
                                                </div>
                                                <hr class="mb-4">
                                                <button class="btn btn-info btn-sm float-right" type="submit">Next</button>
                                            </div>
                                        </div>
                                    </form>
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
                <i><img src="{{ asset('assets/images/credit-cards.png') }}"
                        alt=" text-secondary"></i>
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
            <input type="checkbox" id="nightmode1" />
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
