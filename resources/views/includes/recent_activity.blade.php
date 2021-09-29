@php
    
   if(isset($id)){
	$skills = friend_recent_notifications($id);
   }
   else{

    $skills = friend_recent_notifications("");;
   }
    $allnotification = $skills['allnotification']->all();
 
@endphp

<div class="widget bg-white bg-light scroll-bar">
    <h4 class="widget-title bg-white bg-light">Recent Activity</h4>
    <ul class="activitiez">
        @foreach($allnotification as $notification)
        <li>
            <div class="activity-meta text-secondary text-secondary">
                <i>{{ $notification->created }}</i>
                <span><a href="#" class="text-secondary"" title="">{{ $notification->message }}</a></span>
                
            </div>
        </li>
        @endforeach
       
    </ul>
</div><!-- recent activites -->