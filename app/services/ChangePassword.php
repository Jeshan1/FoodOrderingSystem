<?php

namespace App\services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChangePassword
{
    public function changePassword($request)
    {
        try {
        $data = $request->all(); 
        $user = Auth::user();
        $user->password = Hash::make($data['new_password']);
        $user->save();
        $response = [
                "status"=>"success",
                "message"=>"Password Changed Successfully!"
            ];
        
        } catch (\Throwable $e) {
            $response = [
                "status"=>"error",
                "message"=>$e->getMessage()
            ];
    
        }
        return $response;
    }
}

 // if request is not used below code require to validate inside service
 // $data = $request->validate(
        //     [
        //         'current_password'=>['required',
        //             function($attribute,$value,$fail){
        //                 if (!Hash::check($value, Auth::user()->password)) {
        //                     $fail("Current Password is incorrect.");
        //                 }
        //             }
        //         ],
        //         'new_password'=>'required|string|min:8|confirmed'
        //     ]
        // ); 


?>