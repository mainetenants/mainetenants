<?php
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
    $allusers = DB::table('users')
    ->select('*')
    ->where('id' ,"!=", $id )
    ->orderBy('name', 'ASC')
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

function get_user_post($id){
   
    $total_post = DB::table('msu_community_activities')
    ->select('*')
    ->where(['user_id'=> $id])
    ->get();

    return $total_post;

}
?>