@include('includes/header')

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
										</div><br />
									@endif
									@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>{{ $message }}</strong>
									</div>
									@endif
										<form method="post" id="upload_files" action="get-post-list" enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{ csrf_token() }}" />
											<textarea rows="2" placeholder="write something" name="msg"></textarea>
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
							</div><!-- add post new box -->
							<div class="loadMore">
								@foreach($users as $user)
							<div class="  central-meta item bg-white bg-light">
								<div class="user-post"> 
									<div class="friend-info">
										<figure>
											<img src="{{ asset('assets/images/resources/friend-avatar10.jpg') }}" alt="">
										</figure>
										<span>
										<div class="friend-name">
											<span><ins><a href="time-line" title="">{{$user->name}}</a></ins> 
												
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
													{{--  <div class="list-group" data-toggle="popover" data-placement="bottom" id="list-tab" role="tablist">
													<a class="list-group-item">Edit</a>
													<a class="list-group-item">Delete</a>
													</div>
												</div>  --}} 
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
											<img src="upload/images/{{ $user->images; }}" alt="">
											<div class="we-video-info">
												<span class="reaction" value="{{$user->id}}">
                                       <i id="1"><img src="/assets/images/s_emoji/like.png"  class="emoji img-fluid custom-img-height" /></i>
													<i id="2"><img src="/assets/images/s_emoji/love.png"  class="emoji img-fluid custom-img-height" /></i>
													<i id="3"><img src="/assets/images/s_emoji/haha.png"  class="emoji img-fluid custom-img-height" /></i>
													<i id="4"><img src="/assets/images/s_emoji/angry.png"  class="emoji img-fluid custom-img-height" /></i>
													<i id="5"><img src="/assets/images/s_emoji/care.png"  class="emoji img-fluid custom-img-height" /></i>
												   <i id="6"><img src="/assets/images/s_emoji/wow.png"  class="emoji img-fluid custom-img-height" /></i>
													<i id="7"><img src="/assets/images/s_emoji/sad.png"  class="emoji img-fluid custom-img-height" /></i>
													
                                       {{-- <i id="1" class="em em---1"></i>
													<i id="2" class="em em-heart"></i>
													<i id="3" class="em em-laughing"></i>
													<i id="4" class="em em-anguished"></i>
													<i id="5" class="em em-astonished"></i>
													<i id="6" class="em em-cry"></i>
													<i id="7" class="em em-rage"></i> --}}
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
											<div class="description">

												<p>
													{{ $user->content; }}
												</p>
											</div>
										</div>
									</div>
									<div class="coment-area bg-white bg-light">
										<ul class="we-comet">
											@foreach ($comments as $comment)
											<li>
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
												</div>
												<div class="we-comment">
													<div class="coment-head">
														<h5><a href="time-line" title="">{{$user->name}}</a></h5>
														<?php
														$timestamp = strtotime($user->created_at);
														 $day = date('M,d Y H:i A', $timestamp);
														?>
														<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>
													</div>
													<p>{{ $comment->comment; }}</p>
												</div>
											
											@endforeach

											<li class="post-comment bg-white bg-light">
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
												</div>
												<div class="post-comt-box">
													<form action="get-comment-list" id="comment-form" method="post" enctype="multipart/form-data">
														  <textarea name="comment" id="comment" placeholder="Post your comment"></textarea>
														  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
														  <input type="hidden" name="post_id" value="{{ $user->post_id }}"/>
														
														<div class="add-smiles">
															<span class="em em-expressionless" title="add icon"></span>
														</div>
														<div class="smiles-bunch">
															<i class="em em---1 text-secondary"></i>
															<i class="em em-smiley text-secondary"></i>
															<i class="em em-anguished text-secondary"></i>
															<i class="em em-laughing text-secondary"></i>
															<i class="em em-angry text-secondary"></i>
															<i class="em em-astonished text-secondary"></i>
															<i class="em em-blush text-secondary"></i>
															<i class="em em-disappointed text-secondary"></i>
															<i class="em em-worried text-secondary"></i>
															<i class="em em-kissing_heart text-secondary"></i>
															<i class="em em-rage text-secondary"></i>
															<i class="em em-stuck_out_tongue text-secondary"></i>
														</div>
														<button type="submit"></button>
													</form>
												</div>
											</li>
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
									</div>
								
								</div>
							</div>
							@endforeach
							<div class=" central-meta item bg-white bg-light">
								<div class="user-post">
									<div class="friend-info">
										<figure>
											<img src="{{ asset('assets/images/resources/nearly1.jpg') }}" alt="">
										</figure>
										<div class="friend-name">
											<ins><a href="time-line" title="">Sara Grey</a></ins>
											<span>published: june,2 2018 19:PM</span>
										</div>
										<div class="post-meta">
											<iframe width="" height="285" src="https://www.youtube.com/embed/_-StQsHSTz0" frameborder="0" allowfullscreen></iframe>
											<div class="we-video-info">
												<ul>
													<li>
														<span class="views text-secondary text-secondary" data-toggle="tooltip" title="views">
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
													<li>
														<span class="like text-success" data-toggle="tooltip" title="like">
															<i class="ti-heart text-secondary"></i>
															<ins>2.2k</ins>
														</span>
													</li>
													<li>
														<span class="dislike text-danger" data-toggle="tooltip" title="dislike">
															<i class="ti-heart-broken text-secondary"></i>
															<ins>200</ins>
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
											<div class="description">

												<p>
													Lonely Cat Enjoying in Summer Curabitur <a href="#" class="text-secondary"" title="">#mypage</a> ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
												</p>
											</div>
										</div>
									</div>
									<div class="coment-area bg-white bg-light">
										<ul class="we-comet">
											<li>
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/fav.png') }}" alt="">
												</div>
												<div class="we-comment">
													<div class="coment-head">
														<h5><a href="time-line" title="">Jason borne</a></h5>
														<span>1 year ago</span>
														<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>
													</div>
													<p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel</p>
												</div>

											</li>
											<li>
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/resources/comet-2.jpg') }}" alt="">
												</div>
												<div class="we-comment">
													<div class="coment-head">
														<h5><a href="time-line" title="">Sophia</a></h5>
														<span>1 week ago</span>
														<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>
													</div>
													<p>we are working for the dance and sing songs. this video is very awesome for the youngster.
														<i class="em em-smiley text-secondary"></i>
													</p>
												</div>
											</li>
											<li>
												<a href="#" class="text-secondary"" title="" class="showmore underline">more comments</a>
											</li>
											<li class="post-comment bg-white bg-light">
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/resources/comet-2.jpg') }}" alt="">
												</div>
												<div class="post-comt-box">
													<form method="post">
														<textarea placeholder="Post your comment"></textarea>
														<div class="add-smiles">
															<span class="em em-expressionless" title="add icon"></span>
														</div>
														<div class="smiles-bunch">
															<i class="em em---1 text-secondary"></i>
															<i class="em em-smiley text-secondary"></i>
															<i class="em em-anguished text-secondary"></i>
															<i class="em em-laughing text-secondary"></i>
															<i class="em em-angry text-secondary"></i>
															<i class="em em-astonished text-secondary"></i>
															<i class="em em-blush text-secondary"></i>
															<i class="em em-disappointed text-secondary"></i>
															<i class="em em-worried text-secondary"></i>
															<i class="em em-kissing_heart text-secondary"></i>
															<i class="em em-rage text-secondary"></i>
															<i class="em em-stuck_out_tongue text-secondary"></i>
														</div>
														<button type="submit"></button>
													</form>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class=" central-meta item bg-white bg-light">
								<div class="user-post">
									<div class="friend-info">
										<figure>
											<img src="{{ asset('assets/images/resources/nearly6.jpg') }}" alt="">
										</figure>
										<div class="friend-name">
											<ins><a href="time-line" title="">Sophia</a></ins>
											<span>published: january,5 2018 19:PM</span>
										</div>
										<div class="post-meta">
											<div class="post-map">
												<div class="nearby-map">
													<div id="map-canvas"></div>
												</div>
											</div><!-- near by map -->
											<div class="we-video-info">
												<ul>
													<li>
														<span class="views text-secondary text-secondary" data-toggle="tooltip" title="views">
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
													<li>
														<span class="like text-success" data-toggle="tooltip" title="like">
															<i class="ti-heart text-secondary"></i>
															<ins>2.2k</ins>
														</span>
													</li>
													<li>
														<span class="dislike text-danger" data-toggle="tooltip" title="dislike">
															<i class="ti-heart-broken text-secondary"></i>
															<ins>200</ins>
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
											<div class="description">

												<p>
													Curabitur Lonely Cat Enjoying in Summer <a href="#" class="text-secondary"" title="">#mypage</a> ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc,
												</p>
											</div>
										</div>
									</div>
									<div class="coment-area bg-white bg-light">
										<ul class="we-comet">
											<li>
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/resources/comet-1.jpg') }}" alt="">
												</div>
												<div class="we-comment">
													<div class="coment-head">
														<h5><a href="time-line" title="">Jason borne</a></h5>
														<span>1 year ago</span>
														<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>
													</div>
													<p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel</p>
												</div>

											</li>
											<li>
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/resources/comet-2.jpg') }}" alt="">
												</div>
												<div class="we-comment">
													<div class="coment-head">
														<h5><a href="time-line" title="">Sophia</a></h5>
														<span>1 week ago</span>
														<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>
													</div>
													<p>we are working for the dance and sing songs. this video is very awesome for the youngster.
														<i class="em em-smiley text-secondary"></i>
													</p>
												</div>
											</li>
											<li>
												<a href="#" class="text-secondary"" title="" class="showmore underline">more comments</a>
											</li>
											<li class="post-comment bg-white bg-light">
												<div class="comet-avatar">
													<img src="{{ asset('assets/images/resources/comet-2.jpg') }}" alt="">
												</div>
												<div class="post-comt-box">
													<form method="post">
														<textarea placeholder="Post your comment"></textarea>
														<div class="add-smiles">
															<span class="em em-expressionless" title="add icon"></span>
														</div>
														<div class="smiles-bunch">
															<i class="em em---1 text-secondary"></i>
															<i class="em em-smiley text-secondary"></i>
															<i class="em em-anguished text-secondary"></i>
															<i class="em em-laughing text-secondary"></i>
															<i class="em em-angry text-secondary"></i>
															<i class="em em-astonished text-secondary"></i>
															<i class="em em-blush text-secondary"></i>
															<i class="em em-disappointed text-secondary"></i>
															<i class="em em-worried text-secondary"></i>
															<i class="em em-kissing_heart text-secondary"></i>
															<i class="em em-rage text-secondary"></i>
															<i class="em em-stuck_out_tongue text-secondary"></i>
														</div>
														<button type="submit"></button>
													</form>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class=" central-meta item bg-white bg-light">
								<div class="user-post">
									<div class="friend-info">
										<figure>
											<img alt="" src="images/resources/friend-avatar10.jpg">
										</figure>
										<div class="friend-name">
											<ins><a title="" href="time-line">Janice Griffith</a></ins>
											<span>published: june,2 2018 19:PM</span>
										</div>
										<div class="description">

												<p>
													Curabitur World's most beautiful car in <a title="" href="#">#test drive booking !</a> the most beatuiful car available in america and the saudia arabia, you can book your test drive by our official website
												</p>
											</div>
										<div class="post-meta">
											<div class="linked-image align-left">
												<a title="" href="#"><img alt="" src="images/resources/page1.jpg"></a>
											</div>
											<div class="detail">
												<span>Love Maid - ChillGroves</span>
												<p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... </p>
												<a title="" href="#">www.sample.com</a>
											</div>
											<div class="we-video-info">
												<ul>
													<li>
														<span class="views text-secondary text-secondary" data-toggle="tooltip" title="views">
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
													<li>
														<span class="like text-success" data-toggle="tooltip" title="like">
															<i class="ti-heart text-secondary"></i>
															<ins>2.2k</ins>
														</span>
													</li>
													<li>
														<span class="dislike text-danger" data-toggle="tooltip" title="dislike">
															<i class="ti-heart-broken text-secondary"></i>
															<ins>200</ins>
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
								</div>
							</div>
							</div>
						</div><!-- centerl meta -->
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
</div><!-- side panel -->

@include('includes/footer')
 
</body>

</html>
