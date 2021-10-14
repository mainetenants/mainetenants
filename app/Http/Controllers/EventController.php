<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\event;
use App\Models\user_event_details;

class EventController extends Controller
{
   public function index(){
        return view('create-event');
   }
   public function events_view(){
     $events = DB::table('msu_events')
     ->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
     ->select('msu_events.*', 'msu_user_event_details.action')
     ->get();
    //  dd($events); 
     return view('events', compact('events'));
   }
   public function your_events_listing(){      

        return view('your-events');
   }
   public function event_page(){      
        return view('event-page');
   }

   public function create_event(Request $request){
       $data = $request->all();
     //   $request->validate([
     //      'create_event' => 'required',
     //      'event_name' => 'required',
     //      'start_date' => 'required',
     //      'start_time' => 'required',
     //      'end_date' => 'required',
     //      'end_time' => 'required',
     //      'privacy' => 'required',
     //      'locations' => 'required',
     //      'event_link' => 'required',
     //      'description' => 'required',
     //   ]);
       $covername ="";
       if(isset($data['cover_photo'])){
           $request->validate([
               'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ]);
           $image = $request->file('cover_photo');
           $covername = time().'.'.$image->extension();
           
           $filePath = public_path('upload/images/events');
           
           $img = Image::make($image->path());
           $img_resize = $img->resize(280, 180)->save($filePath.'/'.$covername);
           
       } 
       if(isset($data['privacy'])){
        if($data['privacy']=="private"){
          $guest_invite = isset($data['guest_invite'])?($data['guest_invite']):(0);
        }else{
          $guest_invite = 0;
        }
       }
       if(isset($data['locations'])){
        if($data['locations']=="external_link"){
          $event_link = isset($data['event_link'])?($data['event_link']):('');
        }else{
          $event_link = '';
        }
       }
      
       $values = array('cover_photo' => $covername,
       'user_id' => Auth::id(),
       'create_event' =>  isset($data['create_event'])?($data['create_event']):(''),
       'event_type' =>  isset($data['event_type'])?($data['event_type']):(''),
       'event_name' => isset($data['event_name'])?($data['event_name']):(''),
       'start_date' => isset($data['start_date'])?($data['start_date']):(''),
       'start_time' => isset($data['start_time'])?($data['start_time']):(''),
       'end_date' => isset($data['end_date'])?($data['end_date']):(''),
       'end_time' => isset($data['end_time'])?($data['end_time']):(''),
       'privacy' => isset($data['privacy'])?($data['privacy']):(''),
       'locations' => isset($data['locations'])?($data['locations']):(''),
       'event_link' => $event_link,
       'description' => isset($data['description'])?($data['description']):(''),
       'co_host' => isset($data['co_host'])?($data['co_host']):(''),
       'show_guest_list' => isset($data['show_guest_list'])?($data['show_guest_list']):(0),
       'guest_invite' => $guest_invite,
       'admin_add_post' => isset($data['admin_add_post'])?($data['admin_add_post']):(0),
       'post_approve' => isset($data['post_approve'])?($data['post_approve']):(0),
    );
    // dd($values);
           $data = DB::table('msu_events')
           ->insert($values);
           return redirect('events')->with(['success'=>'Event created Successfully']);
   }
   public function event_action(Request $request){
    $data = $request->all();
// dd($data);
    // $user = msu_user_event_details::Where($email)->first();
    $user_event_details = new user_event_details;
    $event_action = DB::table('msu_user_event_details')
        ->select('id')
        ->where(['user_id' => Auth::id()])
        ->where(['event_id' => $data['event_id']])
        ->first();
        if($event_action){
          $user_event_details = user_event_details::find($event_action->id);
          $user_event_details->action = $data['action_id'];
          $user_event_details->save();
        }else{
          $user_event_details->user_id = Auth::id();
          $user_event_details->event_id = $data['event_id'];
          $user_event_details->action = (isset($data['action_id']))?($data['action_id']):(1);
          $user_event_details->save();
        }
    return response()->json(array('success'=> true), 200);


   }
       
}
