<?php

namespace App\services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function findAllProduct($userid)
    {
        return Product::where('user_id',$userid)->get();
    }

    public function findById($id)
    {
        return Product::find($id);
    }


    public function addProduct($request)
    {
        try {

            $product = [
                "name"=>$request->name,
                "price"=>$request->price,
                "status"=>$request->status,
                "size_id"=>$request->size_id,
                "user_id"=>Auth::user()->id
            ];

            Product::create($product);
            $response = [
                "status"=>"success",
                "message"=>"product Created Successfully"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status"=>"error",
                "message"=>$e->getMessage()
            ];
        }
        return $response;
    }

    public function updateProduct($request,$id){
        try {

            $product = [
                "name"=>$request->name,
                "price"=>$request->price,
                "status"=>$request->status,
                "size_id"=>$request->size_id,
                "user_id"=>Auth::user()->id
            ];

            Product::where("id",$id)->update($product);

             $response = [
                "status"=>"success",
                "message"=>"product Detail Updated Successfully"
           ];
        } catch (\Throwable $e) {
           $response = [
                "status"=>"error",
                "message"=>$e->getMessage()
           ];
        }
        return $response;
    }

    public function deleteProduct($id)
    {
        try {
            Product::where("id",$id)->delete();
            $response = [
                "status"=>"success",
                "message"=>"Product Deleted Successfully"
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