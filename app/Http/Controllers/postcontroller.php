<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\like_post_cmt;
use App\Models\post_inner_comment;
use App\Models\msu_group;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{

    public function postList(Request $request)
    {
        $data = $request->all();

        if (isset($data['u_id'])) {

            $user =  $data['u_id'];
        } else {
            $user1 = Auth::user();
            $user = $user1->id;
        }

        $imagename = "";
        if (isset($data['image'])) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $image = $request->file('image');
            // echo"<pre>"; print_r($image);die;
            $imagename = time() . '.' . $image->extension();

            $filePath = public_path('upload/images');
            $filePathThumb = public_path('upload/images/thumbnails');

            $img = Image::make($image->path());
            $img_resize = $img->resize(870, 470, function ($const) {
                $const->aspectRatio();
            })->save($filePath . '/' . $imagename);

            $img->resize(870, 470, function ($const) {
                $const->aspectRatio();
            })->save($filePathThumb . '/' . $imagename);
        }


        $videoName = "";
        if (isset($data['video'])) {
            $request->validate([
                'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/webm,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            ]);
            //|max:2048

            $videoName = time() . '.' . $request->video->extension();

            $request->video->move(public_path('upload/videos'), $videoName);
        }
        $musicName = "";
        if (isset($data['music'])) {
            $request->validate([
                'music' => 'mimes:application/octet-stream,music/mpeg,mpga,mp3,wav',
            ]);
            $musicName = time() . '.' . $request->music->extension();
            $request->music->move(public_path('upload/music'), $musicName);
        }

        $values = array('user_id' => $user, 'content' => $data['msg'], 'images' => $imagename, 'videos' => $videoName, 'title' => $data['msg'], 'music' => $musicName, 'status' => 1);
        DB::table('msu_community_activities')->insert($values);
        return back();
    }
    public function commentList(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if (isset($data['comment'])) {
            $request->validate([
                'comment' => 'required',
            ]);
        }

        $values = array('user_id' => $user->id, 'post_id' => $data['post_id'], 'comment' => $data['comment']);
        DB::table('msu_comments')
            ->insert($values);

        $user_id = DB::table('msu_community_activities')
            ->select('user_id')
            ->where(["id" => $data['post_id']])
            ->first();


        $user_name = DB::table('users')
            ->select('name')
            ->where(['id' => $user_id->user_id])
            ->first();



        $data_notification = array('user_id' => $user_id->user_id, 'friend_id' =>  $user->id, 'message' => $user_name->name . ' Commented on Your 
        Post' . $request->comment, 'post_id' => (int)$request->post_id, 'is_seen' => '1', 'type' => "Comment",);

        $notification =   DB::table('msu_user_notification')
            ->insert($data_notification);

        return back();
    }

    public function homepage(Request $request)
    {
        $id = Auth::id();

        $users = DB::table('msu_community_activities')
            ->leftJoin('users', 'msu_community_activities.user_id', '=', 'users.id')
            ->leftJoin('msu_isfriend', 'msu_isfriend.user_id', '=', 'msu_community_activities.user_id')
            ->select('users.name', 'users.created_at', 'msu_community_activities.*', 'msu_isfriend.user_id', 'msu_isfriend.is_follow', 'users.id as user_id', 'msu_community_activities.id as post_id')
            ->where(['msu_isfriend.friends_id' => $id, 'msu_isfriend.is_follow' =>  '1'])
            ->orderBy('created', 'DESC')
            ->get();




        $users1 = DB::table('msu_community_activities')
            ->leftJoin('users', 'msu_community_activities.user_id', '=', 'users.id')
            ->select('users.name', 'users.created_at', 'msu_community_activities.*', 'users.id as user_id', 'msu_community_activities.id as post_id')
            ->where(['users.id' => $id])
            ->orderBy('created', 'DESC')
            ->get();




        $comments = DB::table('msu_comments')
            ->leftJoin('msu_community_activities', 'msu_community_activities.id', '=', 'msu_comments.post_id')
            ->select('msu_comments.*', 'msu_community_activities.*')
            ->where(['msu_comments.user_id' => $id])
            ->orderBy('msu_comments.created', 'DESC')
            ->get();
        $allusers = DB::table('users')
            ->select('*')
            ->where('id', "!=", $id)
            ->orderBy('name', 'ASC')
            ->get();


        $id = Auth::id();
        $allnotification = DB::table('msu_user_notification')
            ->select('*')
            ->where(['friend_id' => $id])
            ->orderBy('created', 'DESC')
            ->get();
        $count = DB::table('msu_user_notification')
            ->select('id')
            ->where(['friend_id' => $id, 'is_seen' => 1])
            ->get();

        return view('homepage', ['users' => $users, 'users1' => $users1, 'comments' => $comments, 'allusers' => $allusers]);
    }


    public function logout(Request $request)
    {

        Auth::logout();

        return Redirect('logout')->withsuccess("logout successfull");
    }
    public function deletePost($id)
    {
        $delete = DB::table('msu_community_activities')
            ->where(['id' => $id, 'user_id' => Auth::id()])
            ->delete();
        return redirect('homepage');
    }
    public function likeDislikePost(Request $request)
    {
        $authid = Auth::id();
        // get the like status from db
        $like = DB::table('msu_like_dislike_posts')
            ->where(['user_id' => $authid, 'post_id' => $request->post_id])
            ->first();
        $values = array();
        // update like dislike and reaction
        if (isset($like) && !empty($like)) {
            if (($like->like_dislike == 1) && ($request->data == 'emoji') && isset($request->reaction)) {
                if ($like->reaction == $request->reaction) {
                    $values = array('like_dislike' => 0, 'reaction' => 0);
                } else {
                    $values = array('like_dislike' => 1, 'reaction' => $request->reaction);
                }
            }

            if (($like->like_dislike == 2) && ($request->data == 'emoji') && isset($request->reaction)) {
                $values = array('like_dislike' => 1, 'reaction' => $request->reaction);
            }

            if (($like->like_dislike == 2) && ($request->data == 'dislike')) {
                $values = array('like_dislike' => 0, 'reaction' => 0);
            }
            if (($like->like_dislike == 1) && ($request->data == 'dislike')) {
                $values = array('like_dislike' => 2, 'reaction' => 0);
            }
            if (($like->like_dislike == 0) && ($request->data == 'dislike')) {
                $values = array('like_dislike' => 2, 'reaction' => 0);
            }
            if (($like->like_dislike == 0) && ($request->data == 'emoji')) {
                $values = array('like_dislike' => 1, 'reaction' => $request->reaction);
            }

            $aa = DB::table('msu_like_dislike_posts')
                ->where(['user_id' => $authid, 'post_id' => $request->post_id])
                ->update($values);
        } elseif (!isset($like) && empty($like)) {
            //add like to the post
            if ($request->data == 'emoji') {
                if (isset($request->reaction) && !empty($request->reaction)) {
                    $values = array('user_id' => $authid, 'reaction' => $request->reaction, 'like_dislike' => ($request->data == 'emoji') ? ('1') : (''), 'post_id' => $request->post_id, 'reaction' => $request->reaction);
                } elseif (!isset($request->reaction) && empty($request->reaction)) {
                    $values = array('user_id' => $authid, 'reaction' => $request->reaction, 'like_dislike' => ($request->data == 'emoji') ? ('1') : (''), 'post_id' => $request->post_id);
                }
            }
            // add dislike to post
            if ($request->data == 'dislike') {
                $values = array('user_id' => $authid, 'like_dislike' => ($request->data == 'dislike') ? ('2') : (''), 'post_id' => $request->post_id);
            }

            $val = DB::table('msu_like_dislike_posts')
                ->insert($values);
            // dd($val);
        }

        $like = DB::table('msu_like_dislike_posts')
            ->where(['post_id' => $request->post_id, 'like_dislike' => 1])
            ->count();

        $dislikes = DB::table('msu_like_dislike_posts')
            ->where(['post_id' => $request->post_id, 'like_dislike' => 2])
            ->count();

        $values = array('likes' => $like, 'dislikes' => $dislikes);
        $val = DB::table('msu_community_activities')
            ->where(['id' => $request->post_id])
            ->update($values);

        $user_id = DB::table('msu_community_activities')
            ->select('user_id')
            ->where(["id" => $request->post_id])
            ->first();

        $user_name = DB::table('users')
            ->select('name')
            ->where(['id' => $user_id->user_id])
            ->first();

        $check_like = DB::table('msu_user_notification')
            ->select('id')
            ->where(['user_id' => $user_id->user_id, 'friend_id' => $authid])
            ->first();

        if ($request->data != 'dislike' and $check_like == "") {
            $data_notification = array('user_id' => $user_id->user_id, 'friend_id' => $authid, 'message' => $user_name->name . '  ' . $request->data . ' Your Post.', 'post_id' => (int)$request->post_id, 'is_seen' => '1', 'type' => "Like/Dislike",);

            $notification =   DB::table('msu_user_notification')
                ->insert($data_notification);
        }
          return response()->json(array('success'=> true), 200);
    }


    public function seennotification(Request $request)
    {
        $authid = Auth::id();

        DB::table('msu_user_notification')
        ->where(['friend_id'=> $authid])
        ->update(['is_seen' => 0]);
        return response()->json(array('updated sucessfully'=> true), 200);

        return response()->json(array('updated sucessfully' => true), 200);
    }
    public function getPost(Request $request){
        $editpost = DB::table('msu_community_activities')
        ->select('*')
        ->where('id', $request->post_id)
        ->first();
        return response()->json(array('success'=> true, 'content'=>$editpost->content, 'image'=>$editpost->images, 'post_id'=>$editpost->id), 200);
    }
    public function getReaction(Request $request)
    {
        $allReaction = DB::table('msu_like_dislike_posts')
        ->leftJoin('users', 'msu_like_dislike_posts.user_id', '=', 'users.id')
        ->leftJoin('msu_isfriend', 'msu_isfriend.user_id', '=', 'msu_like_dislike_posts.user_id')
        ->select('users.name','users.id','users.profile_photo','msu_like_dislike_posts.reaction','msu_isfriend.status as is_frnd_status')
        ->where('post_id', $request->post_id)
        ->get();   
         return response()->json(array('success'=> true, 'allReaction'=>$allReaction), 200);

    }
    public function editpost(Request $request)
    {
        $abc = DB::table('msu_community_activities')
            ->where('id', $request->post_id)
            ->update(['content' => $request->content]);
        return redirect('homepage');
    }
    Public function like_post_cmt(Request $request){
        $data = $request->all();
        $user_id = Auth::id();


        $like_post_cmt = new like_post_cmt();
        $like_post_cmt->user_id = $user_id;
        $like_post_cmt->post_id = $data['post_id'];
        $like_post_cmt->comment_id = $data['cmt_id'];
        $like_post_cmt->is_like = 1;
        $like_post_cmt->is_active = 1;
        $like_post_cmt->save();

        return response()->json(array('status' => 'like Successfully', 'status_res' => 1));
    }
    public function dislike_post_cmt(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::id();

        like_post_cmt::where(['comment_id' => $data['cmt_id'], 'post_id' => $data['post_id']])->delete();
        return response()->json(array('status' => 'dislike Successfully', 'status_res' => 1));
    }
    public function delete_post_comment(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::id();

        $delete_post_comment = DB::table('msu_comments')
            ->where(['id' => $data['cmt_id']])
            ->delete();
        return response()->json(array('status' => 'delete post', 'status_res' => 1));
    }
    public function save_inner_comments(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::id();
        $insert = new post_inner_comment();
        $insert->user_id = $user_id;
        $insert->post_id = $data['post_id1'];
        $insert->comment_id = $data['comment_id'];
        $insert->comment = $data['page_post_reply_comment'];
        $insert->is_like = 1;
        $insert->is_active = 1;
        $insert->save();

        return back();
    }
    public function save_group_controllers(Request $request){
          $data = $request->all();
          $user_id= Auth::id();
          $insert = new msu_group();
          $insert->user_id = $user_id;
          $insert->group_name = $data['group_name'];
          $insert->group_category = $data['group_category'];
          $insert->group_descripition = $data['group_descripition'];
          $insert->only_see = $data['only_see'];
          $insert->is_active = 1;
          $insert->save();
          return response()->json(array('status'=> 1,'status_res'=>'Successfull !!' ));
    }
}
