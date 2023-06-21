<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\services\ProductService;
use App\services\SizeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    private $sizeService,$productService;
    public function __construct(SizeService $size,ProductService $productService)
    {
        $this->sizeService = $size;
        $this->productService = $productService;
    }

    public function index()
    {   $products = $this->productService->findAllProduct(Auth::user()->id);
        return view('pages.vendorclient.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sizes = $this->sizeService->findAll();
        return view('pages.vendorclient.product.create',compact('sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = $this->productService->addProduct($request);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('product.index'));
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
        $sizes = $this->sizeService->findAll();
        $product = $this->productService->findById($id);
        return view('pages.vendorclient.product.update',compact('sizes','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = $this->productService->updateProduct($request,$id);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->productService->deleteProduct($id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('product.index'));
    }
}
