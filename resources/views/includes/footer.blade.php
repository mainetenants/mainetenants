<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Poll</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" id="create_poll" name="create_poll"  onsubmit="return false" >
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control  border bordered-secondary" id="exampleInputEmail0" name="poll_title" aria-describedby="emailHelp" placeholder="title" required="required">
                </div>
                <div class="form-group poll_option_replace">
                    <label for="exampleInputPassword1">Poll Option</label>
                    <div class="row p-3"><div class="col-sm-10 p-0"><input type="text" class="form-control border bordered-secondary p-3" id="exampleInputEmail1" name="add_poll[]" aria-describedby="emailHelp" required="required" placeholder="Add poll" value=""></div><div class="col-sm-2 p-0"><i class="fa fa-times p-2  btn btn-primary remove_btn" aria-hidden="true"></i></div></div>
                    <div class="row p-3"><div class="col-sm-10 p-0"><input type="text" class="form-control border bordered-secondary p-3" id="exampleInputEmail1" name="add_poll[]" aria-describedby="emailHelp" required="required"  placeholder="Add poll" value=""></div><div class="col-sm-2 p-0"><i class="fa fa-times p-2  btn btn-primary remove_btn" aria-hidden="true"></i></div></div>
                    <div id="add_polls"></div>
                    <div class="col-sm-12 text-right"><button class="btn btn-primary col-sm-1" id="add_poll_option"><i class="fa fa-plus" aria-hidden="true"></i></button></div> 
                </div>
                <div class="form-group ">
                    <label>Poll Category</label>
                    <input type="text" class="form-control  border bordered-secondary" id="exampleInputEmail0" name="poll_category" aria-describedby="emailHelp" placeholder="title" required="required">
            
                </div>
                <div class="row">
                <div class="form-group col-sm-12 poll_option_expiry">
                    <label for="exampleInputEmail1">Expiry Date & Time</label>
                    <input type="datetime-local" class="form-control col-sm-12 border bordered-secondary" id="exampleInputEmail0" name="expiry_time" aria-describedby="emailHelp" placeholder="title" required="required" value="">
                </div>

                </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <input type="hidden" name="expiry_time_id" id="expiry_time_id" value=""/>
                    
                </div>
            </div>
        </form>
        </div>
    </div>

<!-- End modal -->




<!-- Modal -->
<div class="modal fade" id="deletepost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to Delete the Post?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="delete_page_post" class="btn btn-primary">OK</button>
                <input type="hidden" name="modal_post_id" id="modal_post_id" value="" />
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/map-init.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/reply_group_comment.js') }}"></script>

<script src="{{ asset('js/progress-bar.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/ueqxpvc9gv7hzpnpf4jj0kq9h4n1c3ijg41bb4aqnlyvfa28/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI">
</script>

<script>

    $(document).on('click','#add_poll_option',function(){
        $('#add_polls').append('<div class="row p-3"><div class="col-sm-10 p-0"><input type="text" class="form-control border bordered-secondary p-3" id="exampleInputEmail1" name="add_poll[]" aria-describedby="emailHelp" placeholder="Add poll"></div><div class="col-sm-2 p-0"><i class="fa fa-times p-2  btn btn-primary remove_btn" aria-hidden="true"></i></div></div>');
    });

    $(document).on('click','.remove_btn',function(){
        $(this).parent().parent('div').remove();
    });

    $('#create_poll').submit(function(){
         
         var data=$('#create_poll').serialize();

         $.ajax({
            type:'post',
            url :'{{ url("create_poll") }}',
            data :data,
            success: function(data){
                if(data['status'] == 1){

                    $('#exampleModal').hide();
                }      
            },
         });
    });
    $('input[type=radio][id=exampleInputEmail1]').on('change', function() {
           var value = $(this).val();
           var poll_id = $('#poll_id').val();
           var post_id = $('#poll_post_id').val();
           var checked_poll_id = $('#checked_poll_id').val();
                 
           $.ajax({
              type:'post',
              url :'{{ url("poll_result") }}',
              data:{
                  value:value,
                  poll_id:poll_id,
                  post_id:post_id,
                  checked_poll_id:checked_poll_id
              },
              success:function(data){
                  if(result['data'] == 1){

                      console.log(result['data']);
                  }
              } 
           });
        });

    $('input[type=radio][id=exampleInputEmail2]').on('change', function() {
        
           var value = $(this).val();
           var poll_id = $('#poll_id1').val();
           var post_id = $('#poll_post_id1').val();
           var checked_poll_id = $('#checked_poll_id1').val();
           alert(checked_poll_id);

           $.ajax({
              type:'post',
              url :'{{ url("poll_result") }}',
              data:{
                  value:value,
                  poll_id:poll_id,
                  post_id:post_id,
                  checked_poll_id:checked_poll_id
              },
              success:function(data){
                  if(data['status_res'] == 1){

                      console.log(result['data']);
                  }
              } 
           });
        });
        
        function edit_poll(id,poll_title,user_id,poll_category,poll0,expiry_time){
            
            var poll_result = poll0.split(',');
            var i;
            
            $('input[type=text][name=poll_title]').val(poll_title);
            $('input[type=text][name=poll_category').val(poll_category);
            var value ='<label for="exampleInputPassword1">Poll Option</label><div class="row p-3">';
            for(i=0;i< poll_result.length;i++){
                value += '<div class="col-sm-10 p-3"><input type="text" class="form-control border bordered-secondary p-3" id="exampleInputEmail1" name="add_poll[]" aria-describedby="emailHelp" required="required"  placeholder="Add poll" value="'+poll_result[i]+'"></div><div class="col-sm-2 p-3"><i class="fa fa-times p-2  btn btn-primary remove_btn" aria-hidden="true"></i></div>';
             }
             value +='</div><div id="add_polls"></div><div class="col-sm-12 text-right"><button class="btn btn-primary col-sm-1" id="add_poll_option"><i class="fa fa-plus" aria-hidden="true"></i></button></div>';
 
             var value1 ='<label for="exampleInputEmail1">Expiry Date & Time</label><input type="datetime-local" class="form-control col-sm-12 border bordered-secondary" id="exampleInputEmail1" name="expiry_time" aria-describedby="emailHelp" placeholder="title" required="required" value="'+expiry_time+'">';
             $('.poll_option_replace').html(value);
            $('.poll_option_expiry').html(value1);
            $('#expiry_time_id').val(id);
            $('#exampleModal').modal('toggle');    
        }
        
        function delete_poll(id){
            $.ajax({
               type:'post',
               url:'{{ url("delete_created_poll") }}',
               data:{
                   id:id,
               },
               success:function(data){
                    console.log(data);
 
               },
            });

        }
    //comments on post ajax
    // $('#comment').keypress(function (event) {

    //     if (event.keyCode == 13 && event.shiftKey) {
    //         var content = this.value;
    //         var caret = getCaret(this);
    //         this.value = content.substring(0, caret) + "\n" + content.substring(carent, content.length - 1);
    //         event.stopPropagation();
    //     } else if (event.keyCode == 13) {
    //         $('#comment-form').submit();
    //     }
    // });

    function getCaret(el) {

        if (el.selectionStart) {
            return el.selectionStart;
        } else if (document.selection) {
            el.focus();

            var r = document.selection.createRange();
            if (r == null) {
                return 0;
            }

            var re = el.createTextRange(),
                rc = re.duplicate();
            re.moveToBookmark(r.getBookmark());
            rc.setEndPoint('EndToStart', re);

            return rc.text.length;
        }
        return 0;
    }

    $('.post-opt').click(function () {
        $('.opt-list').toggle();
    });

    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // like dislike and reaction emoticons
    $(".reaction_post i img, #dislikeId").click(function () {
        var id = '';
        var reaction = '';
        var data = $(this).attr('class').split(' ')[0];
        if (data == 'emoji') {
            id = $(this).parent().parent().attr('value');
            reaction = $(this).parent().attr('id');
        } else {
            id = $(this).attr('value');
        }
        $.ajax({
            type: 'POST',
            url: '{{ url("like") }}',
            data: {
                post_id: id,
                reaction: reaction,
                data: data
            },
            success: function (data) {
                $('.reaction').hide();
            }
        });
    });


    function seen_notification() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $(this).attr('value');;
        $.ajax({
            type: 'POST',
            url: '{{ url("seen") }}',
            data: {
                post_id: id,

            },
            success: function (data) {

            }
        });

    }


    function myFunction() {
        var post_id = $('#edit-post').attr('value');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //edit posts description
        $.ajax({
            type: 'POST',
            url: '{{ url("get-post") }}',
            data: {
                post_id: post_id
            },
            success: function (data) {
                // console.log(data);
                $('#editpost').modal('toggle');
                $("[data-toggle='popover']").popover('hide');
                $(".postoverlay").css({
                    "display": "block",
                    "opacity": "0.837666"
                });
                $(".central-meta.new-pst").css({
                    "z-index": "0"
                });

                $('#post_contet').append(
                    '<textarea class="form-control" name="content" id="content" rows="3" placeholder="Enter text here to edit">' + data
                    .content + '</textarea><input type="hidden" name="post_id" value="' + data.post_id +
                    '">')
                $('.post-card-img').append('<img class="card-img-top" src="upload/images/' + data.image +
                    '" alt="Card image cap">')
            }
        });
        //emoticons listing

    }

    function myPageFuntction() {
        var post_id = $('#edit-post').attr('value');



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //edit posts description
        $.ajax({
            type: 'POST',
            url: '{{ url("get_page_post") }}',
            data: {
                post_id: post_id
            },
            success: function (data) {

                console.log(data);
                if (data['status'] == 1) {
                    var content = data['get_page_post'];
                    $('.popover-body').hide();
                    $('.arrow').hide();
                    $('#editpost').modal('toggle')
                    $('#post_contet').append(
                        '<textarea class="form-control" style="border: 1px solid #e5e5e5;"Placeholder="Whats on your mind?" name="content" id="content" rows="3">' +
                        content.content + '</textarea><input type="hidden" name="post_id" value="' +
                        content.id + '">')
                    if (content.images != "") {
                        $('.img-exist').show();
                        $('.post-card-img').append(
                            '<img class="card-img-top  col-sm-12 mx-auto" width="50%" style="width: fit-content;" src="http://127.0.0.1:8000/upload/images/profile_photo/' +
                            content.images + '" alt="Card image cap">')
                    }
                    if (content.videos != "") {
                        $('.img-exist').show();
                        $('.post-card-img').append('<video width="400" controls><source src="' + content
                            .videos + '" type="video/mp4"></video>');
                    }
                    if (content.music != "") {
                        $('.img-exist').show();
                        $('.post-card-img').append('<audio controls><source src="' + content.music +
                            '" type="audio/mpeg"></audio>');
                    }

                }
            },
        });
        //emoticons listing

    }
    $("#editpost").on("hidden.bs.modal", function () {
        $('#content').remove();
        $('.card-img-top').remove();
        $(".postoverlay").css({
            "display": "none",
            "opacity": "0.837666"
        });
    });

    $('#edit-post-submit').click(function () {
        $("#edit_form").submit();
        $('.popover-body').hide();
        $('.arrow').hide();

        $('#editpost').on('show.bs.modal', function () {
            $('.ti-more-alt').toggle();
            $(".postoverlay").css({
                "display": "block",
                "opacity": "0.837666"
            });
            $(".central-meta.new-pst").css({
                "z-index": "0"
            });

        });
        $('.ti-more-alt').click(function () {
            $('.popover-body').show();
            $('.arrow').show();
        });
        // $('#editpost').on('show.bs.modal', function() {
        //     $('.ti-more-alt').toggle();
        // });
    });

</script>
<script>
    // reactions on post
    $('#likeId .ti-heart').click(function () {
        $('.reaction').toggle();
        $('.reaction').delay(10000).fadeOut();
    });

    $('#fileid').change(function () {
        $('#profile_form').submit();
    });

    $('#fileid_change').change(function () {

        $('#submit_profile_photo').submit();
    });

    $('#file_cover_chnage').change(function () {
        $('#edit_cover_photo').submit();
    });
    $('#coverid').change(function () {
        $('#cover_form').submit();
    });

    /// page post comment

    $('#page_post_comments').submit(function () {
        var formdata = new FormData();
        var type= $('#type').val();
        $.ajax({
            type: 'POST',
            url: '{{ url("fav-page") }}',
            data: {
                data: formdata
            },
            success: function (data) {

                console.log(data);
            },
        });
    });
    
    // add remove active class form navtabs in reaction listing 
    $('.tab-a').click(function () {
        $('.nav-tabs .nav-link').removeClass('active');
        $(this).parent().addClass('active');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.rec').click(function () {
        $.ajax({
            type: 'POST',
            url: '{{ url("get-reaction") }}',
            data: {
                post_id: $(this).attr('data_id')
            },
            success: function (data) {
                $('.user_card').remove();
                console.log(data);
                if (data.allReaction) {
                    var selector = '';
                    var count = [];
                    var count_like_rc = '';
                    var count_love_rc = '';
                    var count_haha_rc = '';
                    var count_angry_rc = '';
                    var count_care_rc = '';
                    var count_wow_rc = '';
                    var count_sad_rc = '';
                    console.log(data.allReaction);
                    $.each(data.allReaction, function (key, val) {
                        var html_add = (val.is_frnd_status == 1) ? ('') : (
                            '<a href="see_friend/' + val.id +
                            '" class="btn btn-primary btn-sm add_rc_frnd">Add Friends</a>'
                            );
                        $('.allfrnd').append(
                            '<div class="user_card"><div class="row"><div class="col-sm-6 text-left"><img src="upload/images/' + val.profile_photo + '.jpg" class="rc_profile_pic" style="max-width: 60px" alt=""><span class="rc_name">' + val.name + '</span></div><div class="col-sm-6 text-right">' + html_add + '</div></div></div>');


                        if (val.reaction == 1) {
                            var selector = 'like_rc';
                            count_like_rc++;
                        }
                        if (val.reaction == 2) {
                            var selector = 'love_rc';
                            count_love_rc++;
                        }
                        if (val.reaction == 3) {
                            var selector = 'haha_rc';
                            count_haha_rc++;
                        }
                        if (val.reaction == 4) {
                            var selector = 'angry_rc';
                            count_angry_rc++;
                        }
                        if (val.reaction == 5) {
                            var selector = 'care_rc';
                            count_care_rc++;
                        }
                        if (val.reaction == 6) {
                            var selector = 'wow_rc';
                            count_wow_rc++;
                        }
                        if (val.reaction == 7) {
                            var selector = 'sad_rc';
                            count_sad_rc++;
                        }
                        $('.' + selector).append(
                            '<div class="user_card"><div class="row"><div class="col-sm-6 text-left"><img src="upload/images/' +
                            val.profile_photo +
                            '.jpg" class="rc_profile_pic" style="max-width: 60px" alt=""><span class="rc_name">' +
                            val.name +
                            '</span></div><div class="col-sm-6 text-right">' +
                            html_add + '</div></div></div>');
                    });
                    $('.ins_like').html('&nbsp;' + count_like_rc);
                    $('.ins_love').html('&nbsp;' + count_love_rc);
                    $('.ins_haha').html('&nbsp;' + count_haha_rc);
                    $('.ins_angry').html('&nbsp;' + count_angry_rc);
                    $('.ins_care').html('&nbsp;' + count_care_rc);
                    $('.ins_wow').html('&nbsp;' + count_wow_rc);
                    $('.ins_sad').html('&nbsp;' + count_sad_rc);
                    if (count_like_rc == '') {
                        $('.ins_like').parent().parent().remove()
                    }
                    if (count_love_rc == '') {
                        $('.ins_love').parent().parent().remove()
                    }
                    if (count_haha_rc == '') {
                        $('.ins_haha').parent().parent().remove()
                    }
                    if (count_angry_rc == '') {
                        $('.ins_angry').parent().parent().remove()
                    }
                    if (count_care_rc == '') {
                        $('.ins_care').parent().parent().remove()
                    }
                    if (count_wow_rc == '') {
                        $('.ins_wow').parent().parent().remove()
                    }
                    if (count_sad_rc == '') {
                        $('.ins_sad').parent().parent().remove()
                    }
                }
                  $('#reaction').modal('toggle');

            }
        });
        // alert();
    });

    function send_invitation() {


        var friend_id = $('#friend_id').val();
        var post_id = $('#post_id').val();

        $.ajax({
            type: 'POST',
            url: '{{ url("invite-friend") }}',
            data: {
                friend_id: friend_id,
                post_id: post_id
            },
            success: function (data) {

                if (data['status'] == 1) {

                    $('#invitation_cancel').show();
                    $('#send_invitation').hide();

                }


            },
        });

    }

    $('#invitation_cancel').click(function () {


        var friend_id = $('#friend_id').val();
        var post_id = $('#post_id').val();

        $.ajax({
            type: 'POST',
            url: '{{ url("cancel_invitation") }}',
            data: {
                friend_id: friend_id,
                post_id: post_id
            },
            success: function (data) {

                if (data['status'] == 1) {

                    $('#invitation_cancel').hide();
                    $('#send_invitation').show();

                }
            },
        });

    });

    $('#like_page').click(function () {
        var page_id = $('#like_page_id').val();
        var friend_id = $('#like_friend_id').val();
        $.ajax({
            type: 'POST',
            url: '{{ url("like_page") }}',
            data: {
                page_id: page_id,
                friend_id: friend_id
            },
            success: function (data) {
                if (data['status'] == 1) {
                    $('#like_page').hide();
                    $('#unlike_page').show();
                }

            },

        });
    });

    $('#unlike_page').click(function () {
        var page_id = $('#like_page_id').val();
        var friend_id = $('#like_friend_id').val();

        $.ajax({
            type: 'POST',
            url: '{{ url("unlike_page") }}',
            data: {
                page_id: page_id,
                friend_id: friend_id
            },
            success: function (data) {

                if (data['status'] == 1) {

                    $('#like_page').show();
                    $('#unlike_page').hide();
                }

            },

        });
    });

    function page_notifications(id, key) {
        var page_id = id;

        $.ajax({
            type: 'POST',
            url: '{{ url("get_page_notifications") }}',
            data: {
                page_id: page_id,
            },
            success: function (data) {

                if (data['status'] == 1) {
                    $("#page_notifications").show();
                    $('#Dashboard').hide();
                    $('#page_notfiction_response').append(data['get_page_notifications']);

                }
            },
        });
    }
    $('#homepage_nav').click(function () {
        $('#Dashboard').show();
        $('#page_notifications').hide();
        $("#page_notfiction_response div").remove();
        $('#notifications').hide();
        $('#list_user_page').hide();
    });
    $('#page_notifications_nav').click(function () {
        $('#Dashboard').hide();
        $("#page_notfiction_response div").remove();
        $('#page_notifications').show();
        $('#notifications').hide();
        $('#list_user_page').hide();
    });
    $('#notifications_nav').click(function () {
        $('#Dashboard').hide();
        $('#page_notifications').hide();
        $("#page_notfiction_response div").remove();
        $('#notifications').show();
        $('#list_user_page').hide();
    });
    $('#list_user_page_nav').click(function () {
        $('#Dashboard').hide();
        $('#page_notifications').hide();
        $("#page_notfiction_response div").remove();

        $('#notifications').hide();
        $('#list_user_page').show();
    });


    function get_profile_pic() {

        $('#submit_profile_photo').submit();
    }

    $('#edit-page-post-submit').click(function () {
        $('#edit_page_form').submit();

    });

    $('.page_post_image').change(function () {

        readURL(this);

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                //$('#edit_image23').attr('src', e.target.result);

                $('#display_img').append('<img src="' + e.target.result +
                    '" name="edit_image23" id="edit_image23" class="img-fluid col-sm-12 " />');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function openMoodal(id) {
        $('.popover-body').hide();
        $('.arrow').hide();
        $('#deletepost').modal('toggle');
        $('#modal_post_id').val(id);
    }
    $('.ti-more-alt').click(function () {

        $('.popover-body').show();

    });
    $('#delete_page_post').click(function () {
        var post_id = $('#modal_post_id').val();
        $.ajax({
            type: 'post',
            url: '{{ url("/delete-post") }}',
            data: {
                post_id: post_id,
            },
            success: function (data) {

                console.log(data);
                if (data['status_res'] == 1) {

                    location.reload();
                }
            },
        });
    });

    function delete_comment(cmt_id) {
        $.ajax({
            type: 'post',
            url: "{{ url('/delete-comment') }}",
            data: {
                cmt_id: cmt_id,
            },
            success: function (data) {
                console.log(data);
                if (data['status_res'] == 1) {
                    location.reload();
                }
            },
        });

    }

    function like_page_post_cmt(cmt_id, post_id) {

        $.ajax({
            type: 'post',
            url: "{{ url('/like_page_post_cmt') }}",
            data: {
                cmt_id: cmt_id,
                post_id: post_id
            },
            success: function (data) {
                if (data['status_res'] == 1) {
                    location.reload();
                }
            }
        });


    }

    function dislike_page_post_cmt(cmt_id, post_id) {

        $.ajax({
            type: 'post',
            url: "{{ url('/dislike_page_post_cmt') }}",
            data: {
                cmt_id: cmt_id,
                post_id: post_id
            },
            success: function (data) {
                if (data['status_res'] == 1) {
                    location.reload();
                }
            }
        });


    }
    // var numItems = $('.we-reply').length;
    // var i;
    // for(i=0;i<numItems;i++){
    // $('#we-reply'+i).click(function(){

    //     alert('hi');
    //     $("#new_cmt_box:nth-child("+i+")" ).show();
    // });
    $('.we-reply').click(function () {
        var post_id = $('#post_id1').val();
        var comment_id = $(this).attr('data-id');
        alert($(this).attr('data-id'));
        $(this).parent().parent().parent().html(
            '<div id="new_cmt_box" ><form method="post" id="page_post_replay_comments" enctype="multipart/form-data"  action="{{ url("save-reply-comment") }}">@csrf<div class="row m-4"><div class="col-sm-11 p-0"><textarea placeholder="Post your comment" id="page_post_reply_comment" name="page_post_reply_comment"></textarea></div><div class="col-sm-1"><input type="hidden" name="post_id1" id="post_id1" value="' +
            post_id + '"><input type="hidden" name="comment_id" id="comment_id" value ="' + comment_id +
            '"/><input type="hidden" name="status" id="status" value ="1"/><button type="submit" id="replay_comments" class="btn btn-primary"><i class="far fa-paper-plane"></i></button></div></div>'
            );

    });

    // }

    $('#replay_comments').click(function () {
        $('#page_post_replay_comments').submit();
    });
    function delete_post_reply_comment(cmt_id,post_id){

       $.ajax({
         type:'post',
         url :'{{ url("delete_reply_comments")}}',
         data:{
            cmt_id: cmt_id,
            post_id: post_id
                 
         },
        success:function(data){
            if (data['status_res'] == 1) {
                    location.reload();
                }
            }
       });


    }

    function like_page_post_inner_cmt(cmt_id, post_id) {

        $.ajax({
            type: 'post',
            url: "{{ url('/like_page_post_inner_cmt') }}",
            data: {
                cmt_id: cmt_id,
                post_id: post_id
            },
            success: function (data) {
                if (data['status_res'] == 1) {
                    location.reload();
                }
            },
        });


    }

    function dislike_page_post_inner_cmt(cmt_id, post_id) {

        $.ajax({
            type: 'post',
            url: "{{ url('/dislike_page_post_inner_cmt') }}",
            data: {
                cmt_id: cmt_id,
                post_id: post_id
            },
            success: function (data) {
                if (data['status_res'] == 1) {
                    location.reload();
                }
            },
        });


    }

    function like_post_cmt(cmt_id, post_id) {

        $.ajax({
            type: 'post',
            url: "{{ url('like_post_cmt') }}",
            data: {
                cmt_id: cmt_id,
                post_id: post_id
            },
            success: function (data) {
                console.log(data);
                if (data['status_res'] == 1) {
                    location.reload();
                }
            },
        });


    }

    function dislike_post_cmt(cmt_id, post_id) {

        $.ajax({
            type: 'post',
            url: "{{ url('dislike_post_cmt') }}",
            data: {
                cmt_id: cmt_id,
                post_id: post_id
            },
            success: function (data) {
                console.log(data);
                if (data['status_res'] == 1) {
                    location.reload();
                }
            },
        });


    }

    function delete_post_comment(cmt_id) {

        $.ajax({
            type: 'post',
            url: "{{ url('/delete_post_comment') }}",
            data: {
                cmt_id: cmt_id
            },
            success: function (data) {
                console.log(data);

                if (data[status_res] == 1) {
                    location.reload();
                }
            },
        });
    }

    $('.we-reply1').click(function () {
        var post_id = $(this).attr('post-id');
        var comment_id = $(this).attr('data-id');

        $(this).parent().parent().parents('#new_cmt_box').remove();
        $(this).parent().parent().parent().append(
            '<div id="new_cmt_box" ><form method="post" id="post_replay_comments" enctype="multipart/form-data"  action="{{ url("save-inner-comments") }}">@csrf<div class="row m-4"><div class="col-sm-11 p-0"><textarea placeholder="Reply to the comment" id="page_post_reply_comment" name="page_post_reply_comment"></textarea></div><div class="col-sm-1"><input type="hidden" name="post_id1" id="post_id1" value="' +
            post_id + '"><input type="hidden" name="comment_id" id="comment_id" value ="' + comment_id +
            '"/><input type="hidden" name="status" id="status" value ="1"/><button type="submit" id="replay_comments" class="btn btn-primary"><i class="far fa-paper-plane"></i></button></div></div>'
            );
        

    });
    $('#replay_comments').click(function () {

        $('#post_replay_comments ').submit();

    });

    function like_post_inner_cmt(id, post_id) {

        $.ajax({
            type: 'post',
            url: '{{ url('/inner_post_cmt_like') }}',
            data: {
                id: id,
                post: post_id
            },
            success: function (data) {
                console.log(data)
                if (data['status'] == 1) {
                    location.reload();
                }
            },
        });


    }

    function dislike_post_inner_cmt(id, cmt_id) {
        $.ajax({
            type: 'post',
            url: '{{ url('/inner_post_cmt_dislike') }}'
        });

    }



    $('#friend_search').keyup(function(){

        var search = $('#friend_search').val();    
        $.ajax({
              type:'post',
              url :'{{ url("/getFriends") }}',
              data :{
                   search : search 
              },
              success:function(data){

                   var i;                   
                    var filter = search.toLowerCase();
                    var value = "";
                    $.each(data, function (i) {
                        $.each(data[i], function (key, val) {
                           value += "<li class='label'><a href='/see_friend/"+val['value']+"'>"+val['label']+"</a></li>";
                        });
                    });  
                 $('#search_result').html(value);    
              }
            });       
        });

        $('#file_group_cover_chnage').change(function (){
             $('#edit_group_cover_photo').submit();
        });
        $('#fileid_change').change(function(){
             $('#submit_group_profile_photo').submit();
        });


        $('#send_group_invitation').click(function () {
            var type = $('#type').val();
            var friend_id = $('#friend_id').val();
            var post_id = $('#post_id').val();

              $.ajax({
                type : 'post',
                url  : '{{ url("invite_friend_group") }}',
                data :{
                    type : type,
                    friend_id :friend_id,
                    post_id : post_id
                },
                success:function(data){
                    if(data['status']){
                       
                         $('#send_group_invitation').hide();
                         $('#group_invitation_cancel').show();

                    }
                },

              });

          });

          $('#group_invitation_cancel').click(function (){
            var type = $('#type').val();
            var friend_id = $('#friend_id').val();
            var post_id = $('#post_id').val();

              $.ajax({
                type : 'post',
                url  : '{{ url("invite_group_cancel") }}',
                data :{
                    type : type,
                    friend_id :friend_id,
                    post_id : post_id
                },

                success:function(data){
                   if(data['status']== 1){   
                        $('#send_group_invitation').show();
                        $('#group_invitation_cancel').hide();
                   }
                },

              });
 
          });

          $('#like_group').click(function () {
                var group_id = $('#like_group_id').val();
                 var friend_id = $('#like_friend_id').val();
                 $.ajax({
                      type:'post',
                      url:'{{ url("like_group") }}',
                      data :{
                           group_id : group_id,
                           friend_id : friend_id
                      },
                      success:function(data){
                         console.log(data); 
                        if(data['status']== 1){
                            $('#unlike_group').show();
                            $('#like_group').hide();
                        }   
                              
                      },
                 });

            });
            $('#unlike_group').click(function(){
                var group_id = $('#like_group_id').val();
                 var friend_id = $('#like_friend_id').val();
                
                $.ajax({
                    type:'post',
                    url :'url("unlike_group")',
                    data :{
                        group_id : group_id,
                        friend_id : friend_id
                    },
                    success:function(data){
                        if(data['status']== 1){
                            $('#unlike_group').hide();
                            $('#like_group').show();
                        }   

                    },

                });
            });
            $('.page_group_comments').click(function(){
                $('.p_comment').val(tinymce.get("comment"+$(this).attr('data-id')).getContent());
                var data = $('#page_group_comments'+$(this).attr('data-id')).serialize();
                console.log(data);
                $.ajax({
                    type: 'POST',
                    url: '{{ url("page_group_comments") }}',
                    data: data,
                    success: function (data) {

                        if(data['status']){
                            var data_cmt = data['comments'];
                            console.log(data_cmt);
                            var comment = '<li><div class="comet-avatar">'+
                                    '<img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">'+
                                '</div>'+
                                '<div class="we-comment">'+
                                    '<div class="coment-head">'+
                                    '<h5><a href="time-line" title="">'+data['name']+'</a></h5>'+
                                        '<a class="like" onclick="like_post_cmt(5,2)" href="#"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>'+                                    
                                        '<a class="we-reply-group" href="#" onclick="return false" data-id="'+data_cmt['comment_id']+'" post-id="'+data['post_id']+'" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>'+
                                        '<a class="delete" href="#" onclick="delete_post_comment(5)"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>'+ 
                                        data_cmt['comment']+
                                        '</div>'+
                                    '</div>'+
                                    '<ul class="list_group_reply_comment'+data_cmt['comment_id']+'">'+
                                    '</ul>'+
                                    '</li>';
                                    tinyMCE.activeEditor.setContent('');
                                    // tinymce.get('#comment'+$('.page_group_comments').attr('data-id')).setContent("");
                                    $(".list-comment-box"+data['post_id']).prepend(comment);
                        } 
                    }
                }); 
            }); 
    
            $('#create_save_group').submit(function(){
                       
                        var group_name = $('#group_name').val();
                        var group_category = $('#group_category').val();
                        var group_descripition = $('#group_descripition').val();
                        var only_see = $('#only_see').val();
                        $.ajax({
                        type:'post',
                        url :'{{ url("/save_create_group") }}',
                         data :{
                            group_name : group_name,
                            group_category :group_category,
                            group_descripition :group_descripition,
                            only_see:only_see
                        },
                        success:function(data){
                           if(data['status'] ==1 ){

                               location.reload();
                           }
                        },
                });

             });

             
$(document).on("click", '.replay_group_inner_comments', function() { 
 
    $('.r_comment').val(tinymce.get("page_group_reply_comment"+$('.page_group_reply_comment').attr('data-id')).getContent());
    var data = $('#post_replay_inner_group_comments'+$('.page_group_reply_comment').attr('data-id')).serialize();
    console.log(data);
    $.ajax({
        type: 'POST',
        url: '{{url("save_group_reply_comment")}}',
        data: data,
        success: function (data) {

            if(data['status']){
                var data_cmt = data['reply_comment'];
                console.log(data_cmt);
                var comment = '<li style="list-style:none;"><div class="comet-avatar">'+
                        '<img src="http://localhost:8000/assets/images/resources/comet-1.jpg" alt="">'+
                    '</div>'+
                    '<div class="we-comment">'+
                        '<div class="coment-head">'+
                        '<h5><a href="time-line" title="">'+data_cmt['name']+'</a></h5>'+
                            '<a class="like" onclick="like_post_cmt(5,2)" href="#"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a>'+                                    
                            '<a class="we-reply1" href="#" onclick="return false" data-id="5" post-id="2" id="we-reply" title="Reply"><i class="fa fa-reply"></i></a>'+                                           
                            '<a class="delete" href="#" onclick="delete_post_comment(5)"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a><br>'+ 
                            data_cmt['comment']+
                            '</div>'+
                        '</div></li>';
                        
                        tinyMCE.activeEditor.setContent('');
                        // tinymce.get('#comment'+$('.page_group_comments').attr('data-id')).setContent("");
                        $(".list_group_reply_comment"+data_cmt['comment_id']+"").prepend(comment);
            } 
        }
    }); 
});

function like_group_cmt(cmt_id){
      $.ajax({
         type:'post',
         url:'{{url("like_group_comment")}}',
         data:{
             cmt_id:cmt_id,
          },
         success:function(data){
            console.log(data);
            if(data['status'] == 1){
                $('#like'+cmt_id+'').css({'display':'none'});
                $('#dislike'+cmt_id+'').css({'display':'inline-block'});

            } 
         }, 

      })

}

function dislike_group_cmt(cmt_id){
      $.ajax({
         type:'post',
         url:'{{url("dislike_group_comment")}}',
         data:{
             cmt_id:cmt_id,
          },
         success:function(data){
            if(data['status'] == 1){
                $('#like'+cmt_id+'').css({'display':'inline-block'});
                $('#dislike'+cmt_id+'').css({'display':'none'});

            } 
         }, 

      })

}
function  delete_group_comment(id){
      $.ajax({
         type:'post',
         url :'{{ url("delete_group_commment") }}',
         data:{
             cmt_id:id
         },
         success:function(data){
             if(data['status']){
                 console.log(data['status_res']);
                 $(".we-comet").reload(location.href + ".we-comet");
             }
         },
      });
}

function like_group_reply_cmt(cmt_id){

    $.ajax({
       type:'POST',
       url:'{{url("like_group_reply_comment")}}',
       data:{
           cmt_id:cmt_id,
        },
       success:function(data){
          console.log(data);
          if(data['status'] == 1){
              $('#like_reply'+cmt_id+'').css({'display':'none'});
              $('#dislike_reply'+cmt_id+'').css({'display':'inline-block'});

          } 
       }, 

    })

}
function dislike_group_reply_cmt(cmt_id){
    $.ajax({
       type:'POST',
       url:'{{url("dislike_group_reply_comment")}}',
       data:{
           cmt_id:cmt_id,
        },
       success:function(data){
          console.log(data);
          if(data['status'] == 1){
              $('#like_reply'+cmt_id+'').css({'display':'inline-block'});
              $('#dislike_reply'+cmt_id+'').css({'display':'none'});
          }
          },
    });
}
function delete_group_reply_comment(cmt_id){
     $.ajax({
        type:'POST',
        url:'{{ url("delete_group_reply_comment")}}',
        data:{
            cmt_id:cmt_id
        },
        success:function(data){
          if(data['status'] == 1){
               location.reload();
           }
        },
      });
}
function edit_group_reply_comment(cmt_id){
           var inner_comment_text = $('#inner_comment_text'+cmt_id+'').val();
           var inner_comment_id = $('#inner_comment_id'+cmt_id+'').val(); 
           var content ='<form method="post" class="edit_reply_group_comment" id="edit_reply_group_comment'+cmt_id+'" enctype="multipart/form-data" onsubmit="return false">@csrf<div class="row"><div class="col-sm-10"><textarea placeholder="Post your comment" id="comment'+cmt_id+'" class="comment_1243" name="comment" aria-hidden="true">'+inner_comment_text+'</textarea></div><div class="col-sm-2"><button type="button"  id="edit_reply_comment" data-id="'+cmt_id+'" name="page_group_comments" class="btn btn-primary edit_reply_comment"><i class="far fa-paper-plane"></i></button><input type="hidden" name="edit_inner_comment_id" id="edit_inner_comment_id" value="'+inner_comment_id+'"><input type="hidden" name="edited_comment_text" class="edited_comment_text" value =""/></div></div></form>';
           var value ='<script>tinymce.init({selector:".comment_1243",plugins: "emoticons",height: 100,toolbar: "emoticons",toolbar_location: "bottom",menubar: false});'; 
           $('#we-comment'+cmt_id+'').html(content + value);
}
function  edit_group_comment(cmt_id){
    var inner_comment_text = $('#inner_comment_text'+cmt_id+'').val();
           var inner_comment_id = $('#inner_comment_id'+cmt_id+'').val(); 
           var content ='<form method="post" class="edit_reply_group_comment" id="edit_reply_group_comment'+cmt_id+'" enctype="multipart/form-data" onsubmit="return false">@csrf<div class="row"><div class="col-sm-10"><textarea placeholder="Post your comment" id="comment'+cmt_id+'" class="comment_1243" name="comment" aria-hidden="true">'+inner_comment_text+'</textarea></div><div class="col-sm-2"><button type="button"  id="edit_reply_comment" data-id="'+cmt_id+'" name="page_group_comments" class="btn btn-primary edit_reply_comment"><i class="far fa-paper-plane"></i></button><input type="hidden" name="edit_inner_comment_id" id="edit_inner_comment_id" value="'+inner_comment_id+'"><input type="hidden" name="edited_comment_text" class="edited_comment_text" value =""/></div></div></form>';
           var value ='<script>tinymce.init({selector:".comment_1243",plugins: "emoticons",height: 100,toolbar: "emoticons",toolbar_location: "bottom",menubar: false});'; 
           $('#we-comment'+cmt_id+'').html(content + value);

}
// function edit_group_comment(cmt_id){
//       var outer_comment_text = $('#outer_comment_text'+cmt_id+'').val();
//       var content ='<form method="post" class="edit_group_comment" id="edit_group_comment'+cmt_id+'" enctype="multipart/form-data" onsubmit="return false">@csrf<div class="row"><div class="col-sm-10"><textarea placeholder="Post your comment" id="group_comment'+cmt_id+'" class="comment_1243" name="comment" aria-hidden="true">'+outer_comment_text+'</textarea></div><div class="col-sm-2"><button type="button"  id="edit_reply_comment" data-id="'+cmt_id+'" name="page_group_comments" class="btn btn-primary edit_comment"><i class="far fa-paper-plane"></i></button><input type="hidden" name="edit_inner_comment_id" id="edit_inner_comment_id" value="'+cmt_id+'"><input type="hidden" name="edited_comment_text" class="edited_comment_text" value =""/></div></div></form>';
//       var value = '<script>tinymce.init({selector:".comment_1243",plugins: "emoticons",height: 100,toolbar: "emoticons",toolbar_location: "bottom",menubar: false});'; 
//       $('#outer_comment'+cmt_id+'').html(content + value );  

// }
$(document).on('click','.edit_comment',function (event) {
    event.preventDefault();
 
    $('.edited_comment_text').val(tinymce.get("group_comment"+$('.edit_comment').attr('data-id')).getContent());
    var data= $('#edit_group_comment'+$('.edit_comment').attr('data-id')).serialize();
    $.ajax({
        type:'post',
        url:'{{ url("edit_group_comment")}}',
        dataType:'json',
        data:data,
        success:function(data){
            console.log(data);
            var data_cmt = data['comment_details'];
          var comment_id = data_cmt['id'];
          var content ='<div class="coment-head"><h5><a href="time-line" title="">'+data['user_name']+'</a></h5><a id="like_reply'+comment_id+'"  onclick="like_group_reply_cmt('+comment_id+')" href="#"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a><a id="dislike_reply'+comment_id+'"  onclick="dislike_group_reply_cmt('+comment_id+')" href="#"><i class="fa fa-thumbs-up  icon-color text-primary" aria-hidden="true"></i></a><a class="delete" href="#" onclick="delete_group_reply_comment('+comment_id+')"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a><a class="edit" href="#" onclick="edit_group_reply_comment('+comment_id+')"><i class="fas fa-edit"></i></a></div> <input type="hidden" name="inner_comment_text" id="inner_comment_text'+comment_id+'" value="'+comment_id+'"/><input type="hidden" name="inner_comment_id" id="inner_comment_id'+comment_id+'" value ="'+comment_id+'" /><br><p>'+data_cmt['comment']+'</p>';
          $('#outer_comment'+comment_id+'').html(content);
        }

    })

  });

$(document).on('click','.edit_reply_comment',function(){

    $('.edited_comment_text').val(tinymce.get("comment"+$('.edit_reply_comment').attr('data-id')).getContent());
    var data = $('#edit_reply_group_comment'+$('.edit_reply_comment').attr('data-id')).serialize();
    $.ajax({
       type:'POST',
       url :'{{ url("edit_reply_group_comment")}}',
       dataType:'json',
       data:data,
       success:function(data){
          console.log(data);
          var data_cmt = data['comment_details'];
          var comment_id = data_cmt['id'];
          var content ='<div class="coment-head"><h5><a href="time-line" title="">'+data['user_name']+'</a></h5><a id="like_reply'+comment_id+'"  onclick="like_group_reply_cmt('+comment_id+')" href="#"><i class="fa fa-thumbs-up  icon-color" aria-hidden="true"></i></a><a id="dislike_reply'+comment_id+'"  onclick="dislike_group_reply_cmt('+comment_id+')" href="#"><i class="fa fa-thumbs-up  icon-color text-primary" aria-hidden="true"></i></a><a class="delete" href="#" onclick="delete_group_reply_comment('+comment_id+')"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a><a class="edit" href="#" onclick="edit_group_reply_comment('+comment_id+')"><i class="fas fa-edit"></i></a></div> <input type="hidden" name="inner_comment_text" id="inner_comment_text'+comment_id+'" value="'+comment_id+'"/><input type="hidden" name="inner_comment_id" id="inner_comment_id'+comment_id+'" value ="'+comment_id+'" /><br><p>'+data_cmt['comment']+'</p>';
          $('#we-comment'+comment_id+'').html(content);
       },
    });
});


</script>
<script>
    tinymce.init({
        selector: ".comment_1243",
        plugins: "emoticons",
        height: 100,
        toolbar: "emoticons",
        toolbar_location: "bottom",
        menubar: false
    });

</script>

<script>
    tinymce.init({
        selector: "#page_post_comment",
        plugins: "emoticons",
        height: 100,
        toolbar: "emoticons",
        toolbar_location: "bottom",
        menubar: false
    });

</script>
<script>
    tinymce.init({
        selector: "#page_post_reply_comment",
        plugins: "emoticons",
        height: 100,
        toolbar: "emoticons",
        toolbar_location: "bottom",
        menubar: false
    });

</script>
<script>
    tinymce.init({
        selector: ".page_post_reply_comment",
        plugins: "emoticons",
        height: 100,
        toolbar: "emoticons",
        toolbar_location: "bottom",
        menubar: false
    });

</script>
<script>
    tinymce.init({
        selector: "#comment_4321",
        plugins: "emoticons",
        height: 100,
        toolbar: "emoticons",
        toolbar_location: "bottom",
        menubar: false
    });

</script>   
<script>
    tinymce.init({
        selector: "#comment_4321",
        plugins: "emoticons",
        height: 100,
        toolbar: "emoticons",
        toolbar_location: "bottom",
        menubar: false
    });

    $('#group_invitation').click(function(){
        $('#group_dashboard_main').hide();
        $('#invitation_status').show();
        $('#like_group').hide();
    });
    $('#group_dashboard').click(function(){
        $('#group_dashboard_main').show();
        $('#invitation_status').hide();
        $('#like_group').hide();
    });
    $('#like_group_btn').click(function(){
        $('#group_dashboard_main').hide();
        $('#invitation_status').hide();
        $('#like_group').show();
    });

</script>   
 
 




<script src="{{ asset('assets/js/config.js')  }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/jquery.emojiarea.js') }}"></script>
<script src="{{ asset('assets/js/emoji-picker.js') }}"  ></script>
<script>
    $(function() {
      // Initializes and creates emoji set from sprite sheet
      window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '{{ asset("assets/img/") }}',
        popupButtonClasses: 'fa fa-smile-o'
      });
      // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
      // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
      // It can be called as many times as necessary; previously converted input fields will not be converted again
      window.emojiPicker.discover();
    });
  </script>
  <script>
    // Google Analytics
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-49610253-3', 'auto');
    ga('send', 'pageview');
  </script>