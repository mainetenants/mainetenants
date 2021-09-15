<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
   public function index(){
      $friends = DB::table('msu_friends')
      ->leftJoin('users', 'msu_friends.friends_id', '=', 'users.id')
      ->select('users.name','users.profile_photo', 'msu_friends.status', 'msu_friends.user_id as friends_id')
      ->Where(['msu_friends.status' => '0', 'friends_id' => Auth::id()])
      ->get();

      $myFriends = DB::table('msu_friends')
      ->leftJoin('users', 'msu_friends.friends_id', '=', 'users.id')
      ->select('users.name','users.profile_photo', 'msu_friends.status', 'msu_friends.user_id as friends_id')
      ->Where(['msu_friends.status' => '1', 'friends_id' => Auth::id()])
      ->orWhere(['friends_id' => '1', 'msu_friends.status' => Auth::id()])
      ->get();
      // echo'<pre>';print_r($myFriends);die;
    return view('timeline-friends', ['friends_reqs'=> $friends, 'myFriends'=> $myFriends]);
   }
}
