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
    //    dd($users);
        return view('edit-profile-basic', ['name' => $users->name, 'email'=> $users->email]);
    }
    public function profileEdit(Request $request){
        $data = $request->all();
        //dd($data);
        // $phone="";
        if(isset($data['phone']) && (isset($data['dob'])) && (isset($data['language'])) && (isset($data['gender'])) && (isset($data['city'])) && (isset($data['country'])) && (isset($data['about_me'])) )
        {
            $request->validate([
                // 'phone' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'city' => 'required',
                'country' => 'required',
                'about_me' => 'required',
            ]); 
            
        }
        
        $values = array('phone' => $data['phone'], 'dob' => $data['dob'], 'language' => $data['language'], 'gender' => $data['gender'], 'city' => $data['city'], 'country' => $data['country'], 'about_me' => $data['about_me'], 'status' => 1);
        DB::table('user_info')
        ->where(['user_id' => Auth::id()])
        ->update($values);
        return back();
    }



    public function workEducationInfo(Request $request){

        $data = $request->all();
        $values = array('graduate' => $data['graduate'], 'masters' => $data['masters'], 'studyAt' => $data['studyAt'], 'city' => $data['city'],  'toDate' => $data['toDate'], 'fromDate' => $data['fromDate'],'description' => $data['description']);
        
        if(isset($values)){
            $work = DB::table('msu_user_work_education')
            ->where(['user_id' => Auth::id()])
            ->update($values);
            return back();
        }

        
    }


    public function interestInfo(Request $request){
 
        $data = $request->all();
        $values = array('interest' => $data['interest'], 'user_id' => Auth::id());
        
        
        if(isset($values)){
            $work = DB::table('msu_interest')
            ->insert($values);
            return back();
        }

        
    }

    public function accountInfo(Request $request){

        $data = $request->all();
        $sub_users=1;
        if(empty($data['sub_users'])){
            $sub_users=0;
        }
        $enable_follow_me=1;
        if(!isset($data['enable_follow_me'])){
            $enable_follow_me=0;
        }
        $send_me_notifications=1;
        if(!isset($data['send_me_notifications'])){
            $send_me_notifications=0;
        }
        $text_messages=1;
        if(!isset($data['text_messages'])){
            $text_messages=0;
        }
        $enable_tagging=1;
        if(!isset($data['enable_tagging'])){
            $enable_tagging=0;
        }
        $enable_sound_notification=1;
        if(!isset($data['enable_sound_notification'])){
            $enable_sound_notification=0;
        }
        $values = array('sub_users' => $sub_users, 'enable_follow_me' => $enable_follow_me, 'send_me_notifications' => $send_me_notifications, 'text_messages' => $text_messages,  'enable_tagging' => $enable_tagging, 'enable_sound_notification' => $enable_sound_notification);
        
        if(isset($values)){
            $work = DB::table('msu_account_setting')
            ->where(['user_id' => Auth::id()])
            ->update($values);
            return back();
        }

        
    }
    public function accountSetting(Request $request){
        $allusers = DB::table('users')
        ->select('*')
        ->first();
        return view('edit-account-setting', ['allusers' => $allusers]);
    }
   
}


