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
$('#event-details').click(function(){
    var html_alert = '<div class="alert alert-danger mb-1" role="alert">Please enter the required fields!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div></button>';
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

$('input[name=locations]').change(function() {
    if($(this).attr('id')== 'external_link'){
        $('.event_link').show();
    }
    else{
        $('.event_link').hide();
    }
});
$('#join').click(function(){
    $('.locations').hide();
    $('.addition_relation').show();
    $('#step2').removeClass('active');
    $('#step3').addClass('active');
});



