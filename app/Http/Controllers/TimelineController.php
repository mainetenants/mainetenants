<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
   public function index(){
      $friend_reqs = DB::table('msu_friends')
      ->leftJoin('users', 'msu_friends.user_id', '=', 'users.id')
      ->select('users.name','users.profile_photo', 'users.id as friends_id')
      ->Where(['msu_friends.status' => '0', 'msu_friends.friends_id' => Auth::id()])
      ->get();

      $myFriends = DB::table('msu_isfriend')
      ->leftJoin('users', 'msu_isfriend.friends_id', '=', 'users.id')
      ->select('*')
      ->orWhere(['msu_isfriend.friends_id' => Auth::id() , 'msu_isfriend.user_id' => Auth::id()])
      ->get();
      // dd($myFriends);
    return view('timeline-friends', ['friends_reqs'=> $friend_reqs, 'myFriends'=> $myFriends]);
   }
}
