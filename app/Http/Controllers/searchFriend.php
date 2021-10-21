<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Auth;

class searchFriend extends Controller
{
    public function search_friend(Request $request){

           $data = $request->all();
           $sql_query =  DB::table('users')
           ->Select('*')
           ->Where('name', 'like', '%'.$data['search'].'%')
           ->get();           
               return response()->json(array('status'=>1,'status_res'=>$sql_query), 200);
    }
}
