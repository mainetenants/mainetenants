<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function postList(Request $request)
    { 
        $data = $request->all();
        $user = Auth::user();
        
        $imagename ="";
        if(isset($data['image'])){
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $image = $request->file('image');
            // echo"<pre>"; print_r($image);die;
            $imagename = time().'.'.$image->extension();
         
            $filePath = public_path('upload/images');
    
            $img = Image::make($image->path());
            $img_resize = $img->resize(870, 470, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$imagename);
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
            $musicName = time().'.'.$request->music->extension(); 
            $request->music->move(public_path('upload/music'), $musicName);
            
        }

        $values = array('user_id' => $user->id,'content' => $data['msg'],'images' => $imagename,'videos' => $videoName,'title' => $data['msg'],'music' => $musicName,'status' => 1);
        DB::table('msu_community_activities')->insert($values);
        return back();
        
    }
    public function commentList(Request $request)
   
    {   
        $user = Auth::user();
        $data = $request->all();
        if(isset($data['comment'])){
            $request->validate([
                'comment' => 'required',
            ]);
        }
        $values = array('user_id' => $user->id,'post_id' => $data['post_id'],'comment' => $data['comment']);
        DB::table('msu_comments')->insert($values);
        return back();
        
    }

    public function homepage(Request $request)
    {   
        $id = Auth::id();
        
        $users = DB::table('msu_community_activities')
        ->leftJoin('users', 'msu_community_activities.user_id', '=', 'users.id')
        ->select('users.name', 'users.created_at', 'msu_community_activities.*', 'users.id as user_id', 'msu_community_activities.id as post_id')
        ->where('user_id', $id)
        ->orderBy('created', 'DESC')
        ->get();

        $comments = DB::table('msu_comments')
        ->where('user_id', $id)
        ->orderBy('created', 'DESC')
        ->get();

        $allusers = DB::table('users')
        ->select('*')
        ->orderBy('name', 'ASC')
        ->get();
        return view('homepage', ['users' => $users, 'comments' => $comments, 'allusers' => $allusers]);
  
    }
    
    public function logout(Request $request){
 
        Auth::logout();

        return Redirect('logout')->withsuccess("logout successfull");

    }
}
