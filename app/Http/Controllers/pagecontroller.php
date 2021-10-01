<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\msu_user_page;
use App\Models\page_category;
use App\Models\msu_page_post;
use App\Models\page_post_comments;

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
        return view('fav-page');
         
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
        

        return redirect('fav-page');     
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
        $page_post->status = $data['data'];
        $page_post->is_active = 1;
        
        $page_post->save();

        

        return redirect('fav-page');

    }
}
