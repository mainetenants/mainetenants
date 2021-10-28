<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Event;
use App\Models\msu_user_event_details;
use App\Models\User;
use App\Models\user_event_details;

class EventController extends Controller
{
	public function index()
	{

		return view('create-event');
	}

	public function events_view()
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->get();

		return view('events', compact('events'));
	}
	public function events_hosting_view()
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->where('msu_events.user_id', Auth::id())
			->get();

		return view('events', compact('events'));
	}
	public function event_not_interested_view()
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->where('action', "3")
			->get();

		return view('events', compact('events'));
	}
	public function event_going_view()
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->where('action', "2")
			->get();

		return view('events', compact('events'));
	}
	public function event_interested_view()
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->where('action', "1")
			->get();

		return view('events', compact('events'));
	}
	public function your_event_view()
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->where('action', "1")
			->get();

		return view('events', compact('events'));
	}
	public function event_invited_view()
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->rightJoin('msu_invite_friends', 'msu_invite_friends.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->get();

		return view('events', compact('events'));
	}

	public function your_events_listing()
	{

		return view('your-events');
	}


	public function event_page($id)
	{

		$events = DB::table('msu_events')
			->leftJoin('msu_user_event_details', 'msu_user_event_details.event_id', '=', 'msu_events.id')
			->select('msu_events.*', 'msu_user_event_details.action')
			->where('msu_events.id', $id)
			->first();

		$user = User::where('id', $events->user_id)->first();
		$respond = msu_user_event_details::where('id', $id)->first();
		$interesed = msu_user_event_details::where(['id' => $id, 'action' => 1])->get();
		$going = msu_user_event_details::where(['id' => $id, 'action' => 2])->get();
		$not_interested  = msu_user_event_details::where(['id' => $id, 'action' => 3])->get();

		


		$action = array(
			'interesed' => $interesed->count(),
			'going' => $going->count(),
			'not_interested' => $not_interested->count(),
		);

		$users = DB::table('msu_event_posts')
            ->leftJoin('users', 'msu_event_posts.user_id', '=', 'users.id')
            ->leftJoin('msu_isfriend', 'msu_isfriend.user_id', '=', 'msu_event_posts.user_id')
            ->select('users.name', 'users.created_at', 'msu_event_posts.*', 'msu_isfriend.user_id', 'msu_isfriend.is_follow', 'users.id as user_id', 'msu_event_posts.id as post_id')
            ->where(['msu_isfriend.friends_id' => $id, 'msu_isfriend.is_follow' =>  '1'])
            ->orderBy('created', 'DESC')
            ->get();
		$comments = DB::table('msu_comments')
            ->leftJoin('msu_event_posts', 'msu_event_posts.id', '=', 'msu_comments.post_id')
            ->select('msu_comments.*', 'msu_event_posts.*')
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


		$users1 = DB::table('msu_event_posts')
            ->leftJoin('users', 'msu_event_posts.user_id', '=', 'users.id')
            ->select('users.name', 'users.created_at', 'msu_event_posts.*', 'users.id as user_id', 'msu_event_posts.id as post_id')
            ->where(['users.id' => $id])
            ->orderBy('created', 'DESC')
            ->get();

		// dd($action);
		
		return view('event-page', ['id' => $id, 'events' => $events, 'username' => $user->name, 'user_id' => $user->id, 'profile_photo' => $user->profile_photo, 'respond' => $respond->count(), 'action' => $action, 'users' => $users, 'users1' => $users1, 'comments' => $comments, 'allusers' => $allusers, 'total_comments' => $comments->count() ,'going'=>$going]);
	}

	public function create_event(Request $request)
	{
		$data = $request->all();

		$covername = "";
		if (isset($data['cover_photo'])) {
			$request->validate([
				'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
			]);
			$image = $request->file('cover_photo');
			$covername = time() . '.' . $image->extension();

			$filePath = public_path('upload/images/events');

			$img = Image::make($image->path());
			$img_resize = $img->resize(800, 400)->save($filePath . '/' . $covername);
		}
		if (isset($data['privacy'])) {
			if ($data['privacy'] == "private") {
				$guest_invite = isset($data['guest_invite']) ? ($data['guest_invite']) : (0);
			} else {
				$guest_invite = 0;
			}
		}
		if (isset($data['locations'])) {
			if ($data['locations'] == "external_link") {
				$event_link = isset($data['event_link']) ? ($data['event_link']) : ('');
			} else {
				$event_link = '';
			}
		}

		$values = array(
			'cover_photo' => $covername,
			'user_id' => Auth::id(),
			'create_event' =>  isset($data['create_event']) ? ($data['create_event']) : (''),
			'event_type' =>  isset($data['event_type']) ? ($data['event_type']) : (''),
			'event_name' => isset($data['event_name']) ? ($data['event_name']) : (''),
			'start_date' => isset($data['start_date']) ? ($data['start_date']) : (''),
			'start_time' => isset($data['start_time']) ? ($data['start_time']) : (''),
			'end_date' => isset($data['end_date']) ? ($data['end_date']) : (''),
			'end_time' => isset($data['end_time']) ? ($data['end_time']) : (''),
			'privacy' => isset($data['privacy']) ? ($data['privacy']) : (''),
			'locations' => isset($data['locations']) ? ($data['locations']) : (''),
			'event_link' => $event_link,
			'description' => isset($data['description']) ? ($data['description']) : (''),
			'co_host' => isset($data['co_host']) ? ($data['co_host']) : (''),
			'show_guest_list' => isset($data['show_guest_list']) ? ($data['show_guest_list']) : (0),
			'guest_invite' => $guest_invite,
			'admin_add_post' => isset($data['admin_add_post']) ? ($data['admin_add_post']) : (0),
			'post_approve' => isset($data['post_approve']) ? ($data['post_approve']) : (0),
		);

		$data = DB::table('msu_events')
			->insert($values);

		return redirect('events')->with(['success' => 'Event created Successfully']);
	}

	public function event_action(Request $request)
	{
		$data = $request->all();
		$user_event_details = new user_event_details;
		$event_action = DB::table('msu_user_event_details')
			->select('id')
			->where(['user_id' => Auth::id()])
			->where(['event_id' => $data['event_id']])
			->first();
		if ($event_action != NUll) {
			$user_event_details = user_event_details::find($event_action->id);
			$user_event_details->action = (isset($data['action_id'])) ? ($data['action_id']) : (0);
			$user_event_details->save();
		} else {
			$user_event_details->user_id = Auth::id();
			$user_event_details->event_id = $data['event_id'];
			$user_event_details->action = (isset($data['action_id'])) ? ($data['action_id']) : (1);
			$user_event_details->save();
		}

		return response()->json(array('success' => true), 200);
	}

	public function event_post(Request $request)
	{
		$data = $request->all();
		$user = Auth::id();

		$imagename = "";
		if (isset($data['image'])) {
			$request->validate([
				'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
			]);
			$image = $request->file('image');
			// echo"<pre>"; print_r($image);die;
			$imagename = time() . '.' . $image->extension();

			$filePath = public_path('upload/images/events');
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
				'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
			]);
			//|max:2048

			$videoName = time() . '.' . $request->video->extension();

			$request->video->move(public_path('upload/videos/events'), $videoName);
		}
		$musicName = "";
		if (isset($data['music'])) {
			$request->validate([
				'music' => 'mimes:application/octet-stream,music/mpeg,mpga,mp3,wav',
			]);
			$musicName = time() . '.' . $request->music->extension();
			$request->music->move(public_path('upload/music/events'), $musicName);
		}

		$values = array('user_id' => Auth::id(), 'content' => $data['msg'], 'images' => $imagename, 'videos' => $videoName, 'title' => $data['msg'], 'music' => $musicName, 'status' => 1);

		DB::table('msu_event_posts')->insert($values);
		return back();		
	}

	public function edit_event($id) {
	
		$edit_event = DB::table('msu_events')
			->where('msu_events.id', $id)->first();
			dd($edit_event);
		return view('editEvents', compact('edit_event'));

	}



	public function update_event(Request $request){
	
		$data = $request->all();

		$covername = "";
		if (isset($data['cover_photo'])) {
			$request->validate([
				'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
			]);
			$image = $request->file('cover_photo');
			$covername = time() . '.' . $image->extension();

			$filePath = public_path('upload/images/events');

			$img = Image::make($image->path());
			$img_resize = $img->resize(800, 400)->save($filePath . '/' . $covername);
		}
		if (isset($data['privacy'])) {
			if ($data['privacy'] == "private") {
				$guest_invite = isset($data['guest_invite']) ? ($data['guest_invite']) : (0);
			} else {
				$guest_invite = 0;
			}
		}
		if (isset($data['locations'])) {
			if ($data['locations'] == "external_link") {
				$event_link = isset($data['event_link']) ? ($data['event_link']) : ('');
			} else {
				$event_link = '';
			}
		}

		$values = array(
			'cover_photo' => $covername,
			'user_id' => Auth::id(),
			'create_event' =>  isset($data['create_event']) ? ($data['create_event']) : (''),
			'event_type' =>  isset($data['event_type']) ? ($data['event_type']) : (''),
			'event_name' => isset($data['event_name']) ? ($data['event_name']) : (''),
			'start_date' => isset($data['start_date']) ? ($data['start_date']) : (''),
			'start_time' => isset($data['start_time']) ? ($data['start_time']) : (''),
			'end_date' => isset($data['end_date']) ? ($data['end_date']) : (''),
			'end_time' => isset($data['end_time']) ? ($data['end_time']) : (''),
			'privacy' => isset($data['privacy']) ? ($data['privacy']) : (''),
			'locations' => isset($data['locations']) ? ($data['locations']) : (''),
			'event_link' => $event_link,
			'description' => isset($data['description']) ? ($data['description']) : (''),
			'co_host' => isset($data['co_host']) ? ($data['co_host']) : (''),
			'show_guest_list' => isset($data['show_guest_list']) ? ($data['show_guest_list']) : (0),
			'guest_invite' => $guest_invite,
			'admin_add_post' => isset($data['admin_add_post']) ? ($data['admin_add_post']) : (0),
			'post_approve' => isset($data['post_approve']) ? ($data['post_approve']) : (0),
		);

		$data = DB::table('msu_events')
			->update($values);

		return redirect('events')->with(['success' => 'Event created Successfully']);
	
 
 	}

	public function eventLikeDislikePost(Request $request)
	{	
		$authid = Auth::id();
		// get the like status from db
		$like = DB::table('msu_like_dislike_events')
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

			$aa = DB::table('msu_like_dislike_events')
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

			$val = DB::table('msu_like_dislike_events')
				->insert($values);
			// dd($val);
		}

		$like = DB::table('msu_like_dislike_events')
			->where(['post_id' => $request->post_id, 'like_dislike' => 1])
			->count();

		$dislikes = DB::table('msu_like_dislike_events')
			->where(['post_id' => $request->post_id, 'like_dislike' => 2])
			->count();

		$values = array('likes' => $like, 'dislikes' => $dislikes);
		$val = DB::table('msu_event_posts')
			->where(['id' => $request->post_id])
			->update($values);

		$user_id = DB::table('msu_event_posts')
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

		return response()->json(array('success' => true), 200);
	}




}

