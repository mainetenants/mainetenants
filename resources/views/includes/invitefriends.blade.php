@php
   $allusers = alluser1();
   $get_page  = get_page($id);   
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
                <a href="#" id='send_invitation' onclick='send_invitation()' >invite</a>
                <a href="#" id='invitation_cancel' style="display: none;" >inviatation sent</a>
                <input type="hidden" name="friend_id" id="friend_id" value="{{ $alluser->friends_id  }}"/>
                <input type="hidden" name="post_id"  id="post_id" value ="{{ $get_page->msu_user_page_id }}"/>
            </div>
        </li>
        @endforeach  
       
    </ul>
</div><!-- invite for page  -->
