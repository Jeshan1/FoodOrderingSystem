<?php

namespace App\services;
use App\Models\User;
use App\Models\Vendor;

class VendorService 
{
    public function pendingVendor(){
        $pendingVendors = User::doesntHave('vendor')->where('is_vendor',1)->orderBy('created_at','DESC')->get();
        return $pendingVendors;               
    }

    public function findAllApproveVendor(){
        $approvedvendors = User::has('vendor')->where('is_vendor',1)->orderBy('created_at','DESC')->get();
        return $approvedvendors;
    }
    public function approveVendor($id){
        try {
            $user = User::find($id);
            $data = [
                "brand_name" => $user->username,
                "service" => 'na',
                "logo" => 'na',
                "image_cover" => 'na',
                "user_id" => $id,
                "is_active" => 1
            ];
            Vendor::create($data);
            $user->role_id = 2;      //role_id = 2
            $user->save();
            $response = [
                "status"=>"success",
                "message"=>"Vendor is approved"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status"=>"error",
                "message"=>$e->getMessage()
            ];
        }
        return $response;
    }

    public function rejectVendor($id){
        try {
            User::where('id',$id)->update(['is_vendor' => 0,'role_id'=>3]);
            //send email to user
            $response = [
                "status" => "success",
                "message" => "Vendor is rejected"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status" => "success",
                "message" => $e->getMessage()
            ];
        }
        return $response;
    }

    public function deleteApprovedVendor($id){
        try {
            User::has('vendor')->where('id',$id)->delete();
            $response = [
                "status" => "success",
                "message" => "Vendors Data Deleted!"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage()
            ];
        }
        return $response;
    }

    public function checkstatusvendor($id)
    {
        try {
            $vendor = Vendor::find($id);
            if ($vendor->is_active == 1) {
                $vendor->is_active=0;
                $vendor->save();
            }
            else{
                $vendor->is_active=1;
                $vendor->save();
            }
            $response = [
                "status" => "success",
                "message" => "Vendor Status modified!"
            ];
            
        } catch (\Throwable $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage()
            ];
        }
        return $response;
        
    }

    public function showVendorById($id)
    {
        try {
           return Vendor::find($id);
        } catch (\Throwable $th) {
            
        }
    }

    public function searchVendor($inputs)
    {
        // $restaurants = User::with('vendor:brand_name,service','product:name,status');
        // $restaurants = $restaurants->whereHas('vendor',function($q) use($inputs){
        //     $q->where('brand_name','LIKE','%'.$inputs['search'].'%')
        //     ->orWhere('service','LIKE','%'.$inputs['search'].'%');
        // })
        // ->orWhereHas('product',function($q) use($inputs){
        //     $q->where('name','LIKE','%'.$inputs['search'].'%')
        //     ->where('status','Available');
        // })
        // ->join('vendors','users.id','vendors.user_id')
        // ->selectRaw('vendors.*')
        // ->orderBy('created_at','DESC')
        // ->get();

        // return $restaurants;

        $restaurants = Vendor::with('user.product:name,status')
        ->where(function($q) use($inputs){
            $q->where('brand_name','LIKE','%'.$inputs['search'].'%')
            ->orWhere('service','LIKE','%'.$inputs['search'].'%');
        })
        ->orWhereHas('user.product',function($q) use($inputs){
            $q->where('name','LIKE','%'.$inputs['search'].'%')
            ->where('status','Available');
        })
        ->orderBy('created_at','DESC')
        ->get();

        return $restaurants;
    }

}






?>