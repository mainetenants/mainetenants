@php
    
   $allusers = alluser();
   
   
@endphp

<div class="widget">
    <h4 class="widget-title">Invite friends</h4>
    <ul class="invition">

        @foreach($allusers as $alluser)
        <li>
            <figure>
                <img src="{{ asset('upload/images/profile_photo/'.$alluser->profile_photo.'') }}" alt="">
                
            </figure>
            <div class="friendz-meta">
                <a href="/see_friend/{{ $alluser->id }}">{{$alluser->name}}</a>
                <i>{{$alluser->email}}</i>
                <a href="#">invite</a>
                
            
            </div>
            
        </li>
        @endforeach
       
    </ul>
</div><!-- invite for page  -->
