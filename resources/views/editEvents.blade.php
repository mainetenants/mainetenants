@include('includes/header')
<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="row merged20" id="page-contents">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <aside class="sidebar static">
                            <div class="widget">
                                <h4 class="widget-title">Edit Event</h4>
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
                                                <a class="" href="timeline-videos.html" title="" data-ripple="">Online
                                                    Events</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                <form id="event" method="POST" enctype="multipart/form-data" action="{{ url('update-event-form') }}">
                                    @csrf
                                    <div class="col-md-12 text-center p-0 mt-3 mb-2">
                                        <div class="mt-3 mb-3">
                                            <div class="probress-btns col-md-8 offset-md-2" style="display: none">
                                                <ul id="progressbar">
                                                    <li class="active" id="step1"><strong>Step 1</strong></li>
                                                    <li id="step2"><strong>Step 2</strong></li>
                                                    <li id="step3"><strong>Step 3</strong></li>
                                                </ul>
                                            </div>
                                            <br>
                                            <div class="container create-event">
                                                <div class="row mt-5 ">
                                                    <div class="col-sm-6">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <label for="online">

                                                                    <input type="radio" name="create_event" id="online"
                                                                        class="card-radio radio" style="float: left;"
                                                                        value="online" />
                                                                    <h4><i class="ti-world" aria-hidden="true"></i>
                                                                    </h4>
                                                                    <h5 class="card-title">Online</h5>
                                                                    <p class="card-text">Video chat with Messenger
                                                                        Rooms,
                                                                        broadcast with Facebook Live or add an
                                                                        external link.
                                                                    </p>
                                                            </div>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="card">
                                                            <label for="in_person">
                                                                <div class="card-body text-center">
                                                                    <input type="radio" name="create_event"
                                                                        id="in_person" class="card-radio radio"
                                                                        style="float: left;" value="in_person" />
                                                                    <h4><i class="fa fa-users" aria-hidden="true"></i>
                                                                    </h4>
                                                                    <h5 class="card-title">In Person</h5>
                                                                    <p class="card-text">Get together with people in
                                                                        a specific
                                                                        location.</p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="container p-4">
                                                        <input type="button" id="create-event"
                                                            class="btn btn-info btn-sm float-right" value="Next" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container event-type" style="display: none">
                                                <div class="row mt-5 ">
                                                    <div class="col-sm-6">
                                                        <div class="card">
                                                            <label for="general">
                                                                <div class="card-body text-center">
                                                                    <input type="radio" name="event_type"
                                                                        class="card-radio radio" id="general" value="general" />
                                                                    <h4><i class="ti-world" aria-hidden="true"></i>
                                                                    </h4>
                                                                    <h5 class="card-title">General</h5>
                                                                    <p class="card-text">Add event details, a cover
                                                                        photo and
                                                                        choose your audience.</p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="card">
                                                            <label for="class">
                                                                <div class="card-body text-center">
                                                                    <input type="radio" name="event_type" id="class"
                                                                        class="card-radio radio" value="class"/>
                                                                    <h4><i class="fa fa-users" aria-hidden="true"></i>
                                                                    </h4>
                                                                    <h5 class="card-title">Class</h5>
                                                                    <p class="card-text">Schedule live and
                                                                        interactive classes.
                                                                    </p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container p-4">
                                                    <input type="button" id="event-type"
                                                        class="btn btn-info btn-sm float-right" value="Next" />
                                                    <input type="button" id="event-type-back"
                                                        class="btn btn-secondary btn-sm float-right mx-2" value="Back" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="event-details col-md-8 offset-md-2 bg-light mt-2 p-4"
                                        style="display: none">
                                        <h2 class="text-center">Event details</h2>
                                        <div class="p-3">
                                            <div class="event-alert">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email">Event Name</label>
                                                <input type="text" class="form-control" id="event_name"
                                                    name="event_name" value = "{{ $edit_event->event_name }}" placeholder="Event Name">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                        name="start_date" value="{{$edit_event->start_date }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="start_time">Start Time</label>
                                                    <input type="time" class="form-control" id="start_time"
                                                        name="start_time" value="{{$edit_event->start_time }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" class="form-control" id="end_date"
                                                        name="end_date" value="{{$edit_event->end_date }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="end_time">End Time</label>
                                                    <input type="time" class="form-control" id="end_time"
                                                        name="end_time" value="{{$edit_event->end_time }}">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="country">Privacy</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="privacy"
                                                        id="private" value="private">
                                                    <label class="form-check-label" for="private">
                                                        Private
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="privacy"
                                                        id="friends" value="{{$edit_event->privacy }}" checked>
                                                    <label class="form-check-label" for="friends">
                                                        Friends
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb3 guest-box" style="display:none">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="guest_invite"
                                                        id="guest_invite" value="1">
                                                    <label class="form-check-label" for="guest_invite">
                                                        Guests can invite friends <small> (If this is on, guests can
                                                            invite their friends to the event.)</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <hr class="mb-4">
                                            <button class="btn btn-info btn-sm float-right" type="button"
                                                id="event-details">Next</button>
                                            <button class="btn btn-secondary btn-sm float-right mx-2" type="button"
                                                id="event-details-back">Back</button>
                                        </div>
                                    </div>
                                    <div class="locations col-md-8 offset-md-2 bg-light mt-2 p-4" style="display:none">
                                        <h2 class="text-center">Location</h2>
                                        <h6 class="text-muted text-center">Choose a way for people to join your event
                                            online.</h6>
                                            <div class="event-alert-loc">

                                            </div>

                                        <div class="p-3">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-other" type="radio" name="locations"
                                                        id="other" value="other" checked >
                                                    <label class="form-check-label" for="other">
                                                        Other <small>( Mention instructions in your event details
                                                            on how to participate.)</small>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-external_link" type="radio" name="locations"
                                                        id="external_link" value="{{$edit_event->locations }}">
                                                    <label class="form-check-label" for="external_link">
                                                        External Link
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3 mt-3 event_link" style="display: none">
                                                <label for="event_link">Event Link</label>
                                                <input type="text" class="form-control" id="event_link"
                                                    name="event_link">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="event_link">Description</label>
                                                <textarea class="form-control" id="description"
                                                    name="description"></textarea>
                                            </div>
                                            <hr class="mb-4">
                                            <input type="button" id="join" class="btn btn-info btn-sm float-right"
                                                value="Next" />
                                                <input type="button" id="join-back" class="btn btn-secondary btn-sm float-right mx-2"
                                                value="Back" />
                                        </div>
                                    </div>
                                    <div class="addition_relation col-md-8 offset-md-2 bg-light mt-2 p-4"
                                        style="display: none">
                                        <h2 class="text-center">Additional details</h2>
                                        <div class="p-3">
                                            <div class="mb-3 mt-3">
                                                <label for="event_link">Cover photo</label>
                                                <input type="file" class="form-control" id="cover_photo"
                                                    name="cover_photo">
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="event_link">Co-host</label>
                                                <input type="text" class="form-control" id="add_frnd"  placeholder="Add Friend">
                                                <input type="hidden" id="co_host" name="co_host"
                                                >
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="show_guest_list"
                                                    id="show_guest_list" value="1">
                                                <label class="form-check-label" for="show_guest_list">
                                                    Show Guest List
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="admin_add_post"
                                                    id="admin_add_post" value="1">
                                                <label class="form-check-label" for="admin_add_post">
                                                    Only admins can post in event
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="post_approve"
                                                    id="post_approve" value="1">
                                                <label class="form-check-label" for="post_approve">
                                                    Posts must be approved by a host or co-host.
                                                </label>
                                            </div>
                                            <hr class="mb-4">
                                            <button class="btn btn-info btn-sm float-right" id="addition_relation">Submit</button>
                                            <button class="btn btn-info btn-sm float-right mx-2" id="addition_relation-back"
                                                type="button">Back</button>
                                        </div>
                                    </div>
                                </form>
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
    </form>
</div>
<!-- side panel -->
@include('includes/footer')
</body>

</html>
