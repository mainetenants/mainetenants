var html_alert = '<div class="alert alert-danger mb-1" role="alert">Please enter the required fields!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div></button>';
// change css of active event card
$('.card-radio input[type=radio]').change(function() {
    alert('testing');
    $('.card').removeClass('card_select');
    $(this).parent().parent().parent().addClass("card_select");
});

$('#create-event').click(function(){
    if($('#online').is(':checked')){ 
        $('.create-event').hide();
        $('.event-type').show();
    }
    else if($('#in_person').is(':checked')){
        $('.create-event').hide();
        $('.event-details').show();
        $('.probress-btns').show();
    }else{
        alert("Select atleast one option");
     }
    
});

$('#event-type').click(function(){
    if($('#general').is(':checked') || $('#class').is(':checked')) { 
        $('.event-type').hide();
        $('.event-details').show();
        $('.probress-btns').show();
        
    }else{
        alert("Select atleast one option");
     }
    
});
$('#event-type-back').click(function(){
        $('.create-event').show();
        $('.event-type').hide();
        $('.probress-btns').hide();
});
$('input[name=privacy]').change(function() {
    
    if($("input[name='privacy']:checked").val() == 'private'){
        $('.guest-box').show();
    }else{
        $('.guest-box').hide();
    }
});
$('#event-details').click(function(){
    $('.alert').alert();
    $('.alert').hide();
    $('input[type=text], input[type=date],  input[type=time]').removeClass("border-bg");
    $("input").keyup(function(){
        $(this).removeClass("border-bg");
    });
    $("input").blur(function(){
        $(this).removeClass("border-bg");
    });
    if($('#event_name').val()==""){
        $("#event_name").addClass("border-bg");
        $(".event-alert").html(html_alert);
    }
    else if($('#start_date').val()==""){
        $("#start_date").addClass("border-bg");
        $(".event-alert").html(html_alert);
    }
    else if($('#start_time').val()==""){
        $("#start_time").addClass("border-bg");
        $(".event-alert").html(html_alert);
    }
    else if($('#end_date').val()==""){
        $("#end_date").addClass("border-bg");
        $(".event-alert").html(html_alert);
    }
    else if($('#end_time').val()==""){
        $("#end_time").addClass("border-bg");
        $(".event-alert").html(html_alert);
    }else{
        $('.event-details').hide();
        $('.locations').show();
        $('#step1').removeClass('active');
        $('#step2').addClass('active');
    }
});
$('#event-details-back').click(function(){
    location.reload();
});
$('input[name=locations]').change(function() {
    if($(this).attr('id')== 'external_link'){
        $('.event_link').show();
    }
    else{
        $('.event_link').hide();
    }
});
$('#join').click(function(){
    $("input, textarea").keyup(function(){
        $(this).removeClass("border-bg");
    });
    $('.alert').hide();
    if($("#external_link").prop("checked") && ($('#event_link').val()=="")){
        $("#event_link").addClass("border-bg");
        $(".event-alert-loc").html(html_alert);
    }
    else if($('#description').val()==""){
        $("#description").addClass("border-bg");
        $(".event-alert-loc").html(html_alert);
    }else{
        $('.locations').hide();
        $('.addition_relation').show();
        $('#step2').removeClass('active');
        $('#step3').addClass('active');
    }
});
$('#join-back').click(function(){
    $('.locations').hide();
    $('.event-details').show();
    $('#step2').removeClass('active');
    $('#step1').addClass('active');
});

$('#addition_relation-back').click(function(){
    $('.addition_relation').hide();
    $('.locations').show();
    $('#step3').removeClass('active');
    $('#step2').addClass('active');
});

$('.inst-btn').click(function(){
    
    // alert();return
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    var id = $(this).attr('data-id');
    $.ajax({
        type: 'POST',
        url: 'event-action',
        data: {
            event_id : id,
        },
        success: function (data) {
            
        }
    });

});

