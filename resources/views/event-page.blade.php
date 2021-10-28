@include('includes/header')

@php
$allusers = alluser1();

@endphp

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
                                            <a title="" class="btn btn-sm btn-secondary text-white"
                                                href="{{ url('/create-event') }}">Create New Event</a>
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
                                                    @if($events->cover_photo)
                                                    <img
                                                        src="{{ asset('upload/images/events/'.$events->cover_photo) }}">
                                                    @else
                                                    <img src="{{ asset('assets/images/default/event_cover.png') }}"
                                                    alt="">
                                                    @endif
                                                </figure>
                                                <div class="outer-div d-flex">
                                                    <div class="calender-icon">
                                                        <span>
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>
                                                        <div class="timing mb-2">
                                                            <small
                                                                class="date-event">{{ date("d-M", strtotime($events->start_date))  }}</small><br>
                                                            <small
                                                                class="hours">{{ date("d-M", strtotime($events->start_date))  }}
                                                                to</small>
                                                            <small
                                                                class="hours">{{ date("d-M", strtotime($events->end_date))  }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="event-head">
                                                        <h2>{{ $events->event_name }}</h2>
                                                        <span>Online Event</span>
                                                    </div>
                                                </div>
                                                <hr style="margin: 0px; margin-top: -60px;">
                                            </div>
                                            <div class="timeline-info">
                                                <ul>
                                                    <li class="about-dis">
                                                        <a class="active" href="javascript: void(0)" id="event_about"
                                                            title="" data-ripple="">About</a>
                                                        <a class="" href="javascript: void(0)" id="event_disc" title=""
                                                            data-ripple="">Discussion</a>
                                                    </li>
                                                    <li class="float-right">
                                                        <a class=""><i class="fa fa-envelope" aria-hidden="true"></i>Invite</a>
                                                        <a class="" href="/edit-event/{{ $id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                                                        <a class=""><i class="fa fa-share" aria-hidden="true"></i> Share</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 about-section">
                                            <div class="about mb-5">
                                                <div class="card w-100">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-dark">Details</h3>
                                                        <div class="pl-3 events-about">
                                                            <p class="card-text"><i class="fa fa-users"
                                                                    aria-hidden="true"></i>&nbsp {{ $respond }} people
                                                                responded</p>
                                                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp
                                                                {{ $events->description }}</p>
                                                            <p><i class="fa fa-users" aria-hidden="true"></i>&nbsp
                                                                {{ date("d-M-Y", strtotime($events->start_date))  }} at
                                                                {{ date("h:i:a", strtotime($events->start_time)) }} --
                                                                {{ date("d-M-Y", strtotime($events->end_date))  }} at
                                                                {{ date("h:i:a", strtotime($events->end_time)) }}</p>
                                                            <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp Events
                                                                by <span>{{ $username }}</span></p>
                                                            <p><i class="fa fa-globe" aria-hidden="true"></i> Privacy
                                                                :&nbsp {{ $events->privacy }}</p>
                                                            <p>{{ $events->description }}</p>
                                                            {{-- <a class="btn btn-sm btn-secondary text-white">Categories</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="about mb-5">
                                                <div class="card w-100">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-dark">Meet your host</h3>
                                                        <div class="card w-100">
                                                            @if($profile_photo)
                                                            <img class="card-img-top"
                                                                src="{{ asset('upload/images/profile_photo/'.$profile_photo) }}"
                                                                alt="Card image cap">
                                                            @else
                                                            <img class="card-img-top"
                                                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c7e290dc7%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c7e290dc7%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                                                alt="Card image cap">
                                                            @endif
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title">{{ $username }}</h5>
                                                                <a href="{{ url('see_friend/').$user_id; }}"
                                                                    class="btn btn-primary w-100"><i
                                                                        class="ti-user"></i>&nbsp View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 about-section">
                                            <div class="about-side-bar">
                                                <div class="card w-100">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Guest</h5>
                                                        <div class="row">
                                                            <div class="col-md-6 text-center">
                                                                <div>
                                                                    <span>{{ $action['going'] }}</span><br><span>Going</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-center">
                                                                <div>
                                                                    <span>{{ $action['interesed'] }}</span><br><span>Interested</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <hr>
                                                        <h5 class="card-title">Go with friends</h5>

                                                        <div class="friend-info">

                                                            @foreach($allusers as $alluser)


                                                            <figure>
                                                                <img src="{{ asset('upload/images/profile_photo/'.$alluser->profile_photo.'') }}"
                                                                    alt="">
                                                            </figure>
                                                            <div class="friendz-meta">
                                                                <a
                                                                    href="/see_friend/{{ $alluser->id }}">{{$alluser->name}}</a>
                                                                <i>{{$alluser->email}}</i>
                                                                <button class="btn btn-sm btn-secondary"
                                                                    id='send_event_invitation'>invite</button>
                                                                <a href="#" id='event_invitation_cancel'
                                                                    style="display: none;">inviatation sent</a>
                                                                <input type="hidden" name="friend_id" id="friend_id"
                                                                    value="{{ $alluser->friends_id  }}" />
                                                                <input type="hidden" name="event_id" id="event_id"
                                                                    value="{{ $events->id }}" />
                                                            </div>

                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-7 disc-section" style="display: none">
                                            <div class="loadMore">
                                                {{-- @foreach($users1 as $user) --}}
                                                @php $get_post_comments = get_post_comments(Auth::id());
                                                @endphp

                                                <div class="central-meta new-pst item">
                                                    <div class="new-postbox">
                                                        <figure>
                                                            <img src="http://127.0.0.1:8000/assets/images/resources/admin2.jpg"
                                                                alt="">
                                                        </figure>
                                                        <div class="newpst-input">
                                                            <form method="post" id="upload_files"
                                                                action="{{url('event_post')}}"
                                                                enctype="multipart/form-data">

                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />
                                                                <textarea rows="2" placeholder="write something"
                                                                    name="msg"></textarea>
                                                                <div class="attachments">
                                                                    <ul>
                                                                        <li class="text-secondary">
                                                                            <i class="fa fa-music text-secondary"></i>
                                                                            <label class="fileContainer">
                                                                                <input type="file" name="music">
                                                                            </label>
                                                                        </li>
                                                                        <li class="text-secondary">
                                                                            <i class="fa fa-image text-secondary"></i>
                                                                            <label class="fileContainer">
                                                                                <input type="file" name="image">
                                                                            </label>
                                                                        </li>
                                                                        <li class="text-secondary">
                                                                            <i
                                                                                class="fa fa-video-camera text-secondary"></i>
                                                                            <label class="fileContainer">
                                                                                <input type="file" name="video">
                                                                            </label>
                                                                        </li>
                                                                        <li class="text-secondary">
                                                                            <i class="fa fa-camera text-secondary"></i>
                                                                            <label class="fileContainer">
                                                                                <input type="file">
                                                                            </label>
                                                                        </li>
                                                                        <li class="text-secondary">
                                                                            <input type="submit"
                                                                                class="btn btn-info btn-sm" id="posts"
                                                                                value="Post">
                                                                            {{--  <input type="hidden" id="u_id" name="u_id" value=""/>  --}}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- add post new box -->
                                            </div>
                                        </div>
                                        <div class="col-lg-7 disc-section">
                                           @foreach($users as $user)
                                                @php $get_post_cmt = get_post_cmt($user->id) @endphp
                                                <div class="">
                                                
                                                <div class="central-meta item bg-white bg-light">
                                                    <div class="user-post">
                                                        <div class="friend-info">
                                                            <figure>
                                                                <img src="{{ asset('assets/images/resources/friend-avatar10.jpg') }}"
                                                                    alt="">
                                                            </figure>
                                                            <span>
                                                                <div class="friend-name">
                                                                    <span>
                                                                        <ins><a href="time-line"
                                                                                title="">{{$user->name}}</a></ins>
                                                                        <div class="post-opt pull-right">
                                                                            <i class="ti-more-alt" data-toggle="popover"
                                                                                data-content="<a href=#null onclick='myFunction()' value='{{ $user->post_id}}' id='edit-post'>Edit</a><br><a class='border-top' href='/delete-post/{{ $user->post_id}}' >Delete</a>"
                                                                                data-placement="left" data-html="true">
                                                                            </i>
                                                                        </div>
                                                                        <div class="col-4 pull-right opt-list"
                                                                            style="display: none">
                                                                            {{--  <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
                                                                sagittis lacus vel augue laoreet rutrum faucibus.">
                                                             Popover on bottom
                                                             </button>  --}}
                                                                            {{--  
                                                             <div class="list-group" data-toggle="popover" data-placement="bottom" id="list-tab" role="tablist">
                                                                <a class="list-group-item">Edit</a>
                                                                <a class="list-group-item" >Delete</a>
                                                             </div>
                                                             </div>
                                                             --}}
                                                                    </span>
                                                                </div>
                                                                <?php
                                                             $timestamp = strtotime($user->created_at);
                                                             
                                                             $day = date('M,d Y H:i A', $timestamp);
                                                             ?>
                                                                <span>published: {{$day}} </span>
                                                            </span>
                                                        </div>
                                                        <div class="post-meta">
                                                            <img src="{{ asset('upload/images/events/'.$user->images) }}"
                                                                alt="">
                                                            @if (!empty($user->videos))
                                                            <video width="320" height="240" autoplay>
                                                                <source src="upload/videos/{{ $user->videos }}"
                                                                    type="video/mp4">
                                                                <source src="upload/videos/{{ $user->videos }}"
                                                                    type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            @endif
                                                            <div class="description">
                                                                <p> {{ $user->content; }} </p>
                                                            </div>
                                                            <div class="we-video-info">
                                                                <span class="reaction event_reaction" id="reaction{{$user->id}}" value="{{$user->id}}">
                                                                    <i id="1"><img src="/assets/images/s_emoji/like.png"
                                                                            class="emoji img-fluid custom-img-height img-event" /></i>
                                                                    <i id="2"><img src="/assets/images/s_emoji/love.png"
                                                                            class="emoji img-fluid custom-img-height img-event" /></i>
                                                                    <i id="3"><img src="/assets/images/s_emoji/haha.png"
                                                                            class="emoji img-fluid custom-img-height img-event" /></i>
                                                                    <i id="4"><img
                                                                            src="/assets/images/s_emoji/angry.png"
                                                                            class="emoji img-fluid custom-img-height img-event" /></i>
                                                                    <i id="5"><img src="/assets/images/s_emoji/care.png"
                                                                            class="emoji img-fluid custom-img-height img-event" /></i>
                                                                    <i id="6"><img src="/assets/images/s_emoji/wow.png"
                                                                            class="emoji img-fluid custom-img-height img-event" /></i>
                                                                    <i id="7"><img src="/assets/images/s_emoji/sad.png"
                                                                            class="emoji img-fluid custom-img-height img-event" /></i>
                                                                </span>
                                                                <ul>
                                                                    <li>
                                                                        <span class="comment text-secondary"
                                                                            data-toggle="tooltip" title="Comments">
                                                                            <i class="fa fa-comments-o text-secondary"></i>
                                                                            <ins>{{$total_comments}}</ins>
                                                                        </span>
                                                                    </li>
                                                                    <li class="emooo">
                                                                        <span class="comment text-secondary"
                                                                            data-toggle="tooltip" title="reaction">
                                                                            <div class="rec" data_id="{{$user->id}}">
                                                                                <span class="rec1">
                                                                                    <img src="/assets/images/s_emoji/like.png"
                                                                                        class="emoji-reaction" />
                                                                                </span>

                                                                                <span class="rec2">
                                                                                    <img src="/assets/images/s_emoji/love.png"
                                                                                        class="emoji-reaction" />
                                                                                </span>

                                                                                <span class="rec3">
                                                                                    <img src="/assets/images/s_emoji/sad.png"
                                                                                        class="emoji-reaction" />
                                                                                </span>
                                                                            </div>
                                                                            <ins class="mrgn">{{ $user->likes }}</ins>
                                                                        </span>
                                                                    </li>
                                                                    <li>

                                                                        <span class="like" id="event_likeId"
                                                                            value="{{$user->id}}">
                                                                            <i class="ti-heart"></i>
                                                                            <ins>{{ $user->likes }}</ins>
                                                                        </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="dislike" data-toggle="tooltip"
                                                                            title="dislike" id="event_dislikeId"
                                                                            value="{{$user->id}}">
                                                                            <i class="ti-heart-broken"></i>
                                                                            <ins>{{ $user->dislikes }}</ins>
                                                                        </span>
                                                                    </li>
                                                                    <li class="social-media">
                                                                        <div class="menu">
                                                                            <div class="btn trigger"><i
                                                                                    class="fa fa-share-alt text-secondary"></i>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-html5
                                                                                        text-secondary"></i></a></div>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-facebook
                                                                                        text-secondary"></i></a></div>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-google-plus
                                                                                        text-secondary"></i></a></div>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-twitter
                                                                                        text-secondary"></i></a></div>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-css3
                                                                                        text-secondary"></i></a></div>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-instagram
                                                                                        text-secondary"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-dribbble
                                                                                        text-secondary"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="rotater">
                                                                                <div class="btn btn-icon"><a href="#"
                                                                                        class="text-secondary"" title=""><i class="
                                                                                        fa fa-pinterest
                                                                                        text-secondary"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="coment-area bg-white bg-light">
                                                        <ul class="we-comet">
                                                            @foreach ($get_post_comments as $comment)

                                                            @php $get_post_comment_like =
                                                            get_post_comment_like($comment->id);
                                                            $is_like =
                                                            isset($get_post_comment_like->is_like)?$get_post_comment_like->is_like:'0';
                                                            @endphp
                                                            <li>
                                                                <div class="comet-avatar">
                                                                    <img src="{{ asset('assets/images/resources/comet-1.jpg') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="we-comment">
                                                                    <div class="coment-head">
                                                                        <h5><a href="time-line"
                                                                                title="">{{$user->name}}</a></h5>
                                                                        <a class="we-reply" href="#" title="Reply"><i
                                                                                class="fa fa-reply text-secondary"></i></a>
                                                                    </div>
                                                                    <p> @php echo $comment->comment @endphp</p>
                                                                </div>
                                                            </li>

                                                            @endforeach

                                                            <div class="post-comt-box">
                                                                <form method="post" id="page_post_comments"
                                                                    enctype="multipart/form-data"
                                                                    action="{{url("homepage")}}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-11 p-0">
                                                                            <textarea placeholder="Post your comment"
                                                                                id="commen_1234" class="comment_1243"
                                                                                name="comment"></textarea>
                                                                        </div>
                                                                        <div class="col-sm-1 p-0">
                                                                            <input type="hidden" name="post_id"
                                                                                id="post_id" value="{{ $user->id }}" />
                                                                            <input type="hidden" name="user_id"
                                                                                id="user_id"
                                                                                value="{{ $user->user_id }}" />
                                                                            <input type="hidden" name="status"
                                                                                id="status" value="1" />
                                                                            <button type="submit"
                                                                                class="btn btn-primary"><i
                                                                                    class="far fa-paper-plane"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </ul>
                                                        {{-- modal for edit post							 --}}
                                                        <div class="modal fade" id="editpost" tabindex="-1"
                                                            aria-hidden="false">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header py-2">
                                                                        <h5 class="modal-title" id="">Edit Post</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" id="edit_form"
                                                                            action="{{ url("edit-post"); }}"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-sm-6">
                                                                                        <div class="card post-card-img">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group">
                                                                                            <label class="text-primary"
                                                                                                for="">Edit</label>
                                                                                            <div id="post_contet">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer py-2">
                                                                        <button type="submit" id="edit-post-submit"
                                                                            class="btn btn-sm btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal  for reactions emoticons-->
                                                        <div class="modal fade" id="reaction" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-md" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header pb-0">
                                                                        <ul class="nav nav-tabs" role="tablist">
                                                                            <li class="nav-link active"
                                                                                role="presentation" class="active"><a
                                                                                    href="#all" class="tab-a" role="tab"
                                                                                    data-toggle="tab">All</a>
                                                                            </li>
                                                                            <li class="nav-link" role="presentation"><a
                                                                                    href="#like" class="tab-a"
                                                                                    role="tab" data-toggle="tab"><img
                                                                                        src="/assets/images/s_emoji/like.png"
                                                                                        class="img-reaction" /><ins
                                                                                        class="ins_like"></ins></a>
                                                                            </li>
                                                                            <li class="nav-link" role="presentation"><a
                                                                                    href="#love" class="tab-a"
                                                                                    role="tab" data-toggle="tab"><img
                                                                                        src="/assets/images/s_emoji/love.png"
                                                                                        class="img-reaction" /><ins
                                                                                        class="ins_love"></ins></a>
                                                                            </li>
                                                                            <li class="nav-link" role="presentation"><a
                                                                                    href="#haha" class="tab-a"
                                                                                    role="tab" data-toggle="tab"><img
                                                                                        src="/assets/images/s_emoji/haha.png"
                                                                                        class="img-reaction" /><ins
                                                                                        class="ins_haha"></ins></a>
                                                                            </li>
                                                                            <li class="nav-link" role="presentation"><a
                                                                                    href="#sad" class="tab-a" role="tab"
                                                                                    data-toggle="tab"><img
                                                                                        src="/assets/images/s_emoji/sad.png"
                                                                                        class="img-reaction" /><ins
                                                                                        class="ins_sad"></ins></a>
                                                                            </li>
                                                                            <li class="nav-link" role="presentation"><a
                                                                                    href="#angry" class="tab-a"
                                                                                    role="tab" data-toggle="tab"><img
                                                                                        src="/assets/images/s_emoji/angry.png"
                                                                                        class="img-reaction" /><ins
                                                                                        class="ins_angry"></ins></a>
                                                                            </li>
                                                                            <li class="nav-link" role="presentation"><a
                                                                                    href="#care" class="tab-a"
                                                                                    role="tab" data-toggle="tab"><img
                                                                                        src="/assets/images/s_emoji/wow.png"
                                                                                        class="img-reaction" /><ins
                                                                                        class="ins_wow"></ins></a>
                                                                            </li>
                                                                            <li class="nav-link" role="presentation"><a
                                                                                    href="#wow" class="tab-a" role="tab"
                                                                                    data-toggle="tab"><img
                                                                                        src="/assets/images/s_emoji/wow.png"
                                                                                        class="img-reaction" /><ins
                                                                                        class="ins_wow"></ins></a>
                                                                            </li>
                                                                        </ul>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="tab-content">
                                                                            <div role="tabpanel"
                                                                                class="tab-pane active allfrnd"
                                                                                id="all"></div>
                                                                            <div role="tabpanel"
                                                                                class="tab-pane like_rc" id="like">
                                                                            </div>
                                                                            <div role="tabpanel" class="tab-pane sad_rc"
                                                                                id="sad"></div>
                                                                            <div role="tabpanel"
                                                                                class="tab-pane love_rc" id="love">
                                                                            </div>
                                                                            <div role="tabpanel"
                                                                                class="tab-pane haha_rc" id="haha">
                                                                            </div>
                                                                            <div role="tabpanel"
                                                                                class="tab-pane angry_rc" id="angry">
                                                                            </div>
                                                                            <div role="tabpanel"
                                                                                class="tab-pane care_rc" id="care">
                                                                            </div>
                                                                            <div role="tabpanel" class="tab-pane wow_rc"
                                                                                id="wow"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

</html>`
