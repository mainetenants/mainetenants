var html_alert = '<div class="alert alert-danger mb-1" role="alert">Please enter the required fields!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div></button>';
// change css of active event card
$('.card-radio input[type=radio]').change(function() {
    $('.card').removeClass('card_select');
    $(this).parent().parent().parent().addClass("card_select");
});

$('#create-event').click(function() {
    if ($('#online').is(':checked')) {
        $('.create-event').hide();
        $('.event-type').show();
    } else if ($('#in_person').is(':checked')) {
        $('.create-event').hide();
        $('.event-details').show();
        $('.probress-btns').show();
    } else {
        alert("Select atleast one option");
    }

});

$('#event-type').click(function() {
    if ($('#general').is(':checked') || $('#class').is(':checked')) {
        $('.event-type').hide();
        $('.event-details').show();
        $('.probress-btns').show();

    } else {
        alert("Select atleast one option");
    }

});
$('#event-type-back').click(function() {
    $('.create-event').show();
    $('.event-type').hide();
    $('.probress-btns').hide();
});
$('input[name=privacy]').change(function() {

    if ($("input[name='privacy']:checked").val() == 'private') {
        $('.guest-box').show();
    } else {
        $('.guest-box').hide();
    }
});
$('#event-details').click(function() {
    $('.alert').alert();
    $('.alert').hide();
    $('input[type=text], input[type=date],  input[type=time]').removeClass("border-bg");
    $("input").keyup(function() {
        $(this).removeClass("border-bg");
    });
    $("input").blur(function() {
        $(this).removeClass("border-bg");
    });
    if ($('#event_name').val() == "") {
        $("#event_name").addClass("border-bg");
        $(".event-alert").html(html_alert);
    } else if ($('#start_date').val() == "") {
        $("#start_date").addClass("border-bg");
        $(".event-alert").html(html_alert);
    } else if ($('#start_time').val() == "") {
        $("#start_time").addClass("border-bg");
        $(".event-alert").html(html_alert);
    } else if ($('#end_date').val() == "") {
        $("#end_date").addClass("border-bg");
        $(".event-alert").html(html_alert);
    } else if ($('#end_time').val() == "") {
        $("#end_time").addClass("border-bg");
        $(".event-alert").html(html_alert);
    } else {
        $('.event-details').hide();
        $('.locations').show();
        $('#step1').removeClass('active');
        $('#step2').addClass('active');
    }
});
$('#event-details-back').click(function() {
    location.reload();
});
$('input[name=locations]').change(function() {
    if ($(this).attr('id') == 'external_link') {
        $('.event_link').show();
    } else {
        $('.event_link').hide();
    }
});
$('#join').click(function() {
    $("input, textarea").keyup(function() {
        $(this).removeClass("border-bg");
    });
    $('.alert').hide();
    if ($("#external_link").prop("checked") && ($('#event_link').val() == "")) {
        $("#event_link").addClass("border-bg");
        $(".event-alert-loc").html(html_alert);
    } else if ($('#description').val() == "") {
        $("#description").addClass("border-bg");
        $(".event-alert-loc").html(html_alert);
    } else {
        $('.locations').hide();
        $('.addition_relation').show();
        $('#step2').removeClass('active');
        $('#step3').addClass('active');
    }
});
$('#join-back').click(function() {
    $('.locations').hide();
    $('.event-details').show();
    $('#step2').removeClass('active');
    $('#step1').addClass('active');
});

$('#addition_relation-back').click(function() {
    $('.addition_relation').hide();
    $('.locations').show();
    $('#step3').removeClass('active');
    $('#step2').addClass('active');
});

$('.inst-btn').click(function() {

    // alert();return
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var event_id = $(this).attr('data-id');
    var action_id = $(this).attr('act-id');
    $.ajax({
        type: 'POST',
        url: 'event-action',
        data: {
            event_id: event_id,
            action_id: action_id,
        },
        success: function(data) {

        }
    });

});
$('input[name="action"]').on('change', function() {
    var that = $(this)


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var event_id = $(this).attr('data-id');
    var action_id = $(this).attr('act-id');
    var action_name = "";
    if (action_id == '1') {
        action_name = 'Interested';
    } else if (action_id == '2') {
        action_name = 'Going';
    } else if (action_id == '3') {
        action_name = 'Not Interested';
    }

    $.ajax({
        type: 'POST',
        url: 'event-action',
        data: {
            event_id: event_id,
            action_id: action_id,
        },
        success: function(data) {
            alert(data.success);
            var selector1 = $(that).parent().parent().parent().parent().attr('class');
            var selector2 = $('.' + selector1).find("#dropdownMenuButton").attr('id');
            $('#' + selector2).val(action_name);

        }
    });
});
$('#send_event_invitation').click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var friend_id = $('#friend_id').val();
    var event_id = $('#event_id').val();

    $.ajax({
        type: 'POST',
        url: '/event-invite-friend',
        data: {
            friend_id: friend_id,
            event_id: event_id
        },
        success: function (data) {

            if (data['status'] == 1) {

                $('#event_invitation_cancel').show();
                $('#send_event_invitation').hide();

            }
        },      
   });
});
$('#event_disc').click(function(){
    $('.about-section').hide();
    $('.disc-section').show();
    $('#event_about').removeClass('active');
    $('#event_disc').addClass('active');
    // $('.about-section').hide();
});
$('#event_about').click(function(){
    $('.about-section').show();
    $('#event_disc').removeClass('active');
    $('#event_about').addClass('active');
    $('.disc-section').hide();

    // $('.about-section').hide();
});



// event discussioin module scripts 
$('#event_likeId .ti-heart').click(function () {
    var selector_rect = '#reaction'+$(this).parent().attr('value');
    $(selector_rect).toggle();
    $('.reaction').delay(10000).fadeOut();
});

// like dislike and reaction emoticons
$(".event_reaction i .img-event, #event_dislikeId").click(function () {
    var id = '';
    var reaction = '';
    var data = $(this).attr('class').split(' ')[0];
    if (data == 'emoji') {
        id = $(this).parent().parent().attr('value');
        reaction = $(this).parent().attr('id');
    } else {
        id = $(this).attr('value');
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/event_post_like',
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
$('.event_rec').click(function () {
    
    $.ajax({
        type: 'POST',
        url: '/get-events-reaction',
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
                        '<div class="user_card"><div class="row"><div class="col-sm-6 text-left"><img src="upload/images/' + val.profile_photo + '" class="rc_profile_pic" style="max-width: 60px" alt=""><span class="rc_name">' + val.name + '</span></div><div class="col-sm-6 text-right">' + html_add + '</div></div></div>');


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
                // var count = [count_like_rc, count_love_rc, count_haha_rc, count_angry_rc, count_care_rc, count_wow_rc, count_sad_rc];
                // console.log(count.sort().reverse());


            }

            // trigger modal 
            $('#reaction').modal('toggle');

        }
    });
    // alert();
});
function editEventDescription() {
    var post_id = $('#edit-post').attr('value');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //edit posts description
    $.ajax({
        type: 'POST',
        url: '/get-events-post',
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

            $('#post_contet').html(
                '<textarea class="form-control" name="content" id="content" rows="3" placeholder="Enter text here to edit">' + data.content + '</textarea><input type="hidden" name="post_id" value="' + data.post_id + '">')
            $('.post-card-img').html('<img class="card-img-top" src="' + $('#url').val() + '/upload/images/events/' + data. image +'" alt="Card image cap">')
        }
    });
    //emoticons listing

}