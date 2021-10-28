<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\msu_group_post;
use App\Models\inviteFriends;
use App\Models\send_notification;
use App\Models\like_user_page;
use App\Models\msu_group_comments;
use App\Models\msu_group_reply_comment;
use App\Models\msu_like_group_comment;



class groupcontrollers extends Controller
{
    //
    public function view_user_group($id){
                  
        return view('my_group',['id'=>$id]);

    }
    Public function  edit_group_cover_pic(Request $request){
          $data = $request->all();


          $imagename ="";
          if(isset($data['file_group_cover_chnage'])){
              $request->validate([
                  'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
              ]);
              $image = $request->file('file_group_cover_chnage');
              // echo"<pre>"; print_r($image);die;
              $imagename = time().'.'.$image->extension();
  
              $filePath = public_path('upload/images');
              $filePathThumb = public_path('upload/images/thumbnails');
              
              $img = Image::make($image->path());
              $img_resize = $img->resize(1366, 350, function ($const) {
                  $const->aspectRatio();
              })->save($filePath.'/'.$imagename);
  
              $img->resize(1366, 350, function ($const) {
                  $const->aspectRatio();
              })->save($filePathThumb.'/'.$imagename);
          }

          $update  = DB::table('msu_group')->where('id', $data['group_id'])->update(array('cover_image' => $imagename));

            

          return back();
    }
    public function edit_group_profile_pic(Request $request ){

        $data = $request->all();   


        
        $imagename ="";
        if(isset($data['profile_photo'])){
            $request->validate([
                'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $image = $request->file('profile_photo');
            $imagename = time().'.'.$image->extension();
            
            $filePath = public_path('upload/images/profile_photo');
            
            $img = Image::make($image->path());
            $img_resize = $img->resize(170, 170, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$imagename);
            
        }
        $update  = DB::table('msu_group')->where('id', $data['group_id'])->update(array('profile_picture' => $imagename));
        return back();
    }   


    public function add_group_post(Request $request)
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
            $filePathThumb = public_path('upload/images/thumbnails');
             
            $img = Image::make($image->path());
            $img_resize = $img->resize(870, 470, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$imagename);

            $img->resize(870, 470, function ($const) {
                $const->aspectRatio();
            })->save($filePathThumb.'/'.$imagename);
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
 
        $insert = new msu_group_post();
        $insert->user_id = $user->id;
        $insert->group_id  = $data['group_id'];
        $insert->title = $data['msg'];
        $insert->content = $data['msg'];
        $insert->images  = $imagename;
        $insert->music = $musicName;
        $insert->videos = $videoName;
        $insert->likes = 0;
        $insert->dislikes = 0;
        $insert->status = 1;
        $insert->save();

        return back(); 

        // $values = array('user_id' => $user ,'content' => $data['msg'],'images' => $imagename,'videos' => $videoName,'title' => $data['msg'],'music' => $musicName,'status' => 1);
        // DB::table('msu_community_activities')->insert($values);
        // return back();

    }

    public function invite_friend_group(Request $request){
        
         $user = Auth::id();
          $get_user_name = DB::table('users')
          ->Select('name')
          ->where(['id'=>$user])
          ->first();


         $data = $request->all();
         $invite_friend_group = new inviteFriends();
         $invite_friend_group->user_id = $user;
         $invite_friend_group->friend_id = $data['friend_id'];
         $invite_friend_group->post_id = $data['post_id'];
         $invite_friend_group->type = $data['type'];
         $invite_friend_group->status = 1;
         $invite_friend_group->invitation_status = 1;
         $invite_friend_group->is_active = 1;
         $invite_friend_group->save();

         $send_notificaiton = new send_notification();
         $send_notificaiton->user_id = $user;
         $send_notificaiton->friend_id = $data['friend_id'];
         $send_notificaiton->post_id = 0;
         $send_notificaiton->page_id = 0;
         $send_notificaiton->group_id = $data['post_id'];
         
         $send_notificaiton->message = $get_user_name->name."send you Group Invitation";
         $send_notificaiton->type ='group_Request';
         $send_notificaiton->is_seen = 1;
         $send_notificaiton->save();


         return response()->json(array('status'=>1,'status_res'=>"Successfully send"));
    }
    public function invite_group_cancel(Request $request){
        $data = $request->all();
        $user = Auth::id();
        $invite  = inviteFriends::select('id')
                    ->where(['user_id'=>$user,'friend_id'=>  $data['friend_id'] ,'post_id'=> $data['post_id'],'type'=>'group'])
                    ->first();

        $invite_friend_group=inviteFriends::find($invite->id)->delete(); //returns true/false

        return response()->json(array('status'=>1,'status_res'=>"Successfully Delete"));
            }
    public function like_group(Request $request){

           
            $data  = $request->all();
            $user_id = Auth::id();
            $get_user_name = DB::table('users')
            ->Select('name')
            ->where(['id'=>$user_id])
            ->first();
            $like_group = new like_user_page();
            $like_group->user_id = $user_id;
            $like_group->page_id = 0;
            $like_group->group_id = $data['group_id'];           
            $like_group->friend_id = $data['friend_id'];
            $like_group->type = 'group';
            $like_group->is_like = 1;
            $like_group->is_active = 1;
            $like_group->save();
            

            $send_notificaiton = new send_notification();
            $send_notificaiton->user_id = $user_id;
            $send_notificaiton->friend_id = $data['friend_id'];
            $send_notificaiton->post_id = 0;
            $send_notificaiton->page_id = 0;
            $send_notificaiton->group_id = $data['group_id'];
            $send_notificaiton->message = $get_user_name->name." Accept your Group Invitation";
            $send_notificaiton->type ='group_Request';
            $send_notificaiton->is_seen = 1;
            $send_notificaiton->save();
            return response()->json(array('status'=>1,'status_res'=>"Successfull!!"));
    }
    public function unlike_group(Request $request){

        $data  = $request->all();
        $user_id = Auth::id();
        $invite  = like_user_page::select('id')
        ->where(['user_id'=>$user_id,'friend_id'=>  $data['friend_id'] ,'group_id'=> $data['group_id'],'type'=>'group'])
        ->first();
        like_user_page::find($invite->id)->delete(); //returns true/false

        return response()->json(array('status'=>1,'status_res'=>"Successfull!!"));

    }
    public function page_group_comments(Request $request){

          
        $data = $request->all();
        // dd($data);  
        $user_id = Auth::id();        
        $add_comment = new msu_group_comments();
        $add_comment->user_id = $user_id;
        $add_comment->post_id = $data['post_id'];
        $add_comment->group_id = $data['group_id']; 
        $add_comment->title = $data['p_comment'];
        $add_comment->comment = $data['p_comment'];
        $add_comment->likes = 1;
        $add_comment->dislikes = 1;
        $add_comment->status = 1;
        $add_comment->save();

        $get_user_name = DB::table('users')->select('name')->where(['id'=>$user_id])->first();
        $comment  = array('user_id'=>$user_id,'comment'=>$data['p_comment'],'comment_id'=>$add_comment->id);
        return response()->json(array('status'=>1,'status_res'=>'Successfully Saved','comments'=>$comment,'post_id'=>$data['post_id'],'name'=>$get_user_name->name));
    }
    public function save_group_reply_comment(Request $request){
         $data = $request->all();
         $user_id  = Auth::id();
 
        $save_group_reply = new msu_group_reply_comment();
        $save_group_reply->user_id  = $user_id;
        $save_group_reply->comment_id  = $data['comment_id'];
        $save_group_reply->post_id = $data['post_id1'];
        $save_group_reply->comment = $data['r_comment'];
        $save_group_reply->is_active = 1;
        $save_group_reply->status = $data['status'];
        $save_group_reply->save();

        $get_user_name= DB::table('users')
        ->select('name')
        ->where(['id'=>$user_id])
        ->first();

        $array = array('name'=>$get_user_name->name,'comment_id'=>$data['comment_id'],'comment'=>$data['r_comment']);       
        return response()->json(array('status'=>1 ,'status_res'=>"Successfull",'reply_comment'=>$array));
   }
   public function like_group_comment(Request $request){
           $data= $request->all();

           $user_id= Auth::id();
           $like_comment = new msu_like_group_comment();
           $like_comment->user_id = $user_id;
           $like_comment->comment_id = $data['cmt_id'];
           $like_comment->is_like = 1;
           $like_comment->status = 1;
           $like_comment->save();

           return response()->json(array('status'=>1,'status_res'=>'successfull'));
   }
   public function dislike_group_comment(Request $request){
         $data = $request->all();
         $user_id =
         msu_like_group_comment::where([''])->delete();
 

   }
}
