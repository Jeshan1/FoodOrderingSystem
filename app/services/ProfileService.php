<?php

namespace App\services;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileService
{

    public function profileById()
    {
        if (auth()->check()) {
            $profile = auth()->user();
        }
        return $profile;
    }

    public function updateVendor($request,$id)
    {
        try {
            $data = [
                "brand_name"=>$request->brand_name,
                "service"=>$request->service,
            ];
            $vendor = Vendor::find($id);
            if ($request->hasfile('logo')) {
                $FilenameWithExtension = $request['logo']->getClientOriginalName();
                $Filename = pathinfo($FilenameWithExtension,PATHINFO_FILENAME);
                $Extension = $request['logo']->getClientOriginalExtension();
                $FileToStore = $Filename.'_'.time().'.'.$Extension;
                $path = $request['logo']->storeAs('/public/vendors/logo',$FileToStore);
                $data['logo'] = $FileToStore;

                Storage::delete('public/vendors/logo/'.$vendor->logo);
            }

              if ($request->hasfile('image_cover')) {
                $FilenameWithExtension = $request['image_cover']->getClientOriginalName();
                $Filename = pathinfo($FilenameWithExtension,PATHINFO_FILENAME);
                $Extension = $request['image_cover']->getClientOriginalExtension();
                $FileToStore = $Filename.'_'.time().'.'.$Extension;
                $path = $request['image_cover']->storeAs('/public/vendors/cover_image',$FileToStore);
                $data['image_cover'] = $FileToStore;
                Storage::delete('public/vendors/cover_image/'.$vendor->image_cover);
            }
            Vendor::where('id',$id)->update($data);

            $response =  [
                "status"=>"success",
                "message" => "Vendor Information Succesfully Updated!"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status" => "errof",
                "message" => $e->getMessage()
            ];
        }
        return $response;
    }
}

?>