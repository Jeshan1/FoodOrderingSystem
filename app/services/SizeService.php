<?php

namespace App\services;
use App\Models\Size;

class SizeService 
{
    public function findAll(){
        return Size::all();
    }

    public function addAll($request)
    {
        try {
            $size = [
                'name'=>$request['name'],   
            ];

            Size::create($size);

            $response = [
                "status" => "success",
                "message" => "Size is created !"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status" => "error",
                "message"=> $e->getMessage(),          
            ];
        }

        return $response;
    }

    public function findById($id){
        return Size::find($id);
    }

    public function updateSize($request,$id){
        try {
            $size = [
                "name"=>$request->name,
            ];

            Size::where('id',$id)->update($size);
            $response = [
                "status" => "success",
                "message" => "Size is updated !"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
        }
        return $response;
    }

    public function deleteSize($id){
        try {
            Size::where('id',$id)->delete();
            $response = [
                "status" => "success",
                "message" => "Size is deleted"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
        }
        return $response;
    }
}


?>