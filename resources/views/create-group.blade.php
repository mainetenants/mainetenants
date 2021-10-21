@include('includes/header')
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
                                    <div class="new-postbox">
                                        <span class="host">
                                            <img src="http://127.0.0.1:8000/assets/images/resources/admin2.jpg" alt="">
                                        </span>
                                        {{-- <span class="owner">Username Host</span> --}}
                                        <span class="owner"> <span class="host">Username </span> <span
                                                class="host">Host</span></span>
                                    </div>
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
                                                </span></li>
                                            <li class="float-right">
                                                <a class="" href="time-line.html" title="" data-ripple="">Top</a>
                                                <a class="" href="timeline-photos.html" title="" data-ripple="">This
                                                    weak</a>
                
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <!--  Create Group Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="#" method="post" id="create_group" name="create_group" >
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
                                            <button type="Submit" name="submit" id="submit" class="btn btn-primary">Create Group</button>
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
