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
        return view('about');
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
            
        }  //dd($imagename);
            $values = array('images' => $imagename);
            DB::table('users')
            ->where('id', $id)
            ->update([
                'profile_photo' => $imagename
                ]);
            return back();
    }
}