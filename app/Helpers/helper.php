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


function alluser1(){

         
    $id = Auth::id();
    $allusers  = DB::table('msu_isfriend')
    ->leftJoin('users', 'msu_isfriend.friends_id', '=', 'users.id')
    ->leftJoin('msu_invite_friends','msu_invite_friends.friend_id','=','msu_isfriend.friends_id')
    ->select('*')
    ->Where(['msu_isfriend.user_id' =>  $id ,'msu_isfriend.is_follow'=>1,'msu_invite_friends.status'=>null])
    ->orWhere('msu_invite_friends.status','=',0)
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

      
function get_page_post_cmt1($id){
   


    $get_page_post_cmt = DB::table('page_post_comments')
    ->select('*')
    ->where(['post_id'=>$id ,'status' =>1])
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
      
      $string ="";
      foreach($users  as $user){
       $string .='<li><div class="comet-avatar">'.
       '<img src="{{ asset(\"assets/images/resources/comet-1.jpg\") }}\" alt="">'.
     '</div>'.
    '<div class="we-comment">'.
       '<div class="coment-head">'.
          '<h5><a href="time-line" title="">'. get_user_nane1($user->user_id) .'</a></h5>'.
          '<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply text-secondary"></i></a>'.
       '</div>'.
       '<p>'. $user->comment .'</p>'.
    '</div>'.
    '<div class="post-comt-box" style="display:none;">'.
    '<form method="post" id="page_post_reply_comments" enctype="multipart/form-data"   action="{{url("homepage")}}">'.
        '@csrf'.
        '<div class="row m-4">'.
        '<div class="col-sm-10">'.
        '<textarea placeholder="Post your comment" id="comment2" name="comment1"></textarea>'.
    '</div> <div class="col-sm-1">'.
    '<input type="hidden" name="post_id" id="post_id" value="{{ $user->id }}"/>'.
    '.<input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}"/>'.
    '<input type="hidden" name="status" id="status" value ="1"/>'.
    '<button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i></button>'.
    '</div>'.
'</form>'.
'</div>'.
    '</li> ';

      }
      echo $string;

        return $string;
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
        ->where(['user_id'=>$user_id])
        ->get();


        return $get_page_invitation;


}

function get_page_notifications(){

     $get_page_notifications = DB::table('msu_user_notification')
     ->where(['type'=>'page Request'])
     ->get();


     return $get_page_notifications;

}