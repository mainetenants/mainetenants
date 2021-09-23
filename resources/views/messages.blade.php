   @include('includes/featureHeader')
	<section>
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static left">
							@include('includes/advertisement')	
							@include('includes/shortcut2')
							   							
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-9">
								<div class="central-meta">
									<div class="messages">
										<h5 class="f-title"><i class="ti-bell"></i>All Messages <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
										<div class="message-box">
											<ul class="peoples">
												<li>
													
													<figure>
														<img src="{{ asset('assets/images/resources/friend-avatar2.jpg') }}" alt="">
														<span class="status f-online"></span>
													</figure>
													<div class="people-name">
														<span>Molly cyrus</span>
													</div>
												</li>
												<li>
													
													<figure><img src="{{ asset('assets/images/resources/friend-avatar3.jpg') }}" alt="">
														<span class="status f-away"></span>
													</figure>
													<div class="people-name">
														<span>Andrew</span>
													</div>
												</li>
												<li>
													
													<figure>
														<img src="{{ asset('assets/images/resources/friend-avatar.jpg') }}" alt="">
														<span class="status f-online"></span>
													</figure>
													
													<div class="people-name">
														<span>jason bourne</span>
													</div>
												</li>
												<li>
													
													<figure><img src="{{ asset('assets/images/resources/friend-avatar4.jpg') }}" alt="">
														<span class="status off-online"></span>
													</figure>
													<div class="people-name">
														<span>Sarah Grey</span>
													</div>
												</li>
												<li>
													
													<figure><img src="{{ asset('assets/images/resources/friend-avatar5.jpg') }}" alt="">
														<span class="status f-online"></span>
													</figure>
													<div class="people-name">
														<span>bill doe</span>
													</div>
												</li>
												<li>
													
													<figure><img src="{{ asset('assets/images/resources/friend-avatar6.jpg') }}" alt="">
														<span class="status f-away"></span>
													</figure>
													<div class="people-name">
														<span>shen cornery</span>
													</div>
												</li>
												<li>
													
													<figure><img src="{{ asset('assets/images/resources/friend-avatar7.jpg') }}" alt="">
														<span class="status off-online"></span>
													</figure>
													<div class="people-name">
														<span>kill bill</span>
													</div>
												</li>
												<li>
													
													<figure><img src="{{ asset('assets/images/resources/friend-avatar8.jpg') }}" alt="">
														<span class="status f-online"></span>
													</figure>
													<div class="people-name">
														<span>jasmin walia</span>
													</div>
												</li>
												<li>
													
													<figure><img src="{{ asset('assets/images/resources/friend-avatar6.jpg') }}" alt="">
														<span class="status f-online"></span>
													</figure>
													<div class="people-name">
														<span>neclos cage</span>
													</div>
												</li>
											</ul>
											<div class="peoples-mesg-box">
												<div class="conversation-head">
													<figure><img src="{{ asset('assets/images/resources/friend-avatar.jpg') }}" alt=""></figure>
													<span>jason bourne <i>online</i></span>
												</div>
												<ul class="chatting-area">
													<li class="you">													
														<figure><img src="{{ asset('assets/images/resources/userlist-2.jpg') }}" alt=""></figure>
														<p>what's liz short for? :)</p>
													</li>
													<li class="me">
														
														<figure><img src="{{ asset('assets/images/resources/userlist-1.jpg') }}" alt="">
														</figure>
														<p>Elizabeth lol</p>
													</li>
													<li class="me">
														<figure><img src="{{ asset('assets/images/resources/userlist-1.jpg') }}" alt=""></figure>
														<p>wanna know whats my second guess was?</p>
													</li>
													<li class="you">
														<figure><img src="{{ asset('assets/images/resources/userlist-2.jpg') }}" alt=""></figure>
														<p>yes</p>
													</li>
													<li class="me">
														<figure><img src="{{ asset('assets/images/resources/userlist-1.jpg') }}" alt=""></figure>
														<p>Disney's the lizard king</p>
													</li>
													<li class="me">
														<figure><img src="{{ asset('assets/images/resources/userlist-1.jpg') }}" alt=""></figure>
														<p>i know him 5 years ago</p>
													</li>
													<li class="you">
														<figure><img src="{{ asset('assets/images/resources/userlist-2.jpg') }}" alt=""></figure>
														<p>coooooooooool dude ;)</p>
													</li>
												</ul>
												<div class="message-text-container">
													<form method="post">
														<textarea></textarea>
														<button title="send"><i class="fa fa-paper-plane"></i></button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div><!-- centerl meta -->
							
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
					<i><img src="{{ asset('assets/images/credit-cards.png') }}" alt="">
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