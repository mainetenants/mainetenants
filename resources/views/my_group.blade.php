@php

    $get_user_group = get_user_group_details($id);
    $allusers = alluser1();
    $get_page  = get_page($id);   

    $get_like_group_status = get_like_group_status($id);
    $get_group_post = get_group_post($id);
    $get_total_group_like = count(get_total_group_like($id));
    $user_id = Auth::id();
@endphp

@include('includes/header')
<section>
    <div class="feature-photo">
        @if($get_user_group->cover_image == "")
            <figure><img src="{{ asset('assets/images/resources/timeline-4.jpg') }}" alt="">
            </figure>
        @else
            <figure><img class="img-fluid"
                    src="{{ asset('upload/images/thumbnails/'.$get_user_group->cover_image) }}"
                    alt=""></figure>
        @endif

        <div class="add-btn">
           <a class="btn btn-primary" href="#"> <span >{{ $get_total_group_like }}Followers</span></a>


        @if($get_user_group->user_id != $user_id)
           <a href="#"  id="like_group" @if($get_like_group_status == 1) style="display:none;" @endif title="" data-ripple="">like Page</a>
            <a href="#"  id="unlike_group" title=""   @if($get_like_group_status == null) style="display:none;" @endif   data-ripple="">liked <i class="fa fa-check" style="display:none;" aria-hidden="true"></i></a>
        @else @endif 
            <input type="hidden" id="like_group_id" name="like_group_id" value="{{ $get_user_group->id }}"/>
            <input type="hidden" id="like_friend_id" name="like_friend_id" value="{{ $get_user_group->user_id }}" />
        </div>
        <form method='post' class="edit-phto" id="edit_group_cover_photo"
            action="{{ url('edit_group_cover_pic') }}" enctype="multipart/form-data">
            @csrf
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Edit page Cover Photo
                <input type="file" id="file_group_cover_chnage" name="file_group_cover_chnage" value="" />
                <input type="hidden" id="group_id" name="group_id" value="{{ $get_user_group->id }}" />
            </label>
        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            @if($get_user_group->profile_picture == "")
                                <img src="{{ asset('assets/images/resources/user-avatar2.jpg') }}"
                                    alt="">
                            @else
                                <img src="{{ asset('upload/images/profile_photo/'.$get_user_group->profile_picture) }}"
                                    alt="" />
                            @endif
                            <form class="edit-phto" action="{{ url('edit_group_profile_pic') }}"
                                method="post" id="submit_group_profile_photo" enctype="multipart/form-data">
                                @csrf
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit page Photo
                                    <input type="file" id="fileid_change" name="profile_photo" />
                                    <input type="hidden" name="group_id" class="group_id"
                                        value="{{ $get_user_group->id }}" />
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5>{{ $get_user_group->group_name }}</h5>
                                <h6><i class="mr-2">Created By :<a href="/see_friend/{{ $get_user_group->user_id }}">@
                                            {{ get_user_nane1($get_user_group->user_id) }}</a>
                                        .</i>{{ $get_user_group->group_category }}
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
</section>

<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row merged20" id="page-contents">
                        <div class="col-lg-3">
                            <aside class="sidebar static left">
                                <div class="widget bg-white bg-light">
                                    <h4 class="widget-title bg-white bg-light">Manage Pages</h4>
                                    <ul class="naves">
                                        <li>
                                            <i class="ti-home text-secondary"></i>
                                            <a href="../homepage" class="text-secondary" title="">Home</a>
                                        </li>
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
                                            <a href="../fav-page/@php echo get_page_id() @endphp" class="text-secondary"
                                                title="">My pages</a>
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
                                            <i class="ti-share text-secondary"></i>
                                            <a href="../people-nearby" class="text-secondary" title="">People Nearby</a>
                                        </li>
                                        <li class="test">
                                            <i class="ti-power-off text-secondary"></i>
                                            <form method="post" id="logout_id"
                                                action="{{ url("logout"); }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <a href="javascript:$('#logout_id').submit();"
                                                    class="text-secondary">Logout</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-6">
                            <div class="central-meta new-pst">
                                <div class="new-postbox">
                                    <figure><img
                                            src="{{ asset('assets/images/resources/admin3.jpg') }}"
                                            alt="">
                                    </figure>
                                    <div class="newpst-input">
                                        <form method="post" action="{{ url('add_group_post') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <p class="lead emoji-picker-container">
                                                <textarea rows="3" name="msg" id="msg" placeholder="write something"
                                                    name="msg" data-emojiable="true"
                                                    data-emoji-input="unicode"></textarea>
                                            </p>
                                            <div class="attachments">
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-music"></i>
                                                        <label class="fileContainer">
                                                            <input type="file" name="music">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-image"></i>
                                                        <label class="fileContainer">
                                                            <input type="file" name="image">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-video-camera"></i>
                                                        <label class="fileContainer">
                                                            <input type="file" name="video">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-camera"></i>
                                                        <label class="fileContainer">
                                                            <input type="file">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <button type="submit">Publish</button>
                                                        <input type="hidden" name="group_id" id="group_id"
                                                            value="{{ $id }}" />
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @foreach($get_group_post as $post)
                                <div class="loadMore">
                                    <div class="  central-meta item bg-white bg-light" style="display: inline-block;">
                                        <div class="user-post">
                                            <div class="friend-info">
                                                <figure>
                                                    <img src="http://localhost:8000/assets/images/resources/friend-avatar10.jpg"
                                                        alt="">

                                                </figure>
                                                <span>
                                                    <div class="friend-name">
                                                        <span>
                                                            <ins><a href="time-line"
                                                                    title="">{{ get_user_nane1($post->user_id) }}</a></ins>
                                                            <div class="post-opt pull-right">
                                                                <i class="ti-more-alt" data-toggle="popover"
                                                                    data-content="<a href=#null onclick='myFunction()' value='4' id='edit-post'>Edit</a><br><a class='border-top' href='/delete-post/4' >Delete</a>"
                                                                    data-placement="left" data-html="true"
                                                                    data-original-title="" title="">
                                                                </i>
                                                            </div>
                                                            <div class="col-4 pull-right opt-list"
                                                                style="display: none">
                                                            </div>
                                                            <span>published:{{ $post->created }}</span>
                                                        </span></div>
                                                </span>
                                                <div class="post-meta">
                                                    <div class="description">
                                                        @if($post->images != "")
                                                            <img src="upload/images/{{ $user->images; }}" alt="">
                                                        @elseif($post->videos !="")
                                                            <video width="100%" height="400" controls>
                                                                <source src="upload/videos/{{ $post->videos }}" type="video/mp4">
                                                                <source src="upload/videos/{{ $post->videos }}" type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @elseif($post->music !="")
                                                        <audio controls>
                                                            <source src="upload/music/{{ $post->music }}"" type="audio/ogg">
                                                            <source src="upload/music/{{ $post->music }}"" type="audio/mpeg">
                                                          Your browser does not support the audio element.
                                                          </audio>
                                                        @endif
                                                        <p>
                                                            {{ $post->content }}
                                                        </p>
                                                    </div>
                                                    <div class="we-video-info">
                                                        <span class="reaction" value="4">
                                                            <i id="1"><img src="/assets/images/s_emoji/like.png"
                                                                    class="emoji img-fluid custom-img-height"></i>
                                                            <i id="2"><img src="/assets/images/s_emoji/love.png"
                                                                    class="emoji img-fluid custom-img-height"></i>
                                                            <i id="3"><img src="/assets/images/s_emoji/haha.png"
                                                                    class="emoji img-fluid custom-img-height"></i>
                                                            <i id="4"><img src="/assets/images/s_emoji/angry.png"
                                                                    class="emoji img-fluid custom-img-height"></i>
                                                            <i id="5"><img src="/assets/images/s_emoji/care.png"
                                                                    class="emoji img-fluid custom-img-height"></i>
                                                            <i id="6"><img src="/assets/images/s_emoji/wow.png"
                                                                    class="emoji img-fluid custom-img-height"></i>
                                                            <i id="7"><img src="/assets/images/s_emoji/sad.png"
                                                                    class="emoji img-fluid custom-img-height"></i>
                                                        </span>
                                                        <ul>
                                                            <li>
                                                                <span class="views text-secondary" data-toggle="tooltip"
                                                                    title="" data-original-title="views">
                                                                    <i class="fa fa-eye text-secondary"></i>
                                                                    <ins>1.2k</ins>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span class="comment text-secondary"
                                                                    data-toggle="tooltip" title=""
                                                                    data-original-title="Comments">
                                                                    <i class="fa fa-comments-o text-secondary"></i>
                                                                    <ins>52</ins>
                                                                </span>
                                                            </li>
                                                            <li class="emooo">
                                                                <span class="comment text-secondary"
                                                                    data-toggle="tooltip" title=""
                                                                    data-original-title="reaction">
                                                                    <div class="rec" data_id="4">
                                                                        <span class="rec1">
                                                                            <img src="/assets/images/s_emoji/like.png"
                                                                                class="emoji-reaction">
                                                                        </span>

                                                                        <span class="rec2">
                                                                            <img src="/assets/images/s_emoji/love.png"
                                                                                class="emoji-reaction">
                                                                        </span>

                                                                        <span class="rec3">
                                                                            <img src="/assets/images/s_emoji/sad.png"
                                                                                class="emoji-reaction">
                                                                        </span>
                                                                    </div>
                                                                    <ins class="mrgn"></ins>
                                                                </span>
                                                            </li>
                                                            <li>

                                                                <span class="like" id="likeId" value="4">
                                                                    <i class="ti-heart"></i>
                                                                    <ins></ins>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span class="dislike" data-toggle="tooltip" title=""
                                                                    id="dislikeId" value="4"
                                                                    data-original-title="dislike">
                                                                    <i class="ti-heart-broken"></i>
                                                                    <ins></ins>
                                                                </span>
                                                            </li>
                                                            <li class="social-media">
                                                                <div class="menu">
                                                                    <div class="btn trigger"><i
                                                                            class="fa fa-share-alt text-secondary"></i>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-html5 text-secondary"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-facebook text-secondary"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-google-plus
                                                                                text-secondary"></i></a></div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-twitter text-secondary"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-css3 text-secondary"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-instagram text-secondary"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-dribbble text-secondary"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="rotater">
                                                                        <div class="btn btn-icon"><a href="#"
                                                                                class="text-secondary" "="" title=""><i class="
                                                                                fa fa-pinterest text-secondary"></i></a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="coment-area bg-white bg-light">
                                                <ul class="we-comet list-comment-box">
                                                     @php $get_total_group_cmt = get_total_group_cmt($post->id);  @endphp
                                                    
                                                    @foreach($get_total_group_cmt  as $comment)

                                                    

                                                    @php $get_total_group_reply_cmt = get_total_group_reply_cmt($comment->id); 
                                                         $get_comment_like_comment = get_group_like_comment($comment->id);
                                                    @endphp

                                                    <li>
                                                      <div class="comet-avatar">
                                                          <img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">
                                                      </div>
                                                      <div class="we-comment">
                                                        <div class="coment-head">
                                                          <h5><a href="time-line" title="">{{ get_user_nane1($comment->user_id) }}</a></h5>
                                                          <a class="like" id="like{{ $comment->id }}" onclick="like_group_cmt({{ $comment->id }})" onsubmit="return false" href="#"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>                                     
                                                          <a class="dislike" id="dislike{{ $comment->id }}" onclick="dislike_group_cmt({{ $comment->id }})" onsubmit="return false"  href="#"><i class="fa fa-thumbs-up  icon-color text-primary" aria-hidden="true"></i></a>                                     
                                                          <a class="we-reply-group" href="#" onclick="return false" data-id="{{ $comment->id }}" post-id="{{ $post->id }}" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>
                                                          <a class="delete" href="#" onclick="delete_post_comment(5)"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                                        </div>
                                                        @php echo $comment->comment  @endphp
                                                      </div>
                                                      <ul>
                                                        @foreach($get_total_group_reply_cmt as $inner_comment)
                                                        <li>
                                                            <div class="comet-avatar">
                                                                <img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">
                                                            </div>
                                                            <div class="we-comment">
                                                              <div class="coment-head">
                                                                <h5><a href="time-line" title="">{{ get_user_nane1($inner_comment->user_id) }}</a></h5>
                                                                <a class="like" onclick="like_post_cmt(5,2)" href="#"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>                                     
                                                                <a class="we-reply-group" href="#" onclick="return false" data-id="{{ $comment->id }}" post-id="{{ $post->id }}" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>
                                                                <a class="delete" href="#" onclick="delete_post_comment(5)"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                                              </div>
                                                              @php echo $inner_comment->comment  @endphp
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                      </ul>
                                                     
                                                    </li>
                                                    @endforeach
                                                    <div class="list-comment-box{{  $post->id   }}" id="list-comment-box"></div>

                                                    <div class="post-comt-box">
                                                        <form method="post" id="page_group_comments{{ $post->id }}" enctype="multipart/form-data" onsubmit="return false">
                                                            @csrf
                                                                <div class="row">
                                                                <div class="col-sm-11">
                                                                    <textarea placeholder="Post your comment"
                                                                        id="comment{{ $post->id }}" class="comment_1243"
                                                                         name="comment"      
                                                                        aria-hidden="true"></textarea>
                                                                
                                                                </div>
                                                                <div class="col-sm-1">
                                                                    <input type="hidden" name="group_id" id="group_id"
                                                                        value="{{ $id }}">

                                                                    <input type="hidden" name="post_id" class="post_id" id="post_id" value="{{ $post->id }}"/>    
                                                                    <input type="hidden" name="type" id="type" value="group"/>
                                                                    <input type="hidden" name="p_comment" class="p_comment" value =""/>

                                                                    <button type="button" id="" data-id="{{ $post->id }}" name="page_group_comments" class="btn btn-primary page_group_comments"><i
                                                                            class="far fa-paper-plane"></i></button>
                                                                </div>
                                                            </div>
                                                        </form>   
                                                      
                                                    </div>
                                                </ul>

                                                <div class="modal fade" id="editpost" tabindex="-1" aria-hidden="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header py-2">
                                                                <h5 class="modal-title" id="">Edit Post</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" id="edit_form"
                                                                    action="http://localhost:8000/edit-post"
                                                                    enctype="multipart/form-data">
                                                                    <input type="hidden" name="_token"
                                                                        value="92WrQjqjgA0AGo6hIGxUHMgYefdvea3LpVy30jaw">
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
                                                                                    <div id="post_content">
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
                                                <div class="modal fade" id="reaction" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header pb-0">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    <li class="nav-link active" role="presentation"><a
                                                                            href="#all" class="tab-a" role="tab"
                                                                            data-toggle="tab">All</a>
                                                                    </li>
                                                                    <li class="nav-link" role="presentation"><a
                                                                            href="#like" class="tab-a" role="tab"
                                                                            data-toggle="tab"><img
                                                                                src="/assets/images/s_emoji/like.png"
                                                                                class="img-reaction"><ins
                                                                                class="ins_like"></ins></a>
                                                                    </li>
                                                                    <li class="nav-link" role="presentation"><a
                                                                            href="#love" class="tab-a" role="tab"
                                                                            data-toggle="tab"><img
                                                                                src="/assets/images/s_emoji/love.png"
                                                                                class="img-reaction"><ins
                                                                                class="ins_love"></ins></a>
                                                                    </li>
                                                                    <li class="nav-link" role="presentation"><a
                                                                            href="#haha" class="tab-a" role="tab"
                                                                            data-toggle="tab"><img
                                                                                src="/assets/images/s_emoji/haha.png"
                                                                                class="img-reaction"><ins
                                                                                class="ins_haha"></ins></a>
                                                                    </li>
                                                                    <li class="nav-link" role="presentation"><a
                                                                            href="#sad" class="tab-a" role="tab"
                                                                            data-toggle="tab"><img
                                                                                src="/assets/images/s_emoji/sad.png"
                                                                                class="img-reaction"><ins
                                                                                class="ins_sad"></ins></a>
                                                                    </li>
                                                                    <li class="nav-link" role="presentation"><a
                                                                            href="#angry" class="tab-a" role="tab"
                                                                            data-toggle="tab"><img
                                                                                src="/assets/images/s_emoji/angry.png"
                                                                                class="img-reaction"><ins
                                                                                class="ins_angry"></ins></a>
                                                                    </li>
                                                                    <li class="nav-link" role="presentation"><a
                                                                            href="#care" class="tab-a" role="tab"
                                                                            data-toggle="tab"><img
                                                                                src="/assets/images/s_emoji/care.png"
                                                                                class="img-reaction"><ins
                                                                                class="ins_care"></ins></a>
                                                                    </li>
                                                                    <li class="nav-link" role="presentation"><a
                                                                            href="#wow" class="tab-a" role="tab"
                                                                            data-toggle="tab"><img
                                                                                src="/assets/images/s_emoji/wow.png"
                                                                                class="img-reaction"><ins
                                                                                class="ins_wow"></ins></a>
                                                                    </li>
                                                                </ul>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="tab-content">
                                                                    <div role="tabpanel" class="tab-pane active allfrnd"
                                                                        id="all"></div>
                                                                    <div role="tabpanel" class="tab-pane like_rc"
                                                                        id="like"></div>
                                                                    <div role="tabpanel" class="tab-pane sad_rc"
                                                                        id="sad"></div>
                                                                    <div role="tabpanel" class="tab-pane love_rc"
                                                                        id="love"></div>
                                                                    <div role="tabpanel" class="tab-pane haha_rc"
                                                                        id="haha"></div>
                                                                    <div role="tabpanel" class="tab-pane angry_rc"
                                                                        id="angry"></div>
                                                                    <div role="tabpanel" class="tab-pane care_rc"
                                                                        id="care"></div>
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
                                </div>
                            @endforeach

                        </div>


                        <!-- centerl meta -->
                        <div class="col-lg-3">
                            <aside class="sidebar static">
                                @include('includes/advertisement')
                                

                                <div class="widget">
                                    <h4 class="widget-title">Invite friends</h4>
                                    <ul class="invition">
                                        @foreach($allusers as $alluser)
                                       <li>
                                            <figure>
                                                <img src="{{ asset('upload/images/profile_photo/'.$alluser->profile_photo.'') }}" alt="">
                                            </figure>
                                            <div class="friendz-meta">
                                                <a href="/see_friend/{{ $alluser->id }}">{{$alluser->name}}</a>
                                                <i>{{$alluser->email}}</i>
                                                <a href="#" id='send_group_invitation'>invite</a>
                                                <a href="#" id='group_invitation_cancel' style="display: none;" >invitation sent</a>
                                                <input type="hidden" name="type" id='type' value="group"/>
                                                <input type="hidden" name="friend_id" id="friend_id" value ="{{ $alluser->friends_id  }}"/>
                                                <input type="hidden" name="post_id"  id="post_id" value ="{{ $get_user_group->id }}"/>
                                            </div>
                                        </li>
                                        @endforeach 
                                    </ul>
                                </div><!-- invite for page  -->
                                    
                                @include('includes/friends')
                            </aside>
                        </div>
                        <!-- sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('includes/footer')
