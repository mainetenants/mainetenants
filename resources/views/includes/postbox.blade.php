
<div class="new-postbox">
    <figure>
        @if (isset($profile_photo))
        <img src="{{ asset('upload/images/profile_photo/'.$profile_photo) }}">
        @else
        <img src="{{ asset('assets/images/resources/user-avatar.jpg') }}" alt="">
        @endif</figure>
    <div class="newpst-input">
    @if ($errors->any())
        <div class="alert alert-secondary" role="alert">
            <div class="alert-icon">
                <i class="flaticon-warning  text-secondary"></i>
            </div>
            <div class="alert-text">
                <ul>
                   @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div><br />
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
        <form method="post" id="upload_files" action="{{url('get-post-list/')}}"  enctype="multipart/form-data">
           
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <textarea rows="2" placeholder="write something" name="msg"></textarea>
			<div class="attachments">
                <ul>
                    <li class="text-secondary">
                        <i class="fa fa-music text-secondary"></i>
                        <label class="fileContainer">
                            <input type="file" name="music">
                        </label>
                    </li>
                    <li class="text-secondary">
                        <i class="fa fa-image text-secondary"></i>
                        <label class="fileContainer">
                            <input type="file" name="image">
                        </label>
                    </li>
                    <li class="text-secondary">
                        <i class="fa fa-video-camera text-secondary"></i>
                        <label class="fileContainer">
                            <input type="file" name="video">
                        </label>
                    </li>
                    <li class="text-secondary">
                        <i class="fa fa-camera text-secondary"></i>
                        <label class="fileContainer">
                            <input type="file">
                        </label>
                    </li>
                    <li class="text-secondary">
                        <input type="submit" class="btn btn-info btn-sm" id="posts" value="Post">
                        <input type="hidden" id="u_id" name="u_id" value="{{ $id }}"/>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>


<script>


// $('#upload_files').click(function (){
  
//     var formData = new FormData(); 
 
//     $.ajax({
//                 type:'POST',
//                 url:'{{ url("get-post-list") }}',
//                 data: formData,
//                 success:function(data){

//                     console.log(data);
                    
//                 }

// });

// });


</script>
