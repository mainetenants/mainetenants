<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use UserWorkEducation;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $users = DB::table('users')
        ->where('id', $id)
        ->first();
        $basicInfo = DB::table('user_info')
        ->leftJoin('users', 'user_info.user_id', '=', 'users.id')
        ->where('user_id', Auth::id())
        ->first();

        $educationInfo = DB::table('msu_user_work_education')
        ->leftJoin('users', 'msu_user_work_education.user_id', '=', 'users.id')
        ->where('user_id', Auth::id())
        ->first();
       //dd($educationInfo);
        $interestInfos = DB::table('msu_interest')
        ->leftJoin('users', 'msu_interest.user_id', '=', 'users.id')
        ->select('msu_interest.interest')
        ->where('user_id', Auth::id())
        ->get();

        return view('about', compact('users', 'basicInfo', 'educationInfo', 'interestInfos'));
        
        // return view('about', ['profile_photo' => $users->profile_photo, 'cover_photo' => $users->cover_photo, 
        // 'basicInfo' => $users,
        // 'basicInfo'=> $basicInfo,
        // 'studyat' => $educationInfo->studyat,
        // 'description' => $educationInfo->description,
        // 'fromdate' => $educationInfo->fromdate,
        // 'todate' => $educationInfo->todate,
        // 'city' => $educationInfo->city,
        // 'todate' => $educationInfo->todate,
        // 'masters' => $educationInfo->masters,
        // 'graduate' => $educationInfo->graduate,
        // 'interestInfos' => $interestInfos,

   // ]);
    }


 
    public function profile_photo(Request $request)
    {
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
    
                
            return back();
    }

    public function cover_photo(Request $request)
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
            DB::table('users')
            ->where('id', $id)
            ->update([
                'cover_photo' => $covername
                ]);
            return back();
    }
}