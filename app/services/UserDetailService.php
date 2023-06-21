<?php

namespace App\services;

use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class UserDetailService
{
    public function findUserDetail($userid)
    {
        return UserDetail::where("user_id",$userid)->get();
    }

    public function addUserDetail($request)
    {
        try {
            $data = [
                "address"=>$request->address,
                "phone"=>$request->phone,
                "user_id"=>Auth::user()->id
            ];

            UserDetail::create($data);
             $response = [
                "status"=>"success",
                "message"=>"Your Detail Added Successfully!"
            ];
        } catch (\Throwable $e) {

            $response = [
                "status"=>"error",
                "message"=>$e->getMessage()
            ];
        }
        return $response;
    }

    public function findUserById($id)
    {
        return UserDetail::find($id);
    }

    public function updateUserDetail($request,$id)
    {
        try {
             $data = [
                "address"=>$request->address,
                "phone"=>$request->phone,
                ];

            UserDetail::where("id",$id)->update($data);
            $response = [
                "status"=>"success",
                "message"=>"Your Detail Updated Successfully!",
            ];
        } catch (\Throwable $e) {
           $response = [
                "status"=>"error",
                "message"=>$e->getMessage()
            ];
        }
        return $response;
    }

    public function deleteById($id)
    {
        try {
            UserDetail::where('id',$id)->delete();
            $response = [
                "status"=>"success",
                "message"=>"Your Detail Deleted Successfully!"
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



















?>