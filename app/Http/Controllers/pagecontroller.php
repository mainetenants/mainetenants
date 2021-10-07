<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\msu_user_page;
use App\Models\page_category;
use App\Models\msu_page_post;
use App\Models\page_post_comments;
use App\Http\Controllers\AboutController;
use Intervention\Image\ImageManagerStatic as Image;

class pagecontroller extends Controller
{
    public function create_new_page(Request $request){
         
      $data = $request->all();

         $user_id = Auth::id();
         $msu_user_page = new msu_user_page;
         $msu_user_page->user_id = $user_id;
         $msu_user_page->page_info = $data['page_info'];
         $msu_user_page->page_category = $data['category_value'];
         $msu_user_page->page_descripition = $data['page_descripition'];
         $msu_user_page->is_active = 1;

         $msu_user_page->save();


         $category = DB::table('page_cateogry')
         ->select(['category_name'])
         ->where(['category_name'=>$data['category_value'],'is_active'=>1])
         ->first();
       if($category ==""){
          $array = array('category_name'=>$data['category_value'],'is_active'=>1);
            $insert= DB::table('page_cateogry')
            ->insert($array);
       
    }
      
        $user_page = msu_user_page::select(['user_id','page_info','page_category'])->where(['user_id'=>$user_id,'is_active'=>1]);
        return redirect('your_page');
         
    }

    public function create_new_post(Request  $request){

       $data = $request->all();
      if(isset($data['u_id'])){
            
        $user =  $data['u_id'];
     }else{
        $user1 = Auth::user();
        $user = $user1->id;
      
     }

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

    $values = array('user_id' => $user ,'content' => $data['msg'],'images' => $imagename,'videos' => $videoName,'title' => $data['msg'],'music' => $musicName,'status' => 1);

        $data = $request->all();
        $page_post = new msu_page_post();
        $page_post->title = $data['msg'];
        $page_post->content = $data['msg'] ;
        $page_post->images=  $imagename;
        $page_post->videos = $videoName;
        $page_post->music = $musicName ;
        $page_post->likes = 0;
        $page_post->dislikes = 0;
        $page_post->user_id = $user ;
        $page_post->page_id = $data['post_id'];
        $page_post->status = 1;

        $page_post->save();
        

    return back();     
    }

    public function add_profile_pic(Request  $request){
            
        $data = $request->all();
        $user_id = Auth::id();

        $update  =   DB::table('users')
        ->where('id', $user->id)
        ->update(['active' => true]);
    }
    public function save_page_post_cmt(Request $request){
        
        $data = $request->all();

        $user_id = Auth::id(); 
        $page_post = new page_post_comments();
        $page_post->user_id = $user_id;
        $page_post->post_id = $data['post_id'];
        $page_post->page_id = $data['post_id'];
        $page_post->comment = $data['page_post_cmt'];
        $page_post->status = $data['status'];
        $page_post->is_active = 1;
        
        $page_post->save();

        

        return back();

    }
    public  function get_page_notifications(Request $request){
        $request = $request->all();
        $user_id = Auth::id();
       $get_page_notifications1 = DB::table('msu_user_notification')
        ->select('*')
        ->where(['page_id'=>$request['page_id'],'friend_id'=> $user_id])
        ->get(); 
        $get_page_notifications =$get_page_notifications1->all();
        if(!empty($get_page_notifications)){
         
                       foreach($get_page_notifications as $result){
            $response   =     '<div class="col-sm-6 text-left">'.
                         '<h5>';
                         $result->message;                        
            $response  .=    '</h5>' .
                         '</div>';
                       }
           return response()->json(array('Notification send'=> true,'status'=>1,'get_page_notifications'=>$response), 200);
   }else{


    
                $response   =     '<div class="col-sm-6 text-left">'.
                                    '<h5> No Notification Found</h5>'.
                               '</div>';
          
return response()->json(array('No Notifications Found'=> true,'status'=>1,'get_page_notifications'=>$response), 200);

     }

}

public function edit_profile_pic(Request $request){
    $data = $request->all();
    $id = Auth::id();

    
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
        $values = array('images' => $imagename);
        DB::table('users')
        ->where('id', $id)
        ->update([
            'profile_photo' => $imagename
        ]);


        $update = DB::table('msu_user_page')
        ->where('msu_user_page_id',$data['page_id'])
        ->update(['profile_image'=>$imagename]);


        return back();

}


public function edit_cover_pic(Request $request)
{
    $data = $request->all();
    $id = Auth::id();
    
    $covername ="";
    if(isset($data['cover_photo'])){
        $request->validate([
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $image = $request->file('cover_photo');
        $covername = time().'.'.$image->extension();
        
        $filePath = public_path('upload/images/profile_photo');
        
        $img = Image::make($image->path());
        $img_resize = $img->resize(1366, 350)->save($filePath.'/'.$covername);
        
    }  //dd  
    //dd($imagename);
        $values = array('images' => $covername,);
        DB::table('msu_user_page')
        ->where('msu_user_page_id', $data['page_id'])
        ->update([
            'cover_image' => $covername
            ]);
        return back();
}
Public function get_page_post(Request $request){
     $data = $request->all();
     $user_id = Auth::id();
     $get_page_post = DB::table('msu_page_post')
     ->select('*')
     ->where(['id'=>$data['post_id'],'user_id'=>$user_id])
     ->first();
     return response()->json(array('get_page_post'=>$get_page_post,'status'=>1));
}  
Public function edit_page_post(Request $request){
    $data = $request->all();
    $user_id = Auth::id();  
      
    $imagename ="";
    if(isset($data['page_post_image'])){ 
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $image = $request->file('page_post_image');
        $imagename = time().'.'.$image->extension();
        
        $filePath = public_path('upload/images/profile_photo');
        
        $img = Image::make($image->path());
        $img_resize = $img->resize(170, 170, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$imagename);
        
    }
    $update = array('content'=>$data['content'],'images'=>$imagename) ;
     DB::table('msu_page_post')
    ->where(['id'=>$data['post_id']])
    ->update($update);

    return back();
}
public function deletePost(Request $request){

    $data = $request->all();
    $user = Auth::id();

    $delete = DB::table('msu_page_post')
    ->where(['id'=>$data['post_id']])
    ->delete();

    $page_comments = DB::table('page_post_comments')
    ->select('id')
    ->where(['post_id'=>$data['post_id']])
    ->first();

    if($page_comments->id != ""){

         DB::table('page_post_comments')
        ->where(['post_id'=>$data['post_id']])
        ->delete();
    
    }

    return response()->json(array("status"=>"Sucessfully Deleted",'status_res'=>1));


}
public function deletecomment(Request $request){

        $data = $request->all();
          DB::table('page_post_comments')
        ->where(['id'=>$data['cmt_id']])
        ->delete();



        return response()->json(array('status'=>"Sucessfully Deleted",'status_res'=>1));


}
}
