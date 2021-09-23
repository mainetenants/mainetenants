
	@include('includes.featureHeader')
	<section>
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
							<div class="col-lg-9">
								<div class="inbox-sec">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-4">
											<div class="inbox-navigation">
												<div class="inbox-panel-head">
													<img src="{{ asset('assets/images/resources/friend-avatar11.jpg') }}" alt="">
													<h1><i>Brian</i> Kelly</h1>
													<a title="" href="edit-profile-basic.html"><i class="fa fa-user"></i>Profile</a>
													<a title="" href="edit-account-setting.html"><i class="fa fa-cog"></i>Setting</a>
													<ul>
														<li><a class="compose-btn" title="" href="#">Compose</a></li>
													</ul>
												</div><!-- Inbox Panel Head -->
												<ul>
													<li class="active"><a title=""><i class="fa fa-inbox"></i>Inbox</a><span>4</span></li>
													<li><a title=""><i class="fa fa-paper-plane-o"></i>Draft</a></li>
													<li><a title=""><i class="fa fa-repeat"></i>Outbox</a><span>6</span></li>
													<li><a title=""><i class="fa fa-plane"></i>Sent</a></li>
													<li><a title=""><i class="fa fa-trash-o"></i>Trash</a></li>
												</ul>
												<div class="flaged">
													<h3><i class="fa fa-flag"></i>FLAGGED</h3>
													<ul>
														<li><a title="" href="#"><i style="color:#ff5c5c;" class="fa fa-tag"></i>Family</a></li>
														<li><a title="" href="#"><i style="color:#3ac1e3;" class="fa fa-tag"></i>Friends</a></li>
														<li><a title="" href="#"><i style="color:#f3d547;" class="fa fa-tag"></i>Private</a></li>
														<li><a title="" href="#"><i style="color:#b447f3;" class="fa fa-tag"></i>Office Staff</a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-8">
											<div class="inbox-lists">
												<div class="inbox-action">
													<ul>
														<li><label><input type="checkbox" name="select-all" id="select_all" /> Select all</label></li>
														<li><a class="delete-email" title=""><i class="fa fa-trash-o"></i> Delete</a></li>
														<li><a title=""><i class="fa fa-refresh"></i> Refresh</a></li>
													</ul>
												</div>
												<div class="mesages-lists">
													<form method="post">
														<input type="text" placeholder="Search Email">
													</form>
													<ul id="message-list" class="message-list">
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this starred"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Darlina Jaze</h3>
															<a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>It is a long established fact that a reader will be distracted</p>
														</li>
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this "><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Barlina Maze</h3>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>That a reader will be distracted by the readable content..</p>
														</li>
														<li class="read">
															<input class="select-message" type="checkbox" />
															<span class="star-this starred"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Jonathan Dae</h3>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>Will be distracted by the readable..</p>
														</li>
														<li class="read">
															<input class="select-message" type="checkbox" />
															<span class="star-this"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Humaina Burb</h3>
															<a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
															<span class="make-important important-done"><i class="fa fa-thumb-tack"></i></span>

															<p>It is a long established fact by the readable ponkaa..</p>
														</li>
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this "><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Barlina Maze</h3>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>Long  will be distracted by the readable..</p>
														</li>
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this starred"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Darlina Jaze</h3>
															<a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>Reader will be distracted by the nalanye..</p>
														</li>
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this starred"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Darlina Jaze</h3>
															<a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>It is a long established fact that a reader will be distracted</p>
														</li>
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this "><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Barlina Maze</h3>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>That a reader will be distracted by the readable content..</p>
														</li>
														<li class="read">
															<input class="select-message" type="checkbox" />
															<span class="star-this starred"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Jonathan Dae</h3>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>Will be distracted by the readable..</p>
														</li>
														<li class="read">
															<input class="select-message" type="checkbox" />
															<span class="star-this"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Humaina Burb</h3>
															<a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
															<span class="make-important important-done"><i class="fa fa-thumb-tack"></i></span>

															<p>It is a long established fact by the readable ponkaa..</p>
														</li>
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this "><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Barlina Maze</h3>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>Long  will be distracted by the readable..</p>
														</li>
														<li class="unread">
															<input class="select-message" type="checkbox" />
															<span class="star-this starred"><i class="fa fa-star-o"></i></span>

															<h3 class="sender-name">Darlina Jaze</h3>
															<a title="" data-toggle="tooltip" data-original-title="Attachment"><i class="fa fa-paperclip"></i></a>
															<span class="make-important"><i class="fa fa-thumb-tack"></i></span>

															<p>Reader will be distracted by the nalanye..</p>
														</li>
													</ul>
												</div>
											</div><!-- Inbox lists -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="advertisment-box">
										<h4 class="">advertisment</h4>
										<figure>
											<a href="#" title="Advertisment"><img src="{{ asset('assets/images/resources/ad-widget.gif') }}" alt=""></a>
										</figure>
									</div>
									<div class="widget friend-list stick-widget">
										<h4 class="widget-title">Friends</h4>
										<div id="searchDir"></div>
										<ul id="people-list" class="friendz-list">
											<li>
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar.jpg') }}" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">bucky barnes</a>
													<i>wintersolder@gmail.com</i>
												</div>
											</li>
											<li>
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar2.jpg') }}" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">Sarah Loren</a>
													<i>barnes@gmail.com</i>
												</div>
											</li>
											<li>
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar3.jpg') }}" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">jason borne</a>
													<i>jasonb@gmail.com</i>
												</div>
											</li>
											<li>
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar4.jpg') }}" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">Cameron diaz</a>
													<i>jasonb@gmail.com</i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar5.jpg') }}" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">daniel warber</a>
													<i>jasonb@gmail.com</i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar6.jpg') }}" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">andrew</a>
													<i>jasonb@gmail.com</i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar7.jpg') }}" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">amy watson</a>
													<i>jasonb@gmail.com</i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar5.jpg') }}" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">daniel warber</a>
													<i>jasonb@gmail.com</i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="{{ asset('assets/images/resources/friend-avatar2.jpg') }}" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="time-line.html">Sarah Loren</a>
													<i>barnes@gmail.com</i>
												</div>
											</li>
										</ul>
										<div class="chat-box">
											<div class="chat-head">
												<span class="status f-online"></span>
												<h6>Bucky Barnes</h6>
												<div class="more">
													<span><i class="ti-more-alt"></i></span>
													<span class="close-mesage"><i class="ti-close"></i></span>
												</div>
											</div>
											<div class="chat-list">
												<ul>
													<li class="me">
														<div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist1.jpg') }}" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
													<li class="you">
														<div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist2.jpg') }}" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
													<li class="me">
														<div class="chat-thumb"><img src="{{ asset('assets/images/resources/chatlist1.jpg') }}" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
												</ul>
												<form class="text-box">
													<textarea placeholder="Post enter to post..."></textarea>
													<div class="add-smiles">
														<span title="add icon" class="em em-expressionless"></span>
													</div>
													<div class="smiles-bunch">
														<i class="em em---1"></i>
														<i class="em em-smiley"></i>
														<i class="em em-anguished"></i>
														<i class="em em-laughing"></i>
														<i class="em em-angry"></i>
														<i class="em em-astonished"></i>
														<i class="em em-blush"></i>
														<i class="em em-disappointed"></i>
														<i class="em em-worried"></i>
														<i class="em em-kissing_heart"></i>
														<i class="em em-rage"></i>
														<i class="em em-stuck_out_tongue"></i>
													</div>
													<button type="submit"></button>
												</form>
											</div>
										</div>
									</div><!-- friends list sidebar -->
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>


	<div class="bottombar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span class="copyright">© Winku 2018. All rights reserved.</span>
					<i><img src="{{ asset('assets/images/resources/chatlist2.jpg') }}" alt=""></i>
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
		</div><!-- side panel -->		
      
</body>	
</html>
@include('includes/footer')