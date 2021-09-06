<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    public function postList(Request $request)
    { 
        $data = $request->all();
        $user = Auth::user();
        //echo "<pre>";print_r($user->name);
        $values = array('username' => $user->name,'user_id' => $user->id,'email' => $user->email,'text' => $data['msg']);
        DB::table('post_details')->insert($values);
        return back();
    }

    public function homepage(Request $request)
    { 
        $data = $request->all();
        $user = Auth::user();

        $users = DB::table('post_details')->where('user_id', $user->id)->get();
     
        return view('homepage', ['users' => $users]);
        
        return view('homepage');
    }
}
