@php

$get_page  = get_page($id);
$user_id = Auth::id();
$user_name = get_user_nane($get_page->user_id );
$get_page_post = get_page_post($get_page->msu_user_page_id);
$get_like_page_status = get_like_page_status($get_page->msu_user_page_id);


@endphp

@include('includes/header')
<section>
	<div class="feature-photo">
      @if($get_page->cover_image == "")
             <figure><img  src="{{ asset('assets/images/resources/timeline-4.jpg') }}" alt=""></figure>
       @else
            <figure><img class="img-fluid" src="{{ asset('upload/images/profile_photo/'.$get_page->cover_image) }}" alt=""></figure>
         @endif
	  
	   <div class="add-btn">
		  <span>1.3k followers</span>

        @if($get_page->user_id != $user_id)
            <a href="#"  id="like_page" @if($get_like_page_status == 1) style="display:none;" @endif @endphp    title="" data-ripple="">like Page</a>
            <a href="#"  id="unlike_page" title=""  @if($get_like_page_status == null) style="display:none;" @endif @endphp  data-ripple="">liked <i class="fa fa-check" style="display:none;" aria-hidden="true"></i></a>
            <input type="hidden" id="like_page_id" name="like_page_id" value="{{ $get_page->msu_user_page_id }}"/>
            <input type="hidden" id="like_friend_id" name="like_friend_id" value="{{ $get_page->user_id }}"/>
        @else
        
         
        @endif
	   </div>
	   <form method='post' class="edit-phto" id="edit_cover_photo" action ="{{ url('edit_cover_pic') }}" enctype="multipart/form-data">
		  @csrf
         <i class="fa fa-camera-retro"></i>
		  <label class="fileContainer">
		  Edit page Cover Photo
		  <input type="file" id="file_cover_chnage" name="cover_photo"  value=""/>
        <input type="hidden" id="page_id" name="page_id" value="{{ $id }}" />
		  </label>
	   </form>
	   <div class="container-fluid">
		  <div class="row merged">
			 <div class="col-lg-2 col-sm-3">
				<div class="user-avatar">
				   <figure>
                  @if($get_page->profile_image == "")
					      <img src="{{ asset('assets/images/resources/user-avatar2.jpg') }}" alt="">
                  @else
                     <img src="{{ asset('upload/images/profile_photo/'.$get_page->profile_image)}}" alt=""/>
                  @endif
                 <form class="edit-phto" action ="{{ url('edit_profile_pic') }}" method="post" id="submit_profile_photo" enctype="multipart/form-data">
						@csrf 
                  <i class="fa fa-camera-retro"></i>
						 <label class="fileContainer" >
						 Edit page Photo
						 <input type="file" id="fileid_change" name="profile_photo"/>
                   <input type="hidden" name="page_id" class="page_id" value="{{ $id }}"/>
						 </label>
					  </form>
				   </figure>
				</div>
			 </div>
			 <div class="col-lg-10 col-sm-9">
				<div class="timeline-info">
				   <ul>
					  <li class="admin-name">
						<h5>{{ $get_page->page_info }}</h5>
						 <h6><i class="mr-2">Created By :<a href="/see_friend/{{ $get_page->user_id }}">@ {{ $user_name->name }}</a> .</i>{{ $get_page->page_category }}</h6>
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
                                 <a href="../fav-page/@php echo get_page_id() @endphp" class="text-secondary" title="">My pages</a>
                              </li>
                              <li>
                                 <i class="ti-user text-secondary"></i>
                                 <a href="../timeline-friends" class="text-secondary" title="">friends</a>
                              </li>
                              <li>
                                 <i class="ti-image text-secondary"></i>
                                 <a href="../timeline-photos" class="text-secondary" title="">images</a>
                              </li>
                              {{-- <li>
                                 <i class="ti-video-camera text-secondary"></i>
                                 <a href="../timeline-videos" class="text-secondary" title="">videos</a>
                              </li> --}}
                              {{-- <li>
                                 <i class="ti-comments-smiley text-secondary"></i>
                                 <a href="../messages" class="text-secondary" title="">Messages</a>
                              </li> --}}
                              {{-- <li>
                                 <i class="ti-bell text-secondary"></i>
                                 <a href="../notifications" class="text-secondary" title="">Notifications</a>
                              </li> --}}
                              <li>
                                 <i class="ti-share text-secondary"></i>
                                 <a href="../people-nearby" class="text-secondary" title="">People Nearby</a>
                              </li>
                             
                              <li class="test">
                                 <i class="ti-power-off text-secondary"></i>
                                 <form method="post" id="logout_id" action="{{ url("logout"); }}" enctype="multipart/form-data">
                                 @csrf
                                 <a href="javascript:$('#logout_id').submit();" class="text-secondary">Logout</a>			
                                 </form>
                              </li>
                           </ul>
                        </div>
                     </aside>
                  </div>
                  <div class="col-lg-6">
                     <div class="central-meta new-pst">
                        <div class="new-postbox">
                           
                           <figure><img src="{{ asset('assets/images/resources/admin3.jpg') }}" alt="">
                           </figure>
                           <div class="newpst-input">
                              <form method="post"  action="{{ url('add_page_post') }}" enctype="multipart/form-data" >
                                 @csrf
                                 <textarea rows="3" name="msg" id="msg" placeholder="write something"></textarea>
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
                                          <input type="file" name="image" >
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
                                          <input type="file" >
                                          </label>
                                       </li>
                                       <li>
                                          <button type="submit" >Publish</button>
                                          <input type="hidden" name="post_id" id="post_id" value="{{$get_page->msu_user_page_id}}"/>
                                       </li>
                                    </ul>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- add post new box -->
                     <div class="loadMore">

                        @foreach($get_page_post as $post)

                        
                           @php 
                              $get_page_post_cmt = get_page_post_cmt($post->id);
                              $get_page_post_cmt1 = get_page_post_cmt1($post->id);

                              @endphp
                            <div class="central-meta item">
                           <div class="user-post">
                              <div class="friend-info">
                                 <figure>
                                    <img src="{{ asset('assets/images/resources/friend-avatar11.jpg') }}" alt="">											
                                 </figure>
                                 <div class="friend-name">
                                    <span>
                                          <ins><a href="time-line.html" title="">@php echo  get_user_nane1($post->user_id) @endphp</a></ins>
                                          <span>published: {{ $post->created }}</span>
                                          <div class="post-opt pull-right">

                                         <i class="ti-more-alt" data-toggle="popover" data-content="<a href=#null  onclick='myPageFuntction()' value='{{ $post->id}}' id='edit-post'>Edit</a><br><a class='border-top'  onclick='openMoodal({{ $post->id}})'  href='#' >Delete</a>"
                                           data-placement="left"  data-html="true">
                                         </i>
                                         
                                       </div>
                                       <div class="col-4 pull-right opt-list" style="display: none">
                                         {{--  <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
                                           sagittis lacus vel augue laoreet rutrum faucibus.">
                                         Popover on bottom
                                         </button>  --}}
                                         {{--  
                                         <div class="list-group" data-toggle="popover" data-placement="bottom" id="list-tab" role="tablist">
                                           <a class="list-group-item">Edit</a>
                                           <a class="list-group-item" >Delete</a>
                                         </div>
                                       
                                       --}} 
                                    </div>
                                    </span>
                                 </div>
                                 
                                 <div class="post-meta">

                                    @if($post->images)
                                     <img src="{{ url('upload/images/thumbnails/'.$post->images) }}" class="img-fluid mx-auto"alt="">
                                     @endif
                                     <div class="description">
                                       <p>
                                          {{ $post->content; }}
                                       </p>
                                    </div>
                                    <div class="we-video-info">
                                       <span class="reaction" value="{{$post->id}}">
                                          <i id="1"><img src="/assets/images/s_emoji/like.png"  class="emoji img-fluid custom-img-height" /></i>
                                          <i id="2"><img src="/assets/images/s_emoji/love.png"  class="emoji img-fluid custom-img-height" /></i>
                                          <i id="3"><img src="/assets/images/s_emoji/haha.png"  class="emoji img-fluid custom-img-height" /></i>
                                          <i id="4"><img src="/assets/images/s_emoji/angry.png"  class="emoji img-fluid custom-img-height" /></i>
                                          <i id="5"><img src="/assets/images/s_emoji/care.png"  class="emoji img-fluid custom-img-height" /></i>
                                          <i id="6"><img src="/assets/images/s_emoji/wow.png"  class="emoji img-fluid custom-img-height" /></i>
                                          <i id="7"><img src="/assets/images/s_emoji/sad.png"  class="emoji img-fluid custom-img-height" /></i>
                                       </span>
                                       <ul>
                                          <li>
                                             <span class="views text-secondary" data-toggle="tooltip" title="views">
                                             <i class="fa fa-eye text-secondary"></i>
                                             <ins>1.2k</ins>
                                             </span>
                                          </li>
                                          <li>
                                             <span class="comment text-secondary" data-toggle="tooltip" title="Comments">
                                             <i class="fa fa-comments-o text-secondary"></i>
                                             <ins>52</ins>
                                             </span>
                                          </li>
                                          <li class="emooo">
                                             <span class="comment text-secondary" data-toggle="tooltip" title="reaction">
                                                <div class="rec" data_id="{{$post->id}}">
                                                   <span class="rec1">
                                                      <img src="/assets/images/s_emoji/like.png"  class="emoji-reaction" />
                                                   </span>
         
                                                   <span class="rec2">
                                                      <img src="/assets/images/s_emoji/love.png"  class="emoji-reaction" />
                                                   </span>
         
                                                   <span class="rec3">
                                                      <img src="/assets/images/s_emoji/sad.png"  class="emoji-reaction" />
                                                   </span>
                                             </div>
                                                <ins class="mrgn">{{ $post->likes }}</ins>
                                             </span>
                                          </li>
                                          <li>
                                             <span class="like" id ="likeId" value="{{$post->id}}">
                                                <i class="ti-heart"></i>
                                                <ins>{{ $post->likes }}</ins>
                                             </span>
                                          </li>
                                          <li>
                                             <span class="dislike" data-toggle="tooltip" title="dislike" id ="dislikeId" value="">
                                             <i class="ti-heart-broken"></i>
                                             <ins>{{ $post->dislikes }}</ins>
                                             </span>
                                          </li>
                                          <li class="social-media">
                                             <div class="menu">
                                                <div class="btn trigger"><i class="fa fa-share-alt text-secondary"></i></div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-html5 text-secondary"></i></a></div>
                                                </div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-facebook text-secondary"></i></a></div>
                                                </div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-google-plus text-secondary"></i></a></div>
                                                </div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-twitter text-secondary"></i></a></div>
                                                </div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-css3 text-secondary"></i></a></div>
                                                </div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-instagram text-secondary"></i></a>
                                                   </div>
                                                </div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-dribbble text-secondary"></i></a>
                                                   </div>
                                                </div>
                                                <div class="rotater">
                                                   <div class="btn btn-icon"><a href="#" class="text-secondary"" title=""><i class="fa fa-pinterest text-secondary"></i></a>
                                                   </div>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                
                                 </div>
                                 {{-- modal for edit post							 --}}
							   <div class="modal fade" id="editpost" tabindex="-1" aria-hidden="false">
								  <div class="modal-dialog">
									 <div class="modal-content">
										<div class="modal-header py-2">
										   <h5 class="modal-title" id="">Edit Post</h5>
										   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										   <span aria-hidden="true">&times;</span>
										   </button>
										</div>
										<div class="modal-body">
										   <form method="post" id="edit_page_form" action="{{ url("edit-page-post"); }}" enctype="multipart/form-data">
										   @csrf
										   <div class="container">
											  <div class="row">    
												 <div class="col-sm-12 img-exist" >
													<div class="card post-card-img">

                                          
													</div>
												 </div>
												 <div class="col-sm-12">
													<div class="form-group">
													   

													   <div id="post_contet">
													   </div>

                                          <div class="col-sm-12 " id="display_img">
                                          </div>
                                          <div class="attachments">
                                             <ul>
                                                <li>
                                                   <i class="fa fa-music"></i>
                                                   <label class="fileContainer">
                                                   <input type="file" >
                                                   </label>
                                                </li>
                                                <li>
                                                   <i class="fa fa-image"></i>
                                                   <label class="fileContainer">
                                                   <input type="file" name="page_post_image" class="page_post_image" id="page_post_image">
                                                   </label>
                                                </li>
                                                <li>
                                                   <i class="fa fa-video-camera"></i>
                                                   <label class="fileContainer">
                                                   <input type="file">
                                                   </label>
                                                </li>
                                                <li>
                                                   <i class="fa fa-camera"></i>
                                                   <label class="fileContainer">
                                                   <input type="file">
                                                   </label>
                                                </li>
                                                <li>
                                              </li>
                                             </ul>
                                          </div>
													</div>
												 </div>
											  </div>
										   </div>
										   </form>
										</div>
										<div class="modal-footer py-2">
										   <button type="submit" id="edit-page-post-submit" class="btn btn-sm btn-primary">Update</button>
										</div>
									 </div>
								  </div>
							   </div>
                              </div>
                              <div class="coment-area">
                                 <ul class="we-comet">
                                    @foreach($get_page_post_cmt as $key => $post_cmt)
                                    <li>
                                       <div class="comet-avatar">
                                          <img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
                                       </div>
                                       <div class="we-comment">
                                          <div class="coment-head">
                                             <h5><a href="time-line.html" title="">@php echo  get_user_nane1($post_cmt->user_id) @endphp</a></h5>
                                             <span>{{ $post_cmt->created }}</span>
                                             <a class="we-reply" href="#" onclick="return false" id="we-reply{{ $key }}"  title="Reply"><i class="fa fa-reply"></i></a>
                                             @if($post_cmt->user_id == $user_id)
                                             <a class="delete"  href="#" onclick="delete_comment({{ $post_cmt->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                             @endif
                                          </div>
                                           <p>
                                                @php echo $post_cmt->comment @endphp
                                          </p>
                                         
                                       </div>
                                       @foreach($get_page_post_cmt1 as $inner_cmt)
                                                
                                         <p>  
                                            @php echo $inner_cmt->comment @endphp
                                        </p>

                                        @endforeach
                                       <div id="new_cmt_box" style="display:none;">

                                       
                                          <div class="post-comt-box">
                                           <form method="post" id="page_post_comments" enctype="multipart/form-data"   action="{{url("fav-page")}}">
                                                @csrf
                                                <div class="row m-4">
                                                <div class="col-sm-10 p-0">
                                                <textarea placeholder="Post your comment" id="page_post_reply_comment" name="page_post_reply_comment"></textarea>
                                          </div> <div class="col-sm-1">
                                             <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"/>    
                                             <input type="hidden" name="user_id" id="user_id" value="{{ $post->user_id }}"/>
                                             <input type="hidden" name="status" id="status" value ="1"/>
                                             <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>
                                          </div>
                                       </form> 
                                       </div>
                                    </li>
                                    @endforeach
                                    
                                    <li>
                                       <a href="#" title="" class="showmore underline">more comments</a>
                                    </li>
                                 
                              </div>
                              <div class="post-comt-box">
                              <form method="post" id="page_post_comments" enctype="multipart/form-data"   action="{{url('fav-page')}}">
                                 @csrf

                                 <div class="row">
                                    <div class="col-sm-10 p-0">
                                        <textarea placeholder="Post your comment" id="page_post_comment" name="page_post_cmt"></textarea>
                                    </div>
                                    <div class="col-sm-1">
                                       <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"/>
                                       <input type="hidden" name="user_id" id="user_id" value="{{ $post->user_id }}"/>
                                       <input type="hidden" name="status" id="status" value ="0"/>
                                       <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>
                                    </div>
                                 </div>
                           </form>	
                              
                           </div>
                              </li>
                              </ul>
                           </div>
                        </div>
                        @endforeach
                        
                     </div>
                   
                  </div>
                  <!-- centerl meta -->
                  <div class="col-lg-3">
                     <aside class="sidebar static">
                        @include('includes/advertisement')
                        @include('includes/invitefriends')
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
{{--   --}}
<div class="bottombar">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <span class="copyright">© Winku 2018. All rights reserved.</span>
            <i><img src="{{ asset('assets/images/credit-cards.png') }}" alt=""></i>
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
   </form>
</div>
<!-- side panel -->		

</body>	
</html>
@include('includes/footer')