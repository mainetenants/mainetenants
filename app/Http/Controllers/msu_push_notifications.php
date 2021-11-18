<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class msu_push_notifications extends Controller
{
    
    public function saveToken(Request $request)
    {   
        $data =$request->all();
        $user_id = Auth::id();
        USER::where(['id'=>$user_id])->update(['device_token'=>$data['token']]);
        return response()->json(['token saved successfully.']);
    }
    
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $SERVER_API_KEY ='AAAA1OCy3lM:APA91bGSy5Gckj-IQg8Hcg0gid3ecqSGD-3dYq5oEjMw4V4_-9cIcc44OOqwPOBR4IWWeeEBXLKzMPEgSEELJuBuUv-7_B3on9_kgzEr-sWYbDvc31gBlm73YwzOYibDKG1iuT2nF5LN';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        dd($response);
    }
    public function update_user_settings(Request $request){
        $user_id = Auth::id();
        $data = $request->all();
        
        User::where(['id'=>$user_id])->update([$data['value']=>$data['response']]);
        return response()->json(array('status'=>1,'status_res'=>"Successfully updated"));
    }
}
