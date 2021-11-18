<?php

use PhpParser\Builder\Function_;

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
    ->Where(['msu_isfriend.user_id' =>  $id ,'msu_isfriend.is_follow'=>1,'users.show_profile'=>0])
    ->get();
   
    if(empty($allusers)){
        return "false";
    }else{
        return $allusers ;
    }

}


function alluser1(){

         
    $id = Auth::id();
    $allusers  = DB::table('msu_isfriend')
    ->leftJoin('users', 'msu_isfriend.friends_id', '=', 'users.id')
    ->leftJoin('msu_invite_friends','msu_invite_friends.friend_id','=','msu_isfriend.friends_id')
    ->select('*')
    ->Where(['msu_isfriend.user_id' =>  $id ,'msu_isfriend.is_follow'=>1,'msu_invite_friends.status'=>null,'users.my_profile'=>0])
    ->orWhere('msu_invite_friends.status','=',0)
    ->get();


   
    // if(empty($allusers)){
    //     return "";
    // }else{
        return $allusers ;
   // }

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


function get_page($id){
    

    // $user = Auth::id();
    $get_page = DB::table('msu_user_page')
    ->select('*')
    ->where(['msu_user_page_id'=>$id])
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
     ->where(['page_id' => $id ])
     ->orderBy('created','DESC')
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
      ->where(['post_id'=>$id ,'status' =>0])
      ->get();

      return $get_page_post_cmt;

}

      
function get_page_post_cmt1($id,$cmt_id){
   


    $get_page_post_cmt = DB::table('msu_page_post_reply_comment')
    ->select('*')
    ->where(['post_id'=>$id,'comment_id'=>$cmt_id ,'status' =>1])
    ->get();

    return $get_page_post_cmt;

}
function get_page_id(){


    $user = Auth::id();

    
    $get_page = DB::table('msu_user_page')
    ->select('msu_user_page_id')
    ->where(['user_id'=>$user,'is_active'=> 1])
    ->first();

    if($get_page == ""){
      return false;
    }else{
    return $get_page->msu_user_page_id;
    }
}

function get_like_page_status($id){
       
     $user= Auth::id();

     $get_page_status = DB::table('like_user_page')
     ->select('is_like')
     ->where(['page_id'=>$id,'user_id'=>$id])
     ->first();
    if($get_page_status== ""){
       return "";
    }else{
     return $get_page_status->is_like;
     
    }
}

function get_post_cmt($id){

      $users = DB::table('msu_comments')
      ->select('*')
      ->where(['post_id'=>$id])
      ->orderBy('created','DESC')
      ->get();
      
        return $users;
}  


function get_all_page(){

    $user_id = Auth::id();

    $get_all_page = DB::table('msu_user_page')
    ->select('*')
    ->where('user_id',$user_id)
    ->get();



    return $get_all_page;

}

function get_user_like_page(){
     $user_id = Auth::id();

     $get_users_like = DB::table('msu_user_page')
     ->leftJoin('like_user_page','like_user_page.page_id','=','msu_user_page.msu_user_page_id')
     ->select('msu_user_page.*','like_user_page.is_like')
     ->where(['like_user_page.user_id'=>$user_id,'like_user_page.is_like'=>1])
     ->get();
   
     if(empty($get_users_like)){
        return "";
     }else{
        return $get_users_like->all(); 
     }
}
function get_send_invitation_respose(){
    $user_id = Auth::id();

    $get_users_like = DB::table('msu_user_page')
    ->leftJoin('msu_invite_friends','msu_invite_friends.post_id','=','msu_user_page.msu_user_page_id')
    ->select('msu_user_page.*','msu_invite_friends.invitation_status')
    ->where(['like_user_page.user_id'=>$user_id])
    ->get();
  
    if(empty($get_users_like)){
       return "";
    }else{
       return $get_users_like->all(); 
    }
}

function get_page_invitation_like(){

        $user_id = Auth::id();
        $get_page_invitation =DB::table('msu_invite_friends')
        ->leftJoin('users','msu_invite_friends.friend_id','=','users.id')
        ->select('users.*','msu_invite_friends.*')
        ->where(['user_id'=>$user_id ,'type'=>'page'])
        ->get();


        return $get_page_invitation;


}

function get_page_notifications(){

     $get_page_notifications = DB::table('msu_user_notification')
     ->where(['type'=>'page Request'])
     ->get();


     return $get_page_notifications;

}
function get_post_user_id($id){
      
    $get_post_id = DB::table('msu_page_post')
    ->select('user_id')
    ->where(['id'=>$id])
    ->first();
     return $get_post_id;
}
function  get_post_cmt_like($id,$cmt_id){

     $get_page_like_cmt = DB::table('msu_page_post_like_comment')
     ->select('is_like')
     ->where(['post_id'=>$id,'comment_id'=>$cmt_id])
     ->first();
      return $get_page_like_cmt;


}

function  get_post_inner_cmt_like($id,$cmt_id){

    $get_post_inner_cmt_like = DB::table('msu_page_post_inner_like_comment')
    ->select('is_like')
    ->where(['post_id'=>$id,'comment_id'=>$cmt_id])
    ->first();
     return $get_post_inner_cmt_like;

}

function get_post_comments($id){

    $get_post_comments = DB::table('msu_comments')
    ->select('*')
    ->where(['post_id'=>$id])
    ->get();

    return $get_post_comments; 
}
function get_post_comment_like($id){
      $user_id = Auth::id();
      $get_post_comment_like = DB::table('msu_post_like_comment')
      ->select('is_like')
      ->where(['comment_id'=>$id,'user_id'=>$user_id])
      ->first();

 return $get_post_comment_like;
}

function get_post_cmt1($cmt_id){
     

    $get_post_cmt1 = DB::table('msu_post_inner_comment')
    ->select('*')
    ->where(['comment_id'=>$cmt_id])
    ->get();
     return $get_post_cmt1;

}


function get_user_group(){
     
    $user_id = Auth::id();

    $get_user_group = DB::table('msu_group')
    ->select('*')
    ->Where(['user_id'=>$user_id])
    ->get();
    return $get_user_group;
}
    
function get_user_group_details($id){


    $get_user_group = DB::table('msu_group')
    ->select('*')   
    ->Where(['user_id'=>$id])
    ->first();

    return $get_user_group;


}
function get_group_post($id){

    $get_group_post = DB::table('msu_group_post')
    ->select('*')
    ->where(['group_id'=>$id])
    ->get();
    return $get_group_post;
}
function get_like_group_status($id){

    $user= Auth::id();

     $get_page_status = DB::table('like_user_page')
     ->select('is_like')
     ->where(['group_id'=>$id,'user_id'=>$user,'type'=>'group'])
     ->first();

    if($get_page_status== ""){
       return "";
    }else{
       return $get_page_status->is_like;
    }
}
function get_total_group_like($id){
    $get_total_group_like = DB::table('like_user_page')
    ->select('id')
    ->where(['group_id'=>$id,'type'=>'group'])
    ->get();
    return $get_total_group_like;      
}

function get_total_group_cmt($post_id){

      $get_page_group_comment = DB::table('msu_page_group_comments')
        ->Select('*')
        ->where(['post_id'=>$post_id])
        ->get();

        return $get_page_group_comment;
}
function get_total_group_reply_cmt($comment)
{
    $get_page_group_reply_comment = DB::table('msu_group_reply_comment')
    ->select('*')
    ->where(['comment_id'=>$comment])
    ->get();


    return $get_page_group_reply_comment;
}
function get_group_like_comment($id){
    $user_id = Auth::id();  
    $get_group_like_comment = DB::table('msu_like_group_comment')
    ->select('is_like')
    ->where(['comment_id'=>$id,'user_id'=>$user_id,'is_like'=>1])
    ->first();

     return $get_group_like_comment;
}
function get_group_like_reply_comment($id){
    $user_id = Auth::id();  
    $get_group_like_comment = DB::table('msu_like_group_reply_comment')
    ->select('is_like')
    ->where(['comment_id'=>$id,'user_id'=>$user_id,'is_like'=>1])
    ->first();

     return $get_group_like_comment;
}
function get_group_invitation_list(){
    $user_id = Auth::id();
    $get_page_invitation =DB::table('msu_invite_friends')
    ->leftJoin('users','msu_invite_friends.friend_id','=','users.id')
    ->select('users.*','msu_invite_friends.*')
    ->where(['user_id'=>$user_id ,'type'=>'group'])
    ->get();

     return $get_page_invitation;
}
function get_group_invitation_like(){
    $user_id = Auth::id();
    $get_page_invitation =DB::table('msu_invite_friends')
    ->leftJoin('users','msu_invite_friends.friend_id','=','users.id')
    ->select('users.*','msu_invite_friends.*')
    ->where(['user_id'=>$user_id ,'type'=>'group','invitation_status'=>2])
    ->get();

    return $get_page_invitation;
}

function get_poll_created($id){
      $get_poll_created = DB::table('msu_create_poll')
      ->leftJoin('users','msu_create_poll.user_id','=','users.id')
      ->where(['msu_create_poll.id'=>$id])
      ->select('*')
      ->first();
         return $get_poll_created;
}

function get_poll_result($id){
    $user_id  = Auth::id();
   
    $get_poll_result = DB::table('msu_poll_result')
       ->where(['poll_id'=>$id,'user_id'=>$user_id])
       ->select('*')
       ->first();
  
    return $get_poll_result;
} 

function get_total_poll_count($poll,$poll_id){

    $get_poll_count = DB::table('msu_poll_result')
    ->where(['value'=>$poll,'poll_id'=>$poll_id])
    ->select('id')
    ->get();
     
    return count($get_poll_count);
}

function get_total_poll($poll_id){
    $get_poll_count = DB::table('msu_poll_result')
    ->where('poll_id',$poll_id)
    ->select('id')
    ->get();
     return count($get_poll_count);
}


function get_group_poll_created($id){
    $get_poll_created = DB::table('msu_create_poll')
    ->leftJoin('users','msu_create_poll.user_id','=','users.id')
    ->where(['msu_create_poll.id'=>$id,'poll_type'=>'group'])
    ->select('*')
    ->first();  
       return $get_poll_created;
}

function get_group_poll_result($id){
    $user_id  = Auth::id();
   
    $get_poll_result = DB::table('msu_poll_result')
       ->where(['poll_id'=>$id,'user_id'=>$user_id])
       ->select('*')
       ->first();
  
    return $get_poll_result;
} 
function get_page_poll_created($id){
    $get_poll_created = DB::table('msu_create_poll')
    ->leftJoin('users','msu_create_poll.user_id','=','users.id')
    ->where(['msu_create_poll.id'=>$id,'poll_type'=>'page'])
    ->select('*')
    ->first();  
       return $get_poll_created;
}

function get_page_poll_result($id){
    $user_id  = Auth::id();
   
    $get_poll_result = DB::table('msu_poll_result')
       ->where(['poll_id'=>$id,'user_id'=>$user_id])
       ->select('*')
       ->first();
    return $get_poll_result;
} 

function get_user_permission(){
   
    $user= Auth::id();

    $get_user_permission =DB::table('users')
    ->Where('id',$user)
    ->select('*')
    ->first();


    return $get_user_permission;

}