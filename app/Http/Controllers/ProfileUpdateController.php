<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ProfileUpdateController extends Controller
{
    public function editBasic(Request $request){
     
        $users = DB::table('users')
        ->where('id', Auth::id())
        ->first();
       //dd($users->name);
        return view('edit-profile-basic', ['name' => $users->name, 'email'=> $users->email ]);
    }
    public function profileEdit(Request $request){
        $data = $request->all();
        //dd($data);
        $phone="";
        if(isset($data['phone']) && (isset($data['dob'])) && (isset($data['gender'])) && (isset($data['city'])) && (isset($data['country'])) && (isset($data['about_me'])) )
        {
            $request->validate([
                'phone' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'city' => 'required',
                'country' => 'required',
                'about_me' => 'required',
            ]); 
            
        }
        
        $values = array('phone' => $data['phone'], 'dob' => $data['dob'], 'gender' => $data['gender'], 'city' => $data['city'], 'country' => $data['country'], 'about_me' => $data['about_me'], 'status' => 1);
        DB::table('user_info')->insert($values);
        return back();
    }
}
