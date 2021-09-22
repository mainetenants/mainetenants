<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FriendsController extends Controller
{
   public function viewfriends($id)
    {   
        $isfriends = DB::table('msu_friends')
        ->select('*')
        ->where(['friends_id'=>$id, 'user_id'=>Auth::id(), 'status'=>'0'])
        ->first();
        return view('time-line', ['id' => $id,'frnd_status' => isset($isfriends)?($isfriends->status):(2)]);   
    }
    public function addFriend($id)
    {
        if (isset($id)) {
            $values = array('user_id' => Auth::id(),'friends_id' => $id,'status' => 0);
            DB::table('msu_friends')->insert($values);
            $values1 = array('friends_id' => Auth::id(),'user_id' => $id,'status' => 0);
            DB::table('msu_friends')->insert($values1);

            $user_name = DB::table('users')
            ->select('name')
            ->where(['id' => Auth::id() ])
            ->first();
            $data_notification = array('user_id' => Auth::id(),'friend_id'=> $id,'message'=> $user_name->name.' is send you a friend request.','post_id' =>0,'is_seen'=>'1','type' => "Friend Request",);
            
            $notification =   DB::table('msu_user_notification')
            ->insert($data_notification);
        
            return back();
        }
    }
    public function cancelRequest($id)
    {
        if (isset($id)) {
            $test = DB::table('msu_friends')
            ->where(['friends_id'=>$id, 'user_id'=>Auth::id(), 'status'=>'0'])
            ->orWhere(['user_id'=>$id, 'friends_id'=>Auth::id(), 'status'=>'0'])
            ->delete();
        return back();
        }
    }
    public function unfrind($id)
    {
        if (isset($id)) {
            $test = DB::table('msu_isfriend')
            ->where(['friends_id'=>$id, 'user_id'=>Auth::id(), 'status'=>'1'])
            ->delete();
            $test2 = DB::table('msu_isfriend')
            ->where(['user_id'=>$id, 'friends_id'=>Auth::id(), 'status'=>'1'])
            ->delete();
        return back();
        }
    }
    public function confirmRequest($id)
    {
        if (isset($id)) {
            DB::table('msu_friends')
            ->where(['friends_id'=>Auth::id(), 'user_id'=>$id, 'status'=>'0'])
            ->delete();
            DB::table('msu_friends')
            ->where(['user_id'=>Auth::id(), 'friends_id'=>$id, 'status'=>'0'])
            ->delete();
            $values = array('user_id' => Auth::id(),'friends_id' => $id,'status' => 1);
            $values2 = array('friends_id' => Auth::id(),'user_id' => $id,'status' => 1);
            DB::table('msu_isfriend')->insert($values);
            DB::table('msu_isfriend')->insert($values2);   

            $user_name = DB::table('users')
            ->select('name')
            ->where(['id' => Auth::id() ])
            ->first();
            $data_notification = array('user_id' => Auth::id(),'friend_id'=> $id,'message'=> $user_name->name.' Accept your  friend request.','post_id' =>0,'is_seen'=>'1','type' => "Friend Request",);
            
            $notification =   DB::table('msu_user_notification')
            ->insert($data_notification);
            return back();

        }
    }
}