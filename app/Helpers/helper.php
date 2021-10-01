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
    ->where(['id' => $id] )
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
    ->select('status')
    ->where(['user_id'=>Auth::id(),'friends_id' => $id])
    ->first();
    
    return $isfriends;
}
function get_follow_status($id){

    $isfriends = DB::table('msu_isfriend')
    ->select('is_follow')
    ->where(['user_id' =>Auth::id() , 'friends_id' => $id])
    ->first();

     return $isfriends;
}


function get_page(){

    $user = Auth::id();
    $get_page = DB::table('msu_user_page')
    ->select('*')
    ->where(['user_id'=>$user,'is_active'=> 1])
    ->first();
   
    return $get_page;
}

function get_user_nane($id){

    $get_page = DB::table('users')
    ->select('name')
    ->where(['id'=>$id])
    ->first();
 
    return $get_page;

}


function get_page_post($id){
   
     $get_page_post = DB::table('msu_page_post')
     ->select('*')
     ->where(['id' => $id ])
     ->get();


     return $get_page_post;


}

function get_user_nane1($id){

    $get_page = DB::table('users')
    ->select('name')
    ->where(['id'=>$id])
    ->first();
  
    return $get_page->name;

}
      
function get_page_post_cmt($id){
   
      $get_page_post_cmt = DB::table('page_post_comments')
      ->select('*')
      ->where(['page_id'=>$id])
      ->get();

      return $get_page_post_cmt;

}

