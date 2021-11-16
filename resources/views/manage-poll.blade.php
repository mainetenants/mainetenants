@include('includes/header')
@php

$get_all_page = get_all_page();
$get_page_invitation_like = get_page_invitation_like();
$get_page_notifications = get_page_notifications();
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
                           <h4 class="widget-title">Polls</h4>
                           <div class="container mb-4">
                              <div class="col-sm-12">
                                 <ul>
                                    @if($get_all_page != "")
                                    @foreach($get_all_page as $all_page)
                                    <li>
                                       <a href="/fav-page/{{ $all_page->msu_user_page_id  }}" >
                                        @if($all_page->profile_image != "")
                                        <img src="{{  url('upload/images/profile_photo/'.$all_page->profile_image) }}" class="rc_profile_pic mr-3" style="max-width: 60px" alt="">
                                         @else
                                         <img src="../assets/images/user_image.png" class="rc_profile_pic mr-3" style="max-width: 60px" alt="">
                                        @endif 
                                        <span class="text-dark ">{{ $all_page->page_info }}</span>
                                       </a>
                                    </li>
                                    @endforeach
                                    @else
                                    <li>
                                       <a href="#" >
                                          <h5 class="text-dark"> No polls.</h5>
                                       </a>
                                    </li>
                                    @endif
                                 </ul>
                              </div>
                           </div>
                           <ul class="naves">
                              <li>
                                 <a  title="" class="btn btn-primary col-sm-12 text-white"  data-toggle="modal" data-target="#exampleModal">Create New Polls</a>
                              </li>
                              <li>
                                 <i class="ti-home"></i>
                                 <a href="" onclick="return false" id="homepage_nav">All polls</a>
                              </li>
                              <li>
                                <i class="ti-files text-secondary"></i>
                                <a href="" onclick="return false" id="page_poll_nav">Page polls</a>
                             </li>
                             <li>
                                <i class="ti-calendar text-secondary"></i>
                                <a href="" onclick="return false" id="post_poll_nav">Post polls</a>
                             </li>
                             <li>
                                <i class="fa fa-users"></i>
                                <a href="" onclick="return false" id="
                                ">group polls</a>
                             </li>
                           </ul>
                        </div>
                     </aside>
                  </div>
                   <div class="col-lg-9">
                    <div class="feature-photo dashboard"  id="Dashboard">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-lg-12">
                                
                                 <div class="timeline-info">
                                    <ul>
                                       <li>
                                          <span>
                                             <h4><i class="fa fa-search"></i>&nbsp;&nbsp;Discover Pages</h4>
                                          </span>
                                       </li>
                                       <li class="float-right">
                                          <a class="" href="time-line.html" title="" data-ripple="">Top</a>
                                          <a class="" href="timeline-photos.html" title="" data-ripple="">This weak</a>
                                          <a class="" href="timeline-videos.html" title="" data-ripple="">Online Pages</a>
                                       </li>
                                    </ul>
                                 </div>
                                
                              </div>
                              <div class="col-lg-12 mt-1">
                                <div class=" card-header p-3 mb-0 ">
                                        
                                    <h5 class="card-title mb-0"><i class="fa fa-thumbs-up mr-3"></i><span class="text-dark">Polls you manage</span></h5>
                                </div>
                                 <div class="card mt-3" style="width: 100%;">
                                    <div class="card-body">
                                      <div class="user_card">
                                        @foreach($get_all_user_poll as $get_user_poll )
                                        {{-- @php dd($get_user_poll); @endphp --}}
                                            <div class="row p-2">
                                                <div class="col-sm-6 text-left">
                                                    <span class="rc_name">{{ $get_user_poll->poll_title }}</span>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <button type="button" name="message" id="message" onclick="edit_poll('{{ $get_user_poll->id }}','{{ $get_user_poll->poll_title }}','{{ $get_user_poll->user_id }}','{{ $get_user_poll->poll_category }}','{{ $get_user_poll->poll0 }}','{{ $get_user_poll->expiry_time  }}')" class="btn btn-primary col-sm-5"><i class="fas fa-edit mr-2"></i>Edit</button>
                                                    
                                                    <button type="button" name="message" onclick="delete_poll({{ $get_user_poll->id }})" id="message" class="btn btn-danger col-sm-5"><i class="fas fa-times mr-2"></i>Delete</button>
                                                </div>
                                           </div>
                                           <hr/>
                                           @endforeach
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> 
                     <div class="card feature-photo dashboard"  style="display:none;"  id="manage_group_poll">
                        <div class="card-title p-4 ">
                              <h4>Manage Group poll</h4>
                        </div>
                        <br/>
                        <div class="card-body">
                           
                           <div class="user_card">
                             @foreach($get_group_user_poll as $get_user_poll )
                             {{-- @php dd($get_user_poll); @endphp --}}
                                 <div class="row p-2">
                                     <div class="col-sm-6 text-left">
                                         <span class="rc_name">{{ $get_user_poll->poll_title }}</span>
                                     </div>
                                     <div class="col-sm-6 text-right">
                                         <button type="button" name="message" id="message" onclick="edit_poll('{{ $get_user_poll->id }}','{{ $get_user_poll->poll_title }}','{{ $get_user_poll->user_id }}','{{ $get_user_poll->poll_category }}','{{ $get_user_poll->poll0 }}','{{ $get_user_poll->expiry_time  }}')" class="btn btn-primary col-sm-5"><i class="fas fa-edit mr-2"></i>Edit</button>
                                         
                                         <button type="button" name="message" onclick="delete_poll({{ $get_user_poll->id }})" id="message" class="btn btn-danger col-sm-5"><i class="fas fa-times mr-2"></i>Delete</button>
                                     </div>
                                </div>
                                <hr/>
                                @endforeach
                            </div>
                         </div>
                     </div>
                     <div class="card feature-photo dashboard" style="display: none;" id="manage_page_poll">
                        <div class="card-title p-4 ">
                              <h4>Manage Page poll</h4>
                        </div>
                        <br/>
                        <div class="card-body">
                           
                           <div class="user_card">

                             @foreach($get_page_user_poll as $get_user_poll )
                             {{-- @php dd($get_user_poll); @endphp --}}
                                 <div class="row p-2">
                                     <div class="col-sm-6 text-left">
                                         <span class="rc_name">{{ $get_user_poll->poll_title }}</span>
                                     </div>
                                     <div class="col-sm-6 text-right">
                                         <button type="button" name="message" id="message" onclick="edit_poll('{{ $get_user_poll->id }}','{{ $get_user_poll->poll_title }}','{{ $get_user_poll->user_id }}','{{ $get_user_poll->poll_category }}','{{ $get_user_poll->poll0 }}','{{ $get_user_poll->expiry_time  }}')" class="btn btn-primary col-sm-5"><i class="fas fa-edit mr-2"></i>Edit</button>
                                         
                                         <button type="button" name="message" onclick="delete_poll({{ $get_user_poll->id }})" id="message" class="btn btn-danger col-sm-5"><i class="fas fa-times mr-2"></i>Delete</button>
                                     </div>
                                </div>
                                <hr/>
                                @endforeach
                            </div>
                         </div>
                     </div>
                     <div class="card feature-photo dashboard" style="display: none;" id="manage_post_poll">
                        <div class="card-title p-4 ">
                              <h4>Manage Post poll</h4>
                        </div>
                        <br/>
                        <div class="card-body">
                           
                           <div class="user_card">

                             @foreach($get_post_user_poll as $get_user_poll )
                             {{-- @php dd($get_user_poll); @endphp --}}
                                 <div class="row p-2">
                                     <div class="col-sm-6 text-left">
                                         <span class="rc_name">{{ $get_user_poll->poll_title }}</span>
                                     </div>
                                     <div class="col-sm-6 text-right">
                                         <button type="button" name="message" id="message" onclick="edit_poll('{{ $get_user_poll->id }}','{{ $get_user_poll->poll_title }}','{{ $get_user_poll->user_id }}','{{ $get_user_poll->poll_category }}','{{ $get_user_poll->poll0 }}','{{ $get_user_poll->expiry_time  }}')" class="btn btn-primary col-sm-5"><i class="fas fa-edit mr-2"></i>Edit</button>
                                         
                                         <button type="button" name="message" onclick="delete_poll({{ $get_user_poll->id }})" id="message" class="btn btn-danger col-sm-5"><i class="fas fa-times mr-2"></i>Delete</button>
                                     </div>
                                </div>
                                <hr/>
                                @endforeach
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
         <input type="checkbox" id="nightmode1"/>
         <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
      </div>
      <div class="setting-row">
         <span>Notifications</span>
         <input type="checkbox" id="switch22" />
         <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
      </div>0
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