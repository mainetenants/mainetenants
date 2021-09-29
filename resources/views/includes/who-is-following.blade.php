@php
    
    $allusers = alluser();



@endphp
<div class="widget bg-white bg-light stick-widget bg-white bg-light">
    <h4 class="widget-title bg-white bg-light">Who's follownig</h4>
    <ul class="followers">
      @if(!empty($allusers))
        @foreach($allusers as $alluser)
    
        <li>
            <figure><img src="{{ asset('assets/images/resources/friend-avatar2.jpg') }}" alt=""></figure>
            <div class="friend-meta">
                <h4><a href="see_friend/{{ $alluser->id }}" title="">{{$alluser->name}}</a></h4>
                <a href="unfollow/{{ $alluser->id }}" title="" class="underline">unfollow</a>
            </div>
        </li>
        @endforeach
        @else
        <li>
            <div class="friend-meta">
                 <p class="text-light">No Followers</p>
            </div>
        </li>
        @endif
    </ul>
</div>