<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class EventController extends Controller
{
   public function index(){
        return view('create-event');
   }
   public function events_view()
   {
        return view('events');
   }

   public function create_event(Request $request){
       $data = $request->all();
       $covername ="";
       if(isset($data['cover_photo'])){
           $request->validate([
               'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ]);
           $image = $request->file('cover_photo');
           $covername = time().'.'.$image->extension();
           
           $filePath = public_path('upload/images/events');
           
           $img = Image::make($image->path());
           $img_resize = $img->resize(1366, 350)->save($filePath.'/'.$covername);
           
       }  
       $values = array('cover_photo' => $covername,
       'user_id' => Auth::id(),
       'create_event' => $data['create_event'],
       'event_name' => $data['event_name'],
       'start_date' => $data['start_date'],
       'start_time' => $data['start_time'],
       'end_date' => $data['end_date'],
       'end_time' => $data['end_time'],
       'privacy' => $data['privacy'],
       'locations' => $data['locations'],
       'event_link' => $data['event_link'],
       'description' => $data['description'],
       'co_host' => $data['co_host'],
       'show_guest_list' => $data['show_guest_list'],
       'admin_add_post' => $data['admin_add_post'],
       'post_approve' => $data['post_approve'],
       

    );
    //dd($values);
           $data = DB::table('msu_events')
           ->insert($values);
           return back();
   }
       
}
