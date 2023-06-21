<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\services\SliderService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $sliderService;

    public function __construct(SliderService $slider)
    {
        $this->sliderService = $slider;
    }


 
    public function index()
    {
        $sliders = $this->sliderService->findAll();
        return view('pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.slider.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $response = $this->sliderService->addSlider($request);
        Alert::toast($response['message'],$response['status']);

        return redirect(route('slider.index'))->with($response['status'],$response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = $this->sliderService->findByID($id);
        return view('pages.slider.update',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $response = $this->sliderService->updateSlider($request,$id);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('slider.index'))->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $this->sliderService->deleteRecord($id);
       return back();     
    }
}
