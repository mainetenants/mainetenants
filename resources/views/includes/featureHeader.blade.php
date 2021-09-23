@include('includes/header')
@php
    
	$get_user_data = user_data($id);
    $name = $get_user_data->name;
    $cover_photo = $get_user_data->cover_photo;
    $profile_photo = $get_user_data->profile_photo;
    $get_total_followers = get_total_friend($id);





@endphp

<section>
    <div class="feature-photo">
        <figure>
            @if (isset($cover_photo))
            <img src="{{ asset('upload/images/profile_photo/'.$cover_photo) }}">
            @else
            <img src="{{ asset('assets/images/resources/timeline-1.jpg') }}" alt="">
            @endif
        </figure>
        <div class="add-btn">
            <span>{{ $get_total_followers }}</span>
            @if($frnd_status == 1)
            <a href="{{ url('add_friend/'.$id )}}" title="" data-ripple="">Unfriend</a>
            @elseif($frnd_status == 0)
            <a href="{{ url('cancel_request/'.$id )}}" title="" data-ripple="">Requested</a>
            @else
            <a href="{{ url('add_friend/'.$id )}}" title="" data-ripple="">Add Friends</a>
            @endif
        </div>
        <form action="{{ url('cover_photo') }}" class="edit-phto" id="cover_form"   enctype="multipart/form-data" method="POST">
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Edit Cover Photo
                <input type="file" id="coverid" name="cover_photo"/>
                @csrf
            </label>
        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            @if (isset($profile_photo))
                            <img src="{{ asset('upload/images/profile_photo/'.$profile_photo) }}">
                            @else
                            <img src="{{ asset('assets/images/resources/user-avatar.jpg') }}" alt="">
                            @endif
                            <form action="{{ url('profile_photo') }}" class="edit-phto" id="profile_form" enctype="multipart/form-data" method="POST">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                    <input type="file" id="fileid" name="profile_photo"/>
                                    @csrf
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                            <h5>{{ $name }}</h5>
                            <span>Group Admin</span>
                            </li>
                            <li>
                                <a class="" href="time-line" title="" data-ripple="">time line</a>
                                <a class="" href="timeline-photos" title="" data-ripple="">Photos</a>
                                <a class="" href="timeline-videos" title="" data-ripple="">Videos</a>
                                <a class="" href="timeline-friends" title="" data-ripple="">Friends</a>
                                <a class="" href="timeline-groups" title="" data-ripple="">Groups</a>
                                <a class="active" href="about" title="" data-ripple="">about</a>
                                <a class="" href="#" title="" data-ripple="">more</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- top area -->