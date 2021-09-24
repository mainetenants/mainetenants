<?php

function friend_recent_notifications($id){


    if($id == ""){
        $id = Auth::id();
    }

  
    $allnotification = DB::table('msu_user_notification')
    ->select('*')
    ->where(['friend_id' => $id])
    ->orderBy('created','DESC')
    ->get();


    
    if(empty($allnotification)){
        return "false";
    }else{
        return ["allnotification" =>$allnotification];
    }

}
function notifications()
{
         
    $id = Auth::id();
    $allnotification = DB::table('msu_user_notification')
    ->select('*')
    ->where(['friend_id' => $id])
    ->orderBy('created','DESC')
    ->get();
    $count = DB::table('msu_user_notification')
    ->select('id')
    ->where(['friend_id' => $id ,'is_seen' => 1])
    ->get();

    $count1 = count($count);

    if(empty($allnotification)){
        return "false";
    }else{
        return ["allnotification" =>$allnotification,"count"=> $count1];
    }
}

function alluser(){

         
    $id = Auth::id();
    $allusers  = DB::table('msu_isfriend')
    ->leftJoin('users', 'msu_isfriend.friends_id', '=', 'users.id')
    ->select('*')
    ->Where(['msu_isfriend.user_id' =>  $id ,'msu_isfriend.is_follow'=>1])
    ->get();
   
    if(empty($allusers)){
        return "false";
    }else{
        return $allusers ;
    }

}

function user_data($id){

    $user_details = DB::table('users')
     ->select('*')
    ->where('id' ,"!=", $id )
    ->first();

     return $user_details;
}

function get_total_friend($id){
    
    $count_friends = DB::table('msu_isfriend')
    ->select('id')
   ->where('user_id' ,"!=", $id )
   ->get();

    return count($count_friends);


}

function followingUser(){
    $id = Auth::id();


}

function get_user_post($id){
   
    $total_post = DB::table('msu_community_activities')
    ->select('*')
    ->where(['user_id'=> $id])
    ->get();

    return $total_post;

}
function get_friend_status($id){

    
    $isfriends = DB::table('msu_isfriend')
    ->select('*')
    ->where(['friends_id'=>$id, 'user_id'=>Auth::id()])
    ->first();
    
    return $isfriends;
}
?>                                                                                                                           