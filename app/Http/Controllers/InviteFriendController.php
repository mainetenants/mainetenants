<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\inviteFriends;
use App\Models\msu_user_notification;
use App\Models\like_user_page;


class InviteFriendController extends Controller
{
    public function invite_friend(Request $request){
        $data  = $request->all();

        $user_id = Auth::id();
        $insert = new inviteFriends();
        $insert->user_id = $user_id;
        $insert->friend_id = $data['friend_id'];
        $insert->post_id = (isset($data['post_id']))?($data['post_id']):(0);
        $insert->group_id= (isset($data['group_id']))?($data['group_id']):(0);
        $insert->event_id = (isset($data['event_id']))?($data['event_id']):(0);
        $insert->status = 1;
        $insert->invitation_status = 0;
        $insert->is_active = 1;
        $insert->save();
        $user_name = DB::table('users')
        ->select('name')
        ->where(['id' => Auth::id() ])
        ->first();
        $message = "";
        if(isset($data['post_id'])){
            $message = $user_name->name.' send\'s you a page invitation.';
        }elseif(isset($data['event_id'])){
            $message = $user_name->name.' send\'s you a event invitation.';
        }

        $data_notification = array('user_id' => $user_id,'friend_id'=> $data['friend_id'],'message'=> $message,'post_id'=>0,'page_id' =>  $insert->post_id,'is_seen'=>'1','type' => "pageRequest",);
    
        $notification =   DB::table('msu_user_notification')
        ->insert($data_notification);
        return response()->json(array('message'=> 'Invited successfully','status'=>true), 200);
    }
    public function cancel_invitation(Request $request){
        $data = $request->all();
        $user_id=Auth::id();

        inviteFriends::where(['user_id'=>$user_id,'post_id'=>$data['post_id'],'friend_id'=>$data['friend_id']])
        ->delete();     
        return response()->json(array('Delete Sucessfully'=> true,'status'=>1), 200);

    }
    public function view_user_page($id){
          
        return view('fav-page',['id'=>$id]);

    }
    public function like_page(Request $request){

        $data = $request->all();
        $user_id= Auth::id();
        $invite_friend = new like_user_page();
        $invite_friend->user_id = $user_id;
        $invite_friend->page_id = $data['page_id'];
        $invite_friend->friend_id = $data['friend_id'];
        $invite_friend->is_like = 1;
        $invite_friend->is_active = 1;
        $invite_friend->save();

        return response()->json(array('page like'=> true,'status'=>1), 200);

    }
    public function unlike_page(Request $request){
       
        $data = $request->all();
        $user_id=Auth::id();

        like_user_page::where(['user_id'=>$user_id,'page_id'=>$data['page_id'],'friend_id'=>$data['friend_id']])
        ->delete();     
        return response()->json(array('Delete Sucessfully'=> true,'status'=>1), 200);

    }
}
