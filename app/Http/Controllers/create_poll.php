<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\msu_create_poll;
use App\Models\msu_poll_result;



class create_poll extends Controller
{
   public function create_poll(Request $request){
      $user = Auth::id();       
      $data = $request->all();
      if ($data['expiry_time_id'] == "") {
          $insert = new msu_create_poll();
          $insert->user_id = $user;
          $insert->poll_title = $data['poll_title'];
          $value =implode(',', $data['add_poll']);
          $insert->poll0 = $value;
          $insert->poll_category = $data['poll_category'];
          $insert->expiry_time = $data['expiry_time'];
          $insert->save();

          $array = array('poll_id'=> $insert->id,'user_id'=>$user,'status'=>1);
          $createpost = DB::table('msu_community_activities')
         ->insert($array);
         return response()->json(array('status'=>1,'status_res'=>'succesfully saved'));
      }else{
         $value1 =implode(',', $data['add_poll']);
         $value = array('user_id'=>$user,'poll_title'=>$data['poll_title'],'poll0'=>$value1,'poll_category'=>$data['poll_category'],'expiry_time'=>$data['expiry_time']);
           msu_create_poll::where(['id'=>$data['expiry_time_id']])->update($value);
         return response()->json(array('status'=>1,'status_res'=>'succesfully updated'));
      }
      
   }
   public function poll_result(Request $request){
      $user_id = Auth::id();    
      $data = $request->all();
      $data1 = isset($data['checked_poll_id'])?$data['checked_poll_id']:'';
      if ($data1 == "") {
          $insert = new msu_poll_result();
          $insert->poll_id = $data['poll_id'];
          $insert->post_id = $data['post_id'];
          $insert->value = $data['value'];
          $insert->user_id = $user_id;
          $insert->save();

          return response()->json(array('status'=>1,'status_res'=>'successs saved','poll_id'=> $insert->poll_id,'post_id'=> $insert->post_id,'value'=>$insert->value));

      }else{
          msu_poll_result::where(['id'=>$data['checked_poll_id']])
          ->update(['value'=>$data['value']]);
          return response()->json(array('status'=>1,'status_res'=>'Update successfully '));

      }
   
   }
   public function manage_poll(){
          
        $user_id = Auth::id();
        $get_all_user_poll = msu_create_poll::where(['user_id'=>$user_id])
        ->select('*')
        ->get();
      
        return view('manage-poll',['get_all_user_poll'=>$get_all_user_poll]);
   }
   public function delete_created_poll(Request $request){
      $data = $request->all();

      msu_create_poll::where(['id'=>$data['id']])
      ->delete();
      DB::table('msu_community_activities')
      ->where(['poll_id'=>$data['id']])
      ->delete();

       return response()->json(array('status'=>1,'status_res'=>'deleted Successfully'));

   }

}
