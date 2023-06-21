<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\services\SizeService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SizeController extends Controller
{
    private $sizeService;

    public function __construct(SizeService $size)
    {
        $this->sizeService = $size;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = $this->sizeService->findAll();
        return view('pages.productsize.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.productsize.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $response = $this->sizeService->addAll($request);
       Alert::toast($response['message'],$response['status']);
       return redirect(route('size.index'))->with($response['status'],$response['message']);
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
        $size = $this->sizeService->findById($id);
        return view('pages.productsize.update',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = $this->sizeService->updateSize($request,$id);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('size.index'))->with($response['status'],$response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->sizeService->deleteSize($id);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('size.index'))->with($response['status'],$response['message']);
    }
}
