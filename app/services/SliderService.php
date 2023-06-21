<?php

namespace App\services;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderService 
{
    public function addSlider($request)
    {
        try {
            if ($request->hasFile('slider_image')) 
        {
            $FilenameWithExtension = $request['slider_image']->getClientOriginalName();
            $Filename = pathinfo($FilenameWithExtension,PATHINFO_FILENAME);
            $Extension = $request['slider_image']->getClientOriginalExtension();
            $FileToStore = $Filename.'_'.time().'.'.$Extension;
            $path = $request['slider_image']->storeAs('public/slider/'.$FileToStore);
        } 

        else 
        {
            $FileToStore = 'no_image.jpg';
        }

        $slider = [
            'slider_text' => $request["slider_text"],
            'slider_image' => $FileToStore
        ];

        Slider::create($slider);
        $response = [
            "status"=> "success",
            "message" => "Data created successfully"
        ];
        } catch (\Throwable $e) {
            $response = [
                "status"=> "error",
                "message" => $e->getMessage()
            ];
        }
        return $response;
    }

    public function findAll()
    {
        return Slider::all();
    }

    public function findByID($id)
    {
        return Slider::find($id);
    }

    public function updateSlider($request,$id)
    {
        try {

            $slider = [
                "slider_text" => $request->slider_text,
            ];

            if ($request->hasFile('slider_image')) 
            {
                $FilenameWithExtension = $request['slider_image']->getClientOriginalName();
                $Filename = pathinfo($FilenameWithExtension,PATHINFO_FILENAME);
                $Extension = $request['slider_image']->getClientOriginalExtension();
                $FileToStore = $Filename.'_'.time().'.'.$Extension;
                $path = $request['slider_image']->storeAs('/public/slider',$FileToStore);
                $slider['slider_image'] = $FileToStore;
            } 

             Slider::where('id',$id)->update($slider);
                $response = [
                    'status'=>'success',
                    'message'=>"data updated successfully"
                ];

        }
        catch (\Throwable $e) 
        {
            $response = [
                'status'=>'error',
                'message'=> $e->getMessage()
            ]; 
        }

        return $response;
    }

    public function deleteRecord($id)
    {
        try {
            $slider =  $this->findByID($id);
            Storage::delete('public/slider/'.$slider->slider_image);
            Slider::where('id',$id)->delete();
            
            $response = [
                "status" => "success",
                "message" => "Data Deleted Successfully",
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