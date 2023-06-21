<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\services\CartService;
use App\services\ProductService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    private $productService,$cartService;
    public function __construct(ProductService $productService,CartService $cartService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }
    public function addToCart(Request $request,$product_id)
    {
        $product = $this->productService->findById($product_id);
        if (!empty($product)) {
            $response = $this->cartService->handleAddToCart($product,$request);
        }
        else{
            $response = [
                "status"=>"error",
                "message"=>"Product can not added to cart!",
                "status code"=>422
            ];
        }
        return response()->json($response,$response['status code']);
    }

    public function cartCheckout(Request $request)
    {
        $inputs = $request->all();
        $response = $this->cartService->checkoutCart($inputs);
        // dd($response["message"]);
        Alert::toast($response["message"],$response["status"]);
        return redirect()->back();        
    }
}
