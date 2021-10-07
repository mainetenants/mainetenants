$(document).ready(function () {
    var currentGfgStep, nextGfgStep, previousGfgStep;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);
   $('#page_info_btn').click(function (e){

        e.preventDefault();
        var page_info = $('#page_info').val();
       if( page_info == ""){
           
           $('.page_info').css({"border-color":"red"});
           $('.page_info_error').html("<p style='color:red;'>this is Required*</p>");
                      
 
       }else{

    
  
            currentGfgStep = $(this).parent();
            nextGfgStep = $(this).parent().next();
      
            $("#progressbar li").eq($("fieldset")
                .index(nextGfgStep)).addClass("active");
      
            nextGfgStep.show();
            currentGfgStep.animate({ opacity: 0 }, {
                step: function (now) {
                    opacity = 1 - now;
      
                    currentGfgStep.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    nextGfgStep.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(++current);
        
      
       }

   });
  
   $('#page_desc_btn').click(function (e){

    e.preventDefault();
    var page_desc = $('.category').val();

   if( page_desc == ""){
      
       $('.filterinput').css({"border-color":"red;"});
       $('.page_desc_error').html("<p style='color:red;'>this is Required*</p>");
                  

   }else{
        
        $('#category_value').val(page_desc);
       currentGfgStep = $(this).parent();
        nextGfgStep = $(this).parent().next();
  
        $("#progressbar li").eq($("fieldset")
            .index(nextGfgStep)).addClass("active");
  
        nextGfgStep.show();
        currentGfgStep.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;
  
                currentGfgStep.css({
                    'display': 'none',
                    'position': 'relative'
                });
                nextGfgStep.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(++current);
    
  
   }

    });

    $(".previous-step").click(function () {
  
        currentGfgStep = $(this).parent();
        previousGfgStep = $(this).parent().prev();
  
        $("#progressbar li").eq($("fieldset")
            .index(currentGfgStep)).removeClass("active");
  
        previousGfgStep.show();
  
        currentGfgStep.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;
  
                currentGfgStep.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previousGfgStep.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });
  
    function setProgressBar(currentStep) {
        var percent = parseFloat(100 / steps) * current;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }
  
    $(".submit").click(function () {
        return false;
    })
});


function listFilter1(searchDir_nw, list) { 
    var form = $("<form>").attr({"class":"filterform","action":"#"}),
    input = $("<input>").attr({"class":"filterinput category","id":"category","name":"category","type":"text","placeholder":"Category(Required)"});
    $(form).append(input).appendTo(searchDir_nw);

    $(input)
    .change( function () {
      var filter = $(this).val();
      if(filter) {
        $(list).find("li:not(:Contains(" + filter + "))").slideUp();
        $(list).find("li:Contains(" + filter + ")").slideDown();
      } else {
        $(list).find("li").slideDown();
      }
      return false;
    })
    .keyup( function () {
      $(this).change();
    });
  }

  $(function () {
    listFilter1($("#searchDir_nw"), $("#description-list"));
  });


  $('#add_page_post').submit(function (){
      
    var formData = new FormData();

    
   $.ajax({
       type:'POST',
       url:'{{ url("add_page_post") }}',
       data:{
               data : formData,
           },
       success:function(data){
           // console.log(data);
    }

});

});