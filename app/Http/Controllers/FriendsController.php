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
       return view('time-line', ['id' => $id,'frnd_status' => $isfriends->status]);   
    }
    public function addFriend($id)
    {
        if (isset($id)) {
            $values = array('user_id' => Auth::id(),'friends_id' => $id,'status' => 0);
            DB::table('msu_friends')->insert($values);
        return back();
        }
   }
}
