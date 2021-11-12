@include('includes/header')

@php 
    $user_id = Auth::id();
@endphp 

   <section>
   <div class="gap gray-bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="row merged20" id="page-contents">
                  @include('includes/left-sidebar')			
                  <div class="col-lg-6">
                     <div class="central-meta new-pst bg-white bg-light">
                        <div class="new-postbox">
                           <figure>
                              <img src="{{ asset('assets/images/resources/admin2.jpg') }}" alt="">
                           </figure>
                           <div class="newpst-input">
                              @if ($errors->any())
                              <div class="alert alert-secondary" role="alert">
                                 <div class="alert-icon">
                                    <i class="flaticon-warning  text-secondary"></i>
                                 </div>
                                 <div class="alert-text">
                                    <ul>
                                       @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                              <br />
                              @endif
                              @if ($message = Session::get('success'))
                              <div class="alert alert-success alert-block">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>{{ $message }}</strong>
                              </div>
                              @endif
                              <form method="post" id="upload_files" action="get-post-list" enctype="multipart/form-data">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                 <p class="lead emoji-picker-container">
                                          
                                 <textarea rows="2" placeholder="write something" name="msg" data-emojiable="true" data-emoji-input="unicode"></textarea>
                                 </p>
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
                                          <i class="fa fa-video-camera text-secondary"></i>
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
                                          <a href="#" data-toggle="modal" data-target="#exampleModal">
                                          <i class="fas fa-poll"></i>
                                          <label class="fileContainer">
                                          </label>
                                          </a>
                                       </li>
                                       <li class="text-secondary">
                                          <input type="submit" class="btn btn-info btn-sm" id="posts" value="Post">
                                       </li>
                                    </ul>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>

                     
                 
               <!-- Centerl meta -->
               <div class="loadMore">
                      
               @foreach($users1 as $user)
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
                                                        title="">{{ $user->name }}</a></ins>
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
                                                <span>published:{{ $user->created }}</span>
                                        </span></div>
                                </span>
                                <div class="post-meta">
                                        <div class="description">
                                        @if($user->images != "")
                                                <img src="upload/images/{{ $user->images; }}" alt="">
                                        @elseif($user->videos !="")
                                                <video width="100%" height="400" controls>
                                                <source src="upload/videos/{{ $user->videos }}" type="video/mp4">
                                                <source src="upload/videos/{{ $user->videos }}" type="video/ogg">
                                                Your browser does not support the video tag.
                                                </video>
                                        @elseif($user->music !="")
                                            <audio controls>
                                                <source src="upload/music/{{ $user->music }}"" type="audio/ogg">
                                                <source src="upload/music/{{ $user->music }}"" type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        @elseif($user->poll_id != "")
                                        @php 
                                               $get_poll_created = get_poll_created($user->poll_id);
                                               $get_poll_result = get_poll_result($user->poll_id);
                                                $get_poll_12 = isset($get_poll_result->value)?$get_poll_result->value:0;
                                                $get_user_12 = isset($get_poll_result->user_id)?$get_poll_result->user_id:0;
                                                
                                               $get_poll  = explode(',',$get_poll_created->poll0);
                                                
                                         @endphp
                                        
        
                                     <div class="row">
                                        <div class="description">
                                           <p> {{ $get_poll_created->poll_title}} </p>
                                         </div>
                                         <div class="card bg-light col-sm-12">
                                            @foreach($get_poll  as $poll)
                                         @php print_r($poll); @endphp
                                            <div class="form-group text-center ">
                                                     <label for="exampleInputEmail1"  style="display: flex;width: 50%;"> <input type="radio" class="form-control poll_radio text-right" id="exampleInputEmail1" aria-describedby="emailHelp" @if( $get_poll_12 == $poll ) checked="true" @endif name="poll_choosen" placeholder="Enter email" value="{{ $poll }}"><span>{{ $poll }}</span></label>
                                                     @php
                                                          $get_total_poll_count = get_total_poll_count($poll,$user->poll_id);
                                                          $get_total_poll = get_total_poll($user->poll_id);
                                                          $percentage = isset($get_poll_result->value)? floor($get_total_poll_count/$get_total_poll *100) :0;
                                                     @endphp
                                                     <div id="progress">
                                                        <progress id="file" value="{{ $percentage }}" max="100"> 32% </progress>
                                                    </div>
                                                  </div>
                                                  <input type="hidden" id="checked_poll_id" name="checked_poll_id"  @if($get_poll_12 == $poll && $get_user_12 == $user_id)  value="{{ $get_poll_result->id }}" @else value="" @endif/>
                                               @endforeach
                                               
                                               <input type="hidden" id="poll_id" name="poll_id" value ="{{ $user->poll_id }}"/>
                                               <input type="hidden" id="poll_post_id" name="poll_post_id" value ="{{ $user->id }}"/>
                                          
                                          </div> 
                                     </div>
                                                    
                                        @endif
                                        <p>
                                                {{ $user->content }}
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
                                        @php $get_total_group_cmt = get_total_group_cmt($user->id);  @endphp
                                        
                                        @foreach($get_total_group_cmt  as $comment)

                                        

                                        @php $get_total_group_reply_cmt = get_total_group_reply_cmt($comment->id); 
                                                $get_comment_like_comment1 = get_group_like_comment($comment->id);
                                                $get_comment_like_comment =!empty($get_comment_like_comment1)? 
                                                
                                                $get_comment_like_comment1->is_like:0;
                                        
                                        @endphp

                                        <li>
                                        <div class="comet-avatar">
                                                <img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">
                                        </div>
                                        <div class="we-comment" id="outer_comment{{ $comment->id }}">
                                        <div class="coment-head">
                                                <h5><a href="time-line" title="">{{ get_user_nane1($comment->user_id) }}</a></h5>
                                                <a  id="like{{ $comment->id }}"  href="#outer_comment{{ $comment->id }}"onsubmit="return false" @if($get_comment_like_comment == 1) class="is_seen" @endif  onclick="like_group_cmt({{ $comment->id }})" onsubmit="return false" ><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>                                     
                                                <a  id="dislike{{ $comment->id }}" onsubmit="return false" @if($get_comment_like_comment == 0) class="is_seen" @endif onclick="dislike_group_cmt({{ $comment->id }})" onsubmit="return false"  href="#outer_comment{{ $comment->id }}"><i class="fa fa-thumbs-up  icon-color text-primary" aria-hidden="true"></i></a>                                     
                                                <a class="we-reply-group" href="#outer_comment{{ $comment->id }}" onclick="return false" data-id="{{ $comment->id }}" post-id="{{ $user->id }}" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>
                                                <a class="delete" href="#outer_comment{{ $comment->id }}" onclick="delete_group_comment({{ $comment->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                                <a class="edit" href="#outer_comment{{ $comment->id }}" onclick="edit_group_comment({{ $comment->id }})"><i class="fas fa-edit"></i></a>
                                        </div>
                                        @php echo $comment->comment  @endphp
                                        <input type="hidden" id="outer_comment_text{{ $comment->id }}" name="outer_comment_text" value="<?php echo  $comment->comment ?>"/>
                                        </div>
                                        <ul class="list_group_reply_comment{{ $comment->id }}">
                                        @foreach($get_total_group_reply_cmt as $inner_comment)
                                                @php
                                                        $get_group_like_reply_comment1 = get_group_like_reply_comment($inner_comment->id);
                                                        $get_group_like_reply_comment = isset($get_group_like_reply_comment1)? $get_group_like_reply_comment1->is_like : 0;
                                                @endphp
                                        <li>
                                                <div class="comet-avatar">
                                                <img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">
                                                </div>
                                                <div class="we-comment" id="we-comment{{ $inner_comment->id }}">
                                                <div class="coment-head">
                                                        <h5><a href="time-line" title="">{{ get_user_nane1($inner_comment->user_id) }}</a></h5>
                                                        <a id="like_reply{{ $inner_comment->id  }}" @if($get_group_like_reply_comment == 1) class="is_seen" @endif onclick="like_group_reply_cmt({{ $inner_comment->id }})" href="#we-comment{{ $inner_comment->id }}"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>                                     
                                                        <a id="dislike_reply{{ $inner_comment->id  }}" @if($get_group_like_reply_comment == 0) class="is_seen" @endif onclick="dislike_group_reply_cmt({{ $inner_comment->id }})" href="#we-comment{{ $inner_comment->id }}"><i class="fa fa-thumbs-up  icon-color text-primary" aria-hidden="true"></i></a>                                     
                                                
                                                        <a class="we-reply-group" href="#we-comment{{ $inner_comment->id }}" onclick="return false" data-id="{{ $comment->id }}" post-id="{{ $user->id }}" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>
                                                        <a class="delete" href="#we-comment{{ $inner_comment->id }}" onclick="delete_group_reply_comment({{ $inner_comment->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                                        <a class="edit" href="#we-comment{{ $inner_comment->id }}" onclick="edit_group_reply_comment({{ $inner_comment->id }})"><i class="fas fa-edit"></i></a>     
                                                </div>
                                                @php echo $inner_comment->comment  @endphp
                                                <input type="hidden" name="inner_comment_text" id="inner_comment_text{{ $inner_comment->id }}" value="{{  $inner_comment->comment  }}"/>
                                                <input type="hidden" name="inner_comment_id" id="inner_comment_id{{ $inner_comment->id }}" value ="{{ $inner_comment->id }}" />
                                                </div>
                                        </li>
                                        @endforeach
                                        </ul>
                                        
                                        </li>
                                        @endforeach
                                        <div class="list-comment-box{{  $user->id   }}" id="list-comment-box"></div>

                                        <div class="post-comt-box">
                                        <form method="post" id="page_group_comments{{ $user->id }}" enctype="multipart/form-data" onsubmit="return false">
                                                @csrf
                                                <div class="row">
                                                <div class="col-sm-11">
                                                        <textarea placeholder="Post your comment"
                                                        id="comment{{ $user->id }}" class="comment_1243"
                                                                name="comment"      
                                                        aria-hidden="true"></textarea>
                                                
                                                </div>
                                                <div class="col-sm-1">
                                                        
                                                        <input type="hidden" name="post_id" class="post_id" id="post_id" value="{{ $user->id }}"/>    
                                                        <input type="hidden" name="type" id="type" value="group"/>
                                                        <input type="hidden" name="p_comment" class="p_comment" value =""/>
                                                        <button type="button" id="" data-id="{{ $user->id }}" name="page_group_comments" class="btn btn-primary page_group_comments"><i
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
                       

                @endforeach

               </div>
               <div class="loadMore">
                @foreach($users as $user)
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
                                                      title="">{{ $user->name }}</a></ins>
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
                                              <span>published:{{ $user->created }}</span>
                                          </span></div>
                                  </span>
                                  <div class="post-meta">
                                      <div class="description">
                                          @if($user->images != "")
                                              <img src="upload/images/{{ $user->images; }}" alt="">
                                          @elseif($user->videos !="")
                                              <video width="100%" height="400" controls>
                                                  <source src="upload/videos/{{ $user->videos }}" type="video/mp4">
                                                  <source src="upload/videos/{{ $user->videos }}" type="video/ogg">
                                                  Your browser does not support the video tag.
                                              </video>
                                          @elseif($user->music != "")
                                          <audio controls>
                                              <source src="upload/music/{{ $user->music }}"" type="audio/ogg">
                                              <source src="upload/music/{{ $user->music }}"" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                            </audio>
                                           @elseif($user->poll_id != "")
                                            @php 
                                               $get_poll_created = get_poll_created($user->poll_id);
                                                $get_poll_result = get_poll_result($user->poll_id);
                                                $get_poll_12 = isset($get_poll_result->value)?$get_poll_result->value:0;
                                                $get_user_12 = isset($get_poll_result->value)?$get_poll_result->value:0;
                                               $get_poll  = explode(',',$get_poll_created->poll0);
                                               
                                             @endphp

                                        
               
                                            <div class="row">
                                               <div class="description">
                                                  <p> {{ $get_poll_created->poll_title}} </p>
                                                </div>
                                                <div class="card bg-light col-sm-12">
                                           
                                                        @foreach($get_poll  as $poll)


                                                   
                                                         <div class="form-group text-center ">
                                                            <label for="exampleInputEmail2"  style="display: flex;width: 50%;"> <input type="radio" class="form-control poll_radio text-right exampleInputEmail2" id="exampleInputEmail2" aria-describedby="emailHelp" name="poll_choosen" @if( $get_poll_12  == $poll && $get_user_12 == $user_id) checked="true" @endif placeholder="Enter email"  value="{{ $poll }}"><span>{{ $poll }}</span></label>
                                                            @php
                                                                $get_total_poll_count = get_total_poll_count($poll,$user->poll_id);
                                                                $get_total_poll = get_total_poll($user->poll_id);
                                                                $percentage = isset($get_poll_result->value)? floor($get_total_poll_count/$get_total_poll *100) :0;
                                                            @endphp
                                                            <div id="progress">
                                                               <progress id="file" value="{{  $percentage  }}" max="100"> 32% </progress>
                                                            </div>
                                                            <input type="hidden" id="checked_poll_id1" @if( $get_poll_12  == $poll && $get_user_12 == $user_id)  value="{{$get_poll_result->id}}"   @else value="" @endif />
                                                            @endforeach
                                                            
                                                            <input type="hidden" id="poll_id1" name="poll_id1" value ="{{ $user->poll_id }}"/>
                                                            <input type="hidden" id="poll_post_id1" name="poll_post_id1" value ="{{ $user->id }}"/>
                                                         </div>
                                                </div> 
                                            </div>
                                          @endif   
                                          <p>
                                              {{ $user->content }}
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
                                       @php $get_total_group_cmt = get_total_group_cmt($user->id);  @endphp
                                      
                                      @foreach($get_total_group_cmt  as $comment)

                                      

                                      @php $get_total_group_reply_cmt = get_total_group_reply_cmt($comment->id); 
                                           $get_comment_like_comment1 = get_group_like_comment($comment->id);
                                           $get_comment_like_comment =!empty($get_comment_like_comment1)? $get_comment_like_comment1->is_like:0;
                                              
                                      @endphp

                                      <li>
                                        <div class="comet-avatar">
                                            <img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">
                                        </div>
                                        <div class="we-comment" id="outer_comment{{ $comment->id }}">
                                          <div class="coment-head">
                                            <h5><a href="time-line" title="">{{ get_user_nane1($comment->user_id) }}</a></h5>
                                            <a  id="like{{ $comment->id }}"  href="#outer_comment{{ $comment->id }}"onsubmit="return false" @if($get_comment_like_comment == 1) class="is_seen" @endif  onclick="like_group_cmt({{ $comment->id }})" onsubmit="return false" ><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>                                     
                                            <a  id="dislike{{ $comment->id }}" onsubmit="return false" @if($get_comment_like_comment == 0) class="is_seen" @endif onclick="dislike_group_cmt({{ $comment->id }})" onsubmit="return false"  href="#outer_comment{{ $comment->id }}"><i class="fa fa-thumbs-up  icon-color text-primary" aria-hidden="true"></i></a>                                     
                                            <a class="we-reply-group" href="#outer_comment{{ $comment->id }}" onclick="return false" data-id="{{ $comment->id }}" post-id="{{ $user->id }}" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>
                                            <a class="delete" href="#outer_comment{{ $comment->id }}" onclick="delete_group_comment({{ $comment->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                            <a class="edit" href="#outer_comment{{ $comment->id }}" onclick="edit_group_comment({{ $comment->id }})"><i class="fas fa-edit"></i></a>
                                          </div>
                                          @php echo $comment->comment  @endphp
                                          <input type="hidden" id="outer_comment_text{{ $comment->id }}" name="outer_comment_text" value="<?php echo  $comment->comment ?>"/>
                                        </div>
                                        <ul class="list_group_reply_comment{{ $comment->id }}">
                                          @foreach($get_total_group_reply_cmt as $inner_comment)
                                                @php
                                                   $get_group_like_reply_comment1 = get_group_like_reply_comment($inner_comment->id);
                                                   $get_group_like_reply_comment = isset($get_group_like_reply_comment1)? $get_group_like_reply_comment1->is_like : 0;
                                               @endphp
                                          <li>
                                              <div class="comet-avatar">
                                                  <img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">
                                              </div>
                                              <div class="we-comment" id="we-comment{{ $inner_comment->id }}">
                                                  <div class="coment-head">
                                                      <h5><a href="time-line" title="">{{ get_user_nane1($inner_comment->user_id) }}</a></h5>
                                                      <a id="like_reply{{ $inner_comment->id  }}" @if($get_group_like_reply_comment == 1) class="is_seen" @endif onclick="like_group_reply_cmt({{ $inner_comment->id }})" href="#we-comment{{ $inner_comment->id }}"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>                                     
                                                      <a id="dislike_reply{{ $inner_comment->id  }}" @if($get_group_like_reply_comment == 0) class="is_seen" @endif onclick="dislike_group_reply_cmt({{ $inner_comment->id }})" href="#we-comment{{ $inner_comment->id }}"><i class="fa fa-thumbs-up  icon-color text-primary" aria-hidden="true"></i></a>                                     
                                                  
                                                      <a class="we-reply-group" href="#we-comment{{ $inner_comment->id }}" onclick="return false" data-id="{{ $comment->id }}" post-id="{{ $user->id }}" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>
                                                      <a class="delete" href="#we-comment{{ $inner_comment->id }}" onclick="delete_group_reply_comment({{ $inner_comment->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                                      <a class="edit" href="#we-comment{{ $inner_comment->id }}" onclick="edit_group_reply_comment({{ $inner_comment->id }})"><i class="fas fa-edit"></i></a>     
                                                  </div>
                                                  @php echo $inner_comment->comment  @endphp
                                                  <input type="hidden" name="inner_comment_text" id="inner_comment_text{{ $inner_comment->id }}" value="{{  $inner_comment->comment  }}"/>
                                                  <input type="hidden" name="inner_comment_id" id="inner_comment_id{{ $inner_comment->id }}" value ="{{ $inner_comment->id }}" />
                                              </div>
                                          </li>
                                          @endforeach
                                        </ul>
                                       
                                      </li>
                                      @endforeach
                                      <div class="list-comment-box{{  $user->id   }}" id="list-comment-box"></div>

                                      <div class="post-comt-box">
                                          <form method="post" id="page_group_comments{{ $user->id }}" enctype="multipart/form-data" onsubmit="return false">
                                              @csrf
                                                  <div class="row">
                                                  <div class="col-sm-11">
                                                      <textarea placeholder="Post your comment"
                                                          id="comment{{ $user->id }}" class="comment_1243"
                                                           name="comment"      
                                                          aria-hidden="true"></textarea>
                                                  
                                                  </div>
                                                  <div class="col-sm-1">
                                                   
                                                      <input type="hidden" name="post_id" class="post_id" id="post_id" value="{{ $user->id }}"/>    
                                                      <input type="hidden" name="type" id="type" value="group"/>
                                                      <input type="hidden" name="p_comment" class="p_comment" value =""/>
                                                      <button type="button" id="" data-id="{{ $user->id }}" name="page_group_comments" class="btn btn-primary page_group_comments"><i
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
                  
                @endforeach
                        </div>
                    </div>
     
                  </div>
               <!-- centerl meta -->
               @include('includes/right-sidebar')
            </div>
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