var html_alert = '<div class="alert alert-danger mb-1" role="alert">Please enter the required fields!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div></button>';
// change css of active event card
$('.card-radio input[type=radio]').change(function() {
    alert('testing');
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
    $('#event_about').removeClass('active');
    $('#event_disc').addClass('active');
    // $('.about-section').hide();
});
$('#event_about').click(function(){
    $('.about-section').show();
    $('#event_disc').removeClass('active');
    $('#event_about').addClass('active');
    // $('.about-section').hide();
});