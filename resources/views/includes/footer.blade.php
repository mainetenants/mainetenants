<script src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/map-init.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI">
</script>
<script>
    $('#comment').keypress(function (event) {

        
    
        if (event.keyCode == 13 && event.shiftKey) {
          
            var content = this.value;
            var caret = getCaret(this);
            this.value = content.substring(0,caret)+"\n"+content.substring(carent,content.length-1);
            event.stopPropagation();
            
        }else if(event.keyCode == 13)
        {

            $('#comment-form').submit();
        }
    });
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

</script>
<script>
    $('.post-opt').click(function(){
        $('.opt-list').toggle();
    });

    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
    });
</script>
<script>
    $(document).ready(function(){     
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $("#likeId, #dislikeId").click(function(){
            var data = $(this).attr('class');

            var id = $(this).attr('value');;
            $.ajax({
                type:'POST',
                url:'{{ url("like") }}',
                data:{
                        post_id : id,
                        data	:data
                    },
                success:function(data){
                    
                }
            });
        });
    });


    function  seen_notification(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var id = $(this).attr('value');;
            $.ajax({
                type:'POST',
                url:'{{ url("seen") }}',
                data:{
                        post_id : id,
                    
                    },
                success:function(data){
                    
                }
});

    }

</script>
<style>
  form#logout_id {
  font-size: 14px;
  text-transform: capitalize;
  display: inline-block;
  position: relative;
  font-weight: 400;
  color: #797979;
  vertical-align: top;
}
</style>
<script>
    function myFunction(){
        var post_id = $('#edit-post').attr('value');
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                type:'POST',
                url:'{{ url("get-post") }}',
                data:{
                        post_id : post_id
                    },
                success:function(data){
                    console.log(data);
        $('#editpost').modal('toggle')
                                    
        $('#post_contet').append('<textarea class="form-control" name="content" id="content" rows="3">'+ data.content +'</textarea><input type="hidden" name="post_id" value="'+ data.post_id +'">')
        $('.post-card-img').append('<img class="card-img-top" src="upload/images/'+ data.image +'" alt="Card image cap">')
                }
            });
    }
$("#editpost").on("hidden.bs.modal", function () {
   
    $('#content').remove();
    $('.card-img-top').remove();
  });
  $('#edit-post-submit').click(function(){
    $("#edit_form").submit();
  });
  $('#editpost').on('show.bs.modal', function() {
    $('.ti-more-alt').toggle();
  });

    </script>
