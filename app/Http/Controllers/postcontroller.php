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
        
        $imageName="";
        if(isset($data['image'])){
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            //|max:2048
      
            $imageName = time().'.'.$request->image->extension(); 
            $d = public_path('images'); 
            $request->image->move(public_path('upload/images'), $imageName);
            
        }
        
        $videoName="";
        if(isset($data['video'])){
            $request->validate([
                'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            ]);
            //|max:2048
            
            $videoName = time().'.'.$request->video->extension(); 
           // print_r($videoName);die;
            $d = public_path('video'); 
            $request->video->move(public_path('upload/videos'), $videoName);
            
        }
        // $audioName="";
        // if(isset($data['audio'])){
        //     print_r($data);die;
        //     $request->validate([
        //         'audio' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        //     ]);
        //     //|max:2048
            
        //     $audioName = time().'.'.$request->audio->extension(); 
        //    print_r($audioName);die;
        //     $d = public_path('audio'); 
        //     $request->audio->move(public_path('upload/audio'), $audioName);
            
        // }

        $values = array('user_id' => $user->id,'content' => $data['msg'],'images' => $imageName,'videos' => $videoName,'title' => $data['msg'],'status' => 1);
       // print_r($values);die;
        DB::table('msu_community_activities')->insert($values);
        return back();
        
    }

    public function homepage(Request $request)
    { 
        $data = $request->all();
        $user = Auth::user();

        
        $users = DB::table('post_details')->where('user_id', $user->id)->get();
        //echo "<pre>";print_r($user->id);
        //die();
     
        return view('homepage', ['users' => $users]);
        
        return view('homepage');
    }
}
