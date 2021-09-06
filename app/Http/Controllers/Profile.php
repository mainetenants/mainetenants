<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;


class Profile extends Controller
{
    public function index()
    {
        return view('profile');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required',
        ]);

       $file_name = time().'.'.request()->file->getClientOriginalExtension();
       $request->file->move(public_path('uploads'), $file_name);
 
       $file = new StudentProfile;
       $file->file_name = $file_name;
       $file->save();
  
       return response()->json(['success'=>'File uploaded successfully.']);
    }
}
