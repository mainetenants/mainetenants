
$(document).on('click','.we-reply-group',function () {
    var post_id = $(this).attr('post-id');
    var comment_id = $(this).attr('data-id');


   // $(this).parent().parent().parents('#new_cmt_box').remove();
    $(this).parent().parent().parent().append(
        '<div id="new_cmt_box'+comment_id+'" ><form method="post" id="post_replay_inner_group_comments'+comment_id+'" class="post_replay_inner_group_comments" enctype="multipart/form-data"  onsubmit="return false"><div class="row m-4"><div class="col-sm-11 p-0"><textarea placeholder="Reply to the comment" id="page_group_reply_comment'+comment_id+'" data-id="'+comment_id+'"  class="page_group_reply_comment" name="page_group_reply_comment"></textarea></div><div class="col-sm-1"><input type="hidden" name="post_id1" id="post_id1" value="' +
        post_id + '"><input type="hidden" class="r_comment" name="r_comment" id="r_comment" value=""/><input type="hidden" name="comment_id" id="comment_id" value ="'+comment_id +'"/><input type="hidden" name="status" id="status" value ="1"/><button type="button"  btn-id="'+comment_id+'" id="" class="btn btn-primary replay_group_inner_comments"><i class="far fa-paper-plane"></i></button> </div></div>'
        );
    
});

