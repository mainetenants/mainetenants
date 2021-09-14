<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $users = DB::table('users')
        ->where('id', $id)
        ->first();
        //echo '<pre>';  print_r($users->cover_photo);die;
        return view('about', ['profile_photo' => $users->profile_photo, 
        'cover_photo' => $users->cover_photo]);
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