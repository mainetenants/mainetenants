@include('includes/header')

@php
     $get_all_page = get_all_page(); 
     $get_user_like_page = get_user_like_page();


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
                        <h4 class="widget-title">Pages</h4>
                        <div class="container mb-4">
                              <div class="col-sm-12">
                                  <ul>
                                      @if($get_all_page != "")
                                      @foreach($get_all_page as $all_page)
                                       <li><a href="/fav-page/{{ $all_page->msu_user_page_id  }}" ><h5 class="text-dark">{{ $all_page->page_info }}</h6></a></li>
                                      @endforeach
                                       @else
                                        <li><a href="#" ><h5 class="text-dark">No pages.</h6></a></li>
                                      @endif
                                  </ul>
                              </div>
                           
                        </div>
                        <ul class="naves">
                            
                            <li>
                                <a  title="" class="btn btn-sm btn-info text-white" href="/create-page">Create New Pages</a>
                            </li>
                            <li>
                                <i class="ti-home"></i>
                                <a title="/homepage" href="">Home</a>
                            </li>
                            {{-- <li>
                                <i class="ti-user"></i>
                                <a title="" href="">Your Pages</a>
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
                                        <a title="" href="">Past Pages</a>
                                    </li>
                                </ul>
                            </li> --}}
                            <li>
                                <i class="fa fa-thumbs-up"></i>
                                <a title="" href="/like_user_page">like pages</a>
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
                    <div class="feature-photo" >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="timeline-info">
                                        <ul>
                                            <li><span><h4><i class="fa fa-search"></i>&nbsp;&nbsp;Discover Pages</h4></span></li>
                                            <li class="float-right">
                                                <a class="" href="time-line.html" title="" data-ripple="">Top</a>
                                                <a class="" href="timeline-photos.html" title="" data-ripple="">This weak</a>
                                                <a class="" href="timeline-videos.html" title="" data-ripple="">Online Pages</a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                           
                                <div class="col-lg-12 col-sm-12 mt-5">
                                    <div class="card" style="width: 100%;">
                                       <div class="card-body">
                                          <h5 class="card-title">Liked Pages </h5>

                                          @if(!empty($get_user_like_page))

                                          @foreach($get_user_like_page as $like_page)

                                          <div class="user_card">
                                              <div class="row">
                                                  <div class="col-sm-6 text-left">
                                                      <img src="assets/images/resources/user-avatar2.jpg" class="rc_profile_pic" style="max-width: 60px" alt="">
                                                      <span class="rc_name">{{ $like_page->page_info }}</span>
                                                   </div>
                                                   <div class="col-sm-6 text-right">
                                                        <button type="button" name="like_page" id="like_page" class="btn btn-primary col-sm-5">Liked</button>
                                                    </div>
                                                </div>
                                         </div>

                                           @endforeach
                                          @else 

                                          <h4 class="text-center">No page like</h4>

                                          @endif
                                          
                                          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="btn btn-sm btn-info float-right"><i class="ti-share"></i></a>
                                          <a href="#" class="btn btn-sm btn-info mx-2 float-right">Interested</a> --}}
                                        </div>
                                      </div>
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