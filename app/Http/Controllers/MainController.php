<?php

namespace App\Http\Controllers;
use App\services\SliderService;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Vendor;
use App\services\UserDetailService;
use App\services\VendorService;
use App\services\CartService;
use App\services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\jobs\WriteFileJob;
use App\Models\CartItem;


class MainController extends Controller
{
    private $sliderService,$vendorService,$userDetail,$productService,$cartService;
    public function __construct(SliderService $slider,VendorService $vendorService,UserDetailService $userDetail,ProductService $productService,CartService $cartService)
    {
        $this->sliderService = $slider;
        $this->vendorService = $vendorService;
        $this->userDetail = $userDetail;
        $this->productService = $productService;
        $this->cartService = $cartService;
    }
    public function main(){
        $sliders = $this->sliderService->findAll();
        return view('main',compact('sliders'));
    }

    public function about(){
        
        return view('about');
    }

    public function showRestaurants()
    {
        $vendors = Vendor::Has("user")->where("is_active",1)->limit(6)->get();
        return view('restaurants',compact('vendors'));
    }

    public function showRestaurantById($id)
    {
        $userDetail = DB::table("user_details")->where("user_id",2)->get();
        $vendor =  $this->vendorService->showVendorById($id);
        $products = $this->productService->findAllProduct($vendor->user_id);
        $sizes = Size::has("products")->where("id",$id)->get();
        return view('showRestaurant',compact('vendor','products','userDetail','sizes'));
    }

    // public function dispatchJob()
    // {
    //     WriteFileJob::dispatch();
    // }

    public function getActiveCartItems()
    {
      
            $cart = $this->cartService->getUsersCart(auth()->user()->id);
            $cartitems = $this->cartService->getCartItem($cart);
            return view('CartList',compact('cartitems'));
    }

    public function deleteCartItem($id)
    {
        CartItem::where('id',$id)->delete(); 
        return back();
    }

    public function search(Request $request)
    {
        $inputs = $request->all();
        $vendors = $this->vendorService->searchVendor($inputs);
        $key = $inputs['search'];
        return view('restaurants',compact('vendors','key'));

    }
}
