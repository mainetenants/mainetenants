@php
    
    $allusers = alluser();



@endphp
<div class="widget bg-white bg-light stick-widget bg-white bg-light">
    <h4 class="widget-title bg-white bg-light">Who's follownig</h4>
    <ul class="followers">
        @foreach($allusers as $alluser)
    
        <li>
            <figure><img src="{{ asset('assets/images/resources/friend-avatar2.jpg') }}" alt=""></figure>
            <div class="friend-meta">
                <h4><a href="time-line" title="">{{$alluser->name}}</a></h4>
                <a href="see_friend/{{ $alluser->id }}" title="" class="underline">Add Friend</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>