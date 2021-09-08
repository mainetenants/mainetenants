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

            $request->image->move(public_path('upload/images'), $imageName);
            
        }
        
        $videoName="";
        if(isset($data['video'])){
            $request->validate([
                'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            ]);
            //|max:2048
            
            $videoName = time().'.'.$request->video->extension(); 

            $request->video->move(public_path('upload/videos'), $videoName);
            
        }
        $musicName="";
        if(isset($data['music'])){
            $request->validate([
                'music' => 'mimes:application/octet-stream,music/mpeg,mpga,mp3,wav',
            ]);
            //|max:2048
            
            $musicName = time().'.'.$request->music->extension(); 
            $request->music->move(public_path('upload/music'), $musicName);
            
        }

        $values = array('user_id' => $user->id,'content' => $data['msg'],'images' => $imageName,'videos' => $videoName,'title' => $data['msg'],'music' => $musicName,'status' => 1);
    //   echo"<pre>"; print_r($values);die;
        DB::table('msu_community_activities')->insert($values);
        return back();
        
    }

    public function homepage(Request $request)
    { 
        $id = Auth::id();
        
        $users = DB::table('msu_community_activities')
        ->leftJoin('users', 'msu_community_activities.user_id', '=', 'users.id')
        ->where('user_id', $id)
        ->orderBy('created', 'DESC')
        ->get();
        // echo"<pre>";print_r($users);die;
        return view('homepage', ['users' => $users]);
  
    }
}
