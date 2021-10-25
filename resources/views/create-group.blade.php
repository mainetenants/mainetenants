@include('includes/header')
@php 
    

$get_user_group = get_user_group();



@endphp
<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="row merged20" id="page-contents">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <aside class="sidebar static">
                            <div class="widget">
                                <h4 class="widget-title">Manage Group</h4>
                                <div class="container mb-3 ml-2">
                                    @foreach ($get_user_group as  $user_group) 
                                    <a href="../my_group/{{ $user_group->id }}">   
                                    <div class="new-postbox">
                                            <span class="host">
                                                <img src="http://127.0.0.1:8000/assets/images/resources/admin2.jpg" alt="">
                                            </span>
                                            {{-- <span class="owner">Username Host</span> --}}
                                            <span class="owner"> <span class="host mr-3">{{ $user_group->group_name }}</span></span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <ul class="naves">
                                    <li>
                                        <a title="" class="btn btn-sm btn-info text-white col-sm-12  " data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" href="# ">Create New group</a>
                                    </li>
                                    <li>
                                        <i class="ti-home"></i>
                                        <a title="" href="">Home</a>
                                    </li>
                                    <li>
                                        <i class="ti-user"></i>
                                        <a title="" href="">Your Group</a>
                                        <ul class="naves">
                                            <li>
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                <a title="" href="">Like Group</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                <a title="" href="">Invitation</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="feature-photo">
                            <div class="container-fluid">
                                <div class="col-md-12">
                                    <div class="timeline-info">
                                        <ul>
                                            <li><span>
                                                    <h4><i class="fa fa-search"></i>&nbsp;&nbsp;Discover Group
                                                    </h4>
                                                </span>
                                            </li>
                                            <li class="float-right">
                                                <a class="" href="time-line.html" title="" data-ripple="">Top</a>
                                                <a class="" href="timeline-photos.html" title="" data-ripple="">This
                                                    weak</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card  mt-5 pt-5">
                                <div class="user_card">
                                    @foreach ($get_user_group as  $user_group)
                                        
                                    <div class="row">
                                        <div class="col-sm-6 text-left">
                                            <img src="../assets/images/user_image.png" class="rc_profile_pic" style="max-width: 60px" alt="">
                                            <span class="rc_name">{{ $user_group->group_name }}</span>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <button type="button" name="page_notifications" id="page_notifications_nav" onclick="page_notifications(1,0)" class="btn btn-primary col-sm-5"><i class="fas fa-globe mr-2"></i>Notifications</button>
                                            <button type="button" name="message" id="message" class="btn btn-primary col-sm-5"><i class="fas fa-envelope mr-2"></i>Message</button>
                                        </div>
                                    </div>
                                        
                                    @endforeach
                                </div>
                            </div> 
                       </div>   
                       <div>
                           
                    
                       </div>         
                        <!--  Create Group Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="create-group" method="post" id="create_save_group"  name="create_save_group" >
                                       @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create New Group </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Group Name</label>
                                                <input type="text" class="form-control border bordered-primary" id="group_name" name="group_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Group Category</label>
                                                    <input type="text" class="form-control border bordered-primary" id="group_category" name="group_category">
                                                </div>
                                                <div class="form-group">
                                                <label for="message-text" class="col-form-label">Group Descripition</label>
                                                <textarea class="form-control border bordered-primary" id="group_descripition" name="group_descripition"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Only See</label>
                                                    <select class="form-control border bordered-primary" name="only_see" id="only_see" >
                                                        <option value="">Select One</option>
                                                        <option value="Public">Public</option>
                                                        <option value="Private">Private</option>
                                                        <option value="only_friends">Only Friends</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" name="create_group_submit" id="create_group_submit" class="btn btn-primary">Create Group</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            <!-- End Create Group Modal -->
                            <!-- side panel -->
                            @include('includes/footer')
                            </body>

                            </html>
