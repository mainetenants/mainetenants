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
            <a title="" href="/your-event-event">Your Events</a>
            <ul class="naves">
                <li>
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                    <a title="" href="/going">Going</a>
                </li>
                <li>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <a title="" href="/invited-event">Invitation</a>
                </li>
                <li>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <a title="" href="/interested">Interested</a>
                </li>
                <li>
                    <i class="fa fa-h-square" aria-hidden="true"></i>
                    <a title="" href="/hosting-event">Hosting</a>
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
        <div class="row" id="dashboard">
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
                <div class="col-lg-6 mt-5 col d-flex justify-content-center">
                    <a href="event-page/{{ $event->id }}">
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
                        
                            @if (isset($event->action))
                            <div class="dropdown" id="aaa">
                                @php
                                    if($event->action==1){
                                        $action = "Intereseted";
                                    }elseif($event->action==2) {
                                        $action = "Going";
                                    }elseif($event->action==3) {
                                        $action = "Not Interested";       
                                    }else{
                                        $action='';
                                    }
                                @endphp
                                <input class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" btn-act="{{ $event->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="{{ $action }}">
                                
                                <div class="dropdown-menu px-2 dp-id" aria-labelledby="dropdownMenuButton">
                                    <div class="form-check dropdown-item ">
                                        <label class="form-check-label">
                                            <input type="radio" name="action" class="form-check-input inst-rdo" data-id="{{ $event->id }}" {{ ($event->action==1)?("checked=checked"):("") }}  act-id="1">Interested
                                        </label>
                                    </div>
                                    <div class="form-check dropdown-item ">
                                        <label class="form-check-label">
                                            <input type="radio" name="action" class="form-check-input inst-rdo" data-id="{{ $event->id }}" {{ ($event->action==2)?("checked=checked"):("") }} act-id="2">Going
                                        </label>
                                    </div>
                                    <div class="form-check dropdown-item ">
                                        <label class="form-check-label">
                                            <input type="radio" name="action" class="form-check-input inst-rdo" data-id="{{ $event->id }}" {{ ($event->action==3)?("checked=checked"):("") }} act-id="3">Not Interested
                                        </label>
                                    </div>
                                </div>
                            </div>
                                @else
                                <button class="btn btn-sm btn-info mx-2 float-right inst-btn" data-id="{{ $event->id }}">Interested</button>
                            @endif

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
<div class="col-lg-12">
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
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