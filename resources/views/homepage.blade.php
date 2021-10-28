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
                                          <input type="submit" class="btn btn-info btn-sm" id="posts" value="Post">
                                       </li>
                                    </ul>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- add post new box -->
                     <div class="loadMore">
                        @foreach($users1 as $user)

                        @php $get_post_comments = get_post_comments($user->id); 
                        @endphp

						<div class="  central-meta item bg-white bg-light">
							<div class="user-post">
							   <div class="friend-info">
								  <figure>
									 <img src="{{ asset('assets/images/resources/friend-avatar10.jpg') }}" alt="">
                            
								  </figure>
								  <span>
									 <div class="friend-name">
										<span>
										   <ins><a href="time-line" title="">{{$user->name}}</a></ins> 
										   <div class="post-opt pull-right">
											  <i class="ti-more-alt" data-toggle="popover" data-content="<a href=#null onclick='myFunction()' value='{{ $user->post_id}}' id='edit-post'><i class='fas fa-edit'></i>&nbsp;Edit</a><br><a class='border-top' href='/delete-post/{{ $user->post_id}}' ><i class='fas fa-trash-alt'></i>&nbsp;Delete</a>"
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
										   </div>
										   --}} 
										</span>
									 </div>
									 <?php
										$timestamp = strtotime($user->created_at);
										
										$day = date('M,d Y H:i A', $timestamp);
										?>
									 <span>published: {{$day}} </span>
							   </div>
							   </span>
							   <div class="post-meta">

                          @if($user->images)
								  <img src="upload/images/{{ $user->images; }}" alt="">
                          @elseif($user->videos)
                          <video width="100%" height="400" controls>
                              <source src="upload/videos/{{ $user->videos }}" type="video/mp4">
                              <source src="upload/videos/{{ $user->videos }}" type="video/ogg">
                              Your browser does not support the video tag.
                           </video>
                           @endif   
                          <div class="description">
                           <p>
                             {{ $user->content; }}
                           </p>
                         </div>
                          <div class="we-video-info">
                              <span class="reaction" value="{{$user->id}}">
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
                                       <div class="rec" data_id="{{$user->id}}">
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
                                       <ins class="mrgn">{{ $user->likes }}</ins>
                                    </span>
                                 </li>
                                 <li>
                                    
                                    <span class="like" id ="likeId" value="{{$user->id}}">
                                       <i class="ti-heart"></i>
                                       <ins>{{ $user->likes }}</ins>
                                    </span>
                                 </li>
                                 <li>
                                    <span class="dislike" data-toggle="tooltip" title="dislike" id ="dislikeId" value="{{$user->id}}">
                                       <i class="ti-heart-broken"></i>
                                       <ins>{{ $user->dislikes }}</ins>
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
							</div>
							<div class="coment-area bg-white bg-light">
							   <ul class="we-comet">
								  
                          
                             @foreach ($get_post_comments as $comment)

                             @php 
                                  $get_post_cmt1 = get_post_cmt1($comment->id);
                                  $get_post_comment_like = get_post_comment_like($comment->id);
                                  $is_like  = isset($get_post_comment_like->is_like)?$get_post_comment_like->is_like:'0';
                             @endphp 
                             <li>
                                 <div class="comet-avatar">
                                    <img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
                                 </div>
                                 <div class="we-comment">
                                    <div class="coment-head">
                                       <h5><a href="time-line" title="">@php echo  get_user_nane1($comment->user_id) @endphp</a></h5>
                                       <div class="comment_icons">
                            
                                    @if( $is_like == 1)<a class="like"  onclick="dislike_post_cmt({{ $comment->id }},{{ $comment->post_id }})" href="#" ><i class="fa fa-thumbs-up" style="color:#088dcd;" aria-hidden="true"></i> </a>@else<a class="like"  onclick="like_post_cmt({{ $comment->id }},{{ $comment->post_id }})" href="#" ><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a> @endif                                    
                                        <a class="we-reply1" href="#" onclick="return false" data-id="{{ $comment->id }}" post-id ="{{ $comment->post_id }}" id="we-reply"  title="Reply"><i class="fa fa-reply"></i></a>
                                         @if($comment->user_id == $user_id)
                                             <a class="delete"  href="#" onclick="delete_post_comment({{ $comment->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                        @elseif($user->user_id == $user_id)
                                             <a class="delete"  href="#" onclick="delete_post_comment({{ $comment->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>  
                                   </div>   
                                        @endif
                                    </div>
                                    <p> @php echo $comment->comment @endphp</p>
                                 </div>
                                 <ul>

                                    @foreach($get_post_cmt1 as $inner_cmt)
                                    {{-- @php 
                                     $get_inner_cmt_like= get_inner_cmt_like($inner_cmt->post_id,$inner_cmt->id);
                                     
                                    $is_like_inner = !empty($get_inner_cmt_like->is_like)? $get_inner_cmt_like->is_like:'0'; @endphp --}}

                                    <li>
                                    <div class="comet-avatar">
                                       <img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
                                    </div>
                                    <div class="we-comment">
                                     <div class="coment-head">
                                   
                                          <h5><a href="time-line" title="">@php echo  get_user_nane1($inner_cmt->user_id) @endphp</a></h5>
                                          <span>{{ $inner_cmt->created }}</span>
                                          {{-- @if($is_like_inner == 1)<a class="like"  onclick="dislike_post_inner_cmt({{ $inner_cmt->id }},{{ $inner_cmt->post_id }})" href="#" ><i class="fa fa-thumbs-up" style="color:#088dcd;" aria-hidden="true"></i> </a>@else<a class="like"  onclick="like_post_inner_cmt({{ $inner_cmt->id }},{{ $inner_cmt->post_id }})" href="#" ><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a> @endif --}}
                                          <a class="we-reply" href="#" onclick="return false" data-id="{{ $inner_cmt->id }}" id="we-reply"  title="Reply"><i class="fa fa-reply"></i></a>
                                          
                                          @if($inner_cmt->user_id == $user_id)
                                          <a class="delete"  href="#" onclick="delete_comment({{ $inner_cmt->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                          @elseif($inner_cmt->user_id == $user_id)
                                          <a class="delete"  href="#" onclick="delete_comment({{ $inner_cmt ->id }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>     
                                         @endif
                                       </div>
                                        <p>
                                             @php echo $inner_cmt->comment @endphp
                                       </p>
                                      </div>
                                    </li>
                                      {{-- <p>  
                                         @php echo $inner_cmt->comment @endphp
                                      </p> --}}

                                      @endforeach
                                 </ul>
                             </li>
									 @endforeach 
                         
                       
                          {{-- @php  


                                 get_post_cmt($user->post_id);

                          @endphp --}}
                          <div class="post-comt-box">
                              <form method="post" id="page_post_comments" enctype="multipart/form-data"   action="{{url("homepage")}}">
                                 @csrf
                                 <div class="row">
                                    <div class="col-sm-11">
                                       <textarea placeholder="Post your comment" id="commen_1234" class="comment_1243" name="comment"></textarea>
                                    </div>
                                    <div class="col-sm-1 comment_submit">
                                       <input type="hidden" name="post_id" id="post_id" value="{{ $user->id }}"/>
                                       <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}"/>
                                       <input type="hidden" name="status" id="status" value ="1"/>
                                       <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>
                                    </div>
                                 </div>
                              </form> 
                          </div>
                         
								 
							   </ul>
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
										   <form method="post" id="edit_form" action="{{ url("edit-post")}}" enctype="multipart/form-data">
										   @csrf
										   <div class="container">
											  <div class="row">
												 <div class="col-sm-6">
                                       <div class="card post-card-img">
                                       </div>
												 </div>
												 <div class="col-sm-6">
													<div class="form-group">
													   <label class="text-primary" for="">Edit</label>
                                          <div id="post_contet">
													   </div>
                                        </div> 
												 </div>
											  </div>
										   </div>
										   </form>
										</div>
										<div class="modal-footer py-2">
										   <button type="submit" id="edit-post-submit" class="btn btn-sm btn-primary">Update</button>
										</div>
									 </div>
								  </div>
							   </div>
                        <!-- Modal  for reactions emoticons-->
                        <div class="modal fade" id="reaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-md" role="document">
                           <div class="modal-content">
                              <div class="modal-header pb-0">
                                 <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-link active" role="presentation" class="active"><a href="#all" class="tab-a" role="tab" data-toggle="tab">All</a>
                                    </li>
                                    <li class="nav-link" role="presentation"><a href="#like" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/like.png"  class="img-reaction" /><ins class="ins_like"></ins></a>
                                    </li>
                                    <li class="nav-link" role="presentation"><a href="#love" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/love.png"  class="img-reaction" /><ins class="ins_love"></ins></a>
                                    </li>
                                    <li class="nav-link" role="presentation"><a href="#haha" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/haha.png"  class="img-reaction" /><ins class="ins_haha"></ins></a>
                                    </li>
                                    <li class="nav-link" role="presentation"><a href="#sad" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/sad.png"  class="img-reaction" /><ins class="ins_sad"></ins></a>
                                    </li>
                                    <li class="nav-link" role="presentation"><a href="#angry" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/angry.png"  class="img-reaction" /><ins class="ins_angry"></ins></a>
                                    </li>
                                    <li class="nav-link" role="presentation"><a href="#care" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/care.png"  class="img-reaction" /><ins class="ins_care"></ins></a>
                                    </li>
                                    <li class="nav-link" role="presentation"><a href="#wow" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/wow.png"  class="img-reaction" /><ins class="ins_wow"></ins></a>
                                    </li>
                                 </ul>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                              <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active allfrnd" id="all"></div>
                                    <div role="tabpanel" class="tab-pane like_rc" id="like"></div>
                                    <div role="tabpanel" class="tab-pane sad_rc" id="sad"></div>
                                    <div role="tabpanel" class="tab-pane love_rc" id="love"></div>
                                    <div role="tabpanel" class="tab-pane haha_rc" id="haha"></div>
                                    <div role="tabpanel" class="tab-pane angry_rc" id="angry"></div>
                                    <div role="tabpanel" class="tab-pane care_rc" id="care"></div>
                                    <div role="tabpanel" class="tab-pane wow_rc" id="wow"></div>
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
				     <div >
                     @foreach($users as $user)
                       @php $get_post_cmt = get_post_cmt($user->id) @endphp
                     <div class="  central-meta item bg-white bg-light">
                        <div class="user-post">
                           <div class="friend-info">
                             <figure>
                               <img src="{{ asset('assets/images/resources/friend-avatar10.jpg') }}" alt="">
                             </figure>
                             <span>
                               <div class="friend-name">
                                 <span>
                                    <ins><a href="time-line" title="">{{$user->name}}</a></ins> 
                                    <div class="post-opt pull-right">
                                      <i class="ti-more-alt" data-toggle="popover" data-content="<a href=#null onclick='myFunction()' value='{{ $user->post_id}}' id='edit-post'>Edit</a><br><a class='border-top' href='/delete-post/{{ $user->post_id}}' >Delete</a>"
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
                                    </div>
                                    --}} 
                                 </span>
                               </div>
                               <?php
                                 $timestamp = strtotime($user->created_at);
                                 
                                 $day = date('M,d Y H:i A', $timestamp);
                                 ?>
                               <span>published: {{$day}} </span>
                           </div>
                           </span>
                           <div class="post-meta huuhuh">
                             <img src="images/{{ $user->images; }}" alt="">
                             <video width="320" height="240" autoplay>
                              <source src="images/{{ $user->videos }}" type="video/mp4">
                              <source src="images/{{ $user->videos }}" type="video/ogg">
                              Your browser does not support the video tag.
                            </video>
                            
                             <div class="description">
                              
                              <p>
                                {{ $user->content; }}
                              </p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                            </div>
                             <div class="we-video-info">
                                 <span class="reaction" value="{{$user->id}}">
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
                                          <div class="rec" data_id="{{$user->id}}">
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
                                          <ins class="mrgn">52</ins>
                                       </span>
                                    </li>
                                    <li>
                                       
                                       <span class="like" id ="likeId" value="{{$user->id}}">
                                          <i class="ti-heart"></i>
                                          <ins>{{ $user->likes }}</ins>
                                       </span>
                                    </li>
                                    <li>
                                       <span class="dislike" data-toggle="tooltip" title="dislike" id ="dislikeId" value="{{$user->id}}">
                                          <i class="ti-heart-broken"></i>
                                          <ins>{{ $user->dislikes }}</ins>
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
                        </div>
                        <div class="coment-area bg-white bg-light">
                           <ul class="we-comet">
                             {{-- @foreach ($comments as $comment) --}}
                             
                             @foreach ($get_post_comments as $comment)

                             
                             @php $get_post_comment_like = get_post_comment_like($comment->id);
                                  $is_like  = isset($get_post_comment_like->is_like)?$get_post_comment_like->is_like:'0';
                             @endphp 
                             <li>
                                 <div class="comet-avatar">
                                    <img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
                                 </div>
                                 <div class="we-comment">
                                    <div class="coment-head">
                                       <h5><a href="time-line" title="">{{$user->name}}</a></h5>  
                                       <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>
                                    </div>
                                    <p> @php echo $comment->comment @endphp</p>
                                 </div>
                              </li>
                              
                         @endforeach 
                        
                                 <div class="post-comt-box">
                                    <form method="post" id="page_post_comments" enctype="multipart/form-data"   action="{{url("homepage")}}">
                                             @csrf
                                          <div class="row">
                                             <div class="col-sm-11">
                                                <textarea placeholder="Post your comment"   id="commen_1234" class="comment_1243" name="comment"></textarea>
                                             </div> 
                                             <div class="col-sm-1">
                                                <input type="hidden" name="post_id" id="post_id" value="{{ $user->id }}"/>
                                                <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}"/>
                                                <input type="hidden" name="status" id="status" value ="1"/>
                                                <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>
                                             </div>
                                          </div>
                                    </form> 
                              </div>
                            
                              {{-- <li>
                              <div class="comet-avatar">
                                 <img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
                               </div>
                               <div class="we-comment">
                                 <div class="coment-head">
                                    <h5><a href="time-line" title="">{{$user->name}}</a></h5>
                                    <?php
                                      //$timestamp = strtotime($user->created_at);
                                     //  $day = date('M,d Y H:i A', $timestamp);
                                      ?>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>
                                 </div>
                                 <p> @php echo $comment->comment @endphp</p>
                               </div>
                               @endforeach 
                                
                           </li>--}}
                           </ul>
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
                                    <form method="post" id="edit_form" action="{{ url("edit-post"); }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="card post-card-img">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                             <label class="text-primary" for="">Edit</label>
                                             <div id="post_contet">
                                             </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </form>
                                 </div>
                                 <div class="modal-footer py-2">
                                    <button type="submit" id="edit-post-submit" class="btn btn-sm btn-primary">Update</button>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <!-- Modal  for reactions emoticons-->
                           <div class="modal fade" id="reaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                 <div class="modal-header pb-0">
                                    <ul class="nav nav-tabs" role="tablist">
                                       <li class="nav-link active" role="presentation" class="active"><a href="#all" class="tab-a" role="tab" data-toggle="tab">All</a>
                                       </li>
                                       <li class="nav-link" role="presentation"><a href="#like" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/like.png"  class="img-reaction" /><ins class="ins_like"></ins></a>
                                       </li>
                                       <li class="nav-link" role="presentation"><a href="#love" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/love.png"  class="img-reaction" /><ins class="ins_love"></ins></a>
                                       </li>
                                       <li class="nav-link" role="presentation"><a href="#haha" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/haha.png"  class="img-reaction" /><ins class="ins_haha"></ins></a>
                                       </li>
                                       <li class="nav-link" role="presentation"><a href="#sad" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/sad.png"  class="img-reaction" /><ins class="ins_sad"></ins></a>
                                       </li>
                                       <li class="nav-link" role="presentation"><a href="#angry" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/angry.png"  class="img-reaction" /><ins class="ins_angry"></ins></a>
                                       </li>
                                       <li class="nav-link" role="presentation"><a href="#care" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/wow.png"  class="img-reaction" /><ins class="ins_wow"></ins></a>
                                       </li>
                                       <li class="nav-link" role="presentation"><a href="#wow" class="tab-a" role="tab" data-toggle="tab"><img src="/assets/images/s_emoji/wow.png"  class="img-reaction" /><ins class="ins_wow"></ins></a>
                                       </li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                 <div class="tab-content">
                                       <div role="tabpanel" class="tab-pane active allfrnd" id="all"></div>
                                       <div role="tabpanel" class="tab-pane like_rc" id="like"></div>
                                       <div role="tabpanel" class="tab-pane sad_rc" id="sad"></div>
                                       <div role="tabpanel" class="tab-pane love_rc" id="love"></div>
                                       <div role="tabpanel" class="tab-pane haha_rc" id="haha"></div>
                                       <div role="tabpanel" class="tab-pane angry_rc" id="angry"></div>
                                       <div role="tabpanel" class="tab-pane care_rc" id="care"></div>
                                       <div role="tabpanel" class="tab-pane wow_rc" id="wow"></div>
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
            
        
               <!-- centerl meta -->
               @include('includes/right-sidebar')
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