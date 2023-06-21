<?php

namespace App\services;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use App\Helper\EmailHelper;
use Illuminate\Support\Facades\DB;




class CartService
{
    public function handleAddToCart($product,$request)
    {
        try {
            $cart = Cart::firstOrCreate(
                [
                    'user_id'=>Auth::id(),
                    'has_checkout'=>0

                ]
            );
            $cart->price += $product->price;
            $cart->save();

            $cart_item = CartItem::updateOrCreate(
                [
                    'cart_id'=>$cart->id,
                    'product_id'=>$product->id,
                ]
                );


            $cart_item->quantity += $request->Quantity;
            $cart_item->save();

            $count = $this->getCartCount($cart->id);
            
            $response = [
                "status"=>"success",
                "message"=>"Added to Cart",
                "item_count"=>$count,
                "status code"=>200
            ];
        } catch (\Throwable $e) {
            $response = [
                "status"=>"error",
                "message"=>$e->getMessage(),
                "item_count"=>0,
                "status code"=>500
            ];
        }

        return $response;

    }

    public function getCartCount($cart_id)
    {
        return CartItem::where('cart_id',$cart_id)->count();
    }

    public function getUsersCart($user_id)
    {
        return Cart::where('user_id',$user_id)
            ->where('has_checkout',0)
            ->orderBy('updated_at','DESC')
            ->pluck('id')
            ->first();
    }

    public function getCartItem($cart_id)
    {
        return CartItem::where('cart_id',$cart_id)->get();
    }

    public function checkoutCart($inputs)
    {
        try {
          
            $cart = Cart::where('id',$inputs['cart_id'])->first();
            $cart->has_checkout = 1;
            $orderId = $cart->id.'-'.date('Y-m-d');
            $cart->shipping_address = $inputs['shipping_address'];
            $cart->order_id = $orderId;
            $cart->save();

            $data = [
                "name"=>Auth::user()->username,
                "email"=>Auth::user()->email,
                "cart"=>$cart,
                "subject"=>"Item CheckOut"
            ];

            $deliveryInfo = [
                "name"=>Auth::user()->username,
                "phone"=>Auth::user()->userDetails->phone,
                "shipping_address"=>$cart->shipping_address
            ];

            $vendorContent = $this->formatVendorContent($cart);
            // dd($vendorContent,$deliveryInfo);
            $subject = "New Order Notification!";
            EmailHelper::sendVendorEmail($vendorContent,$deliveryInfo,$subject);
            EmailHelper::sendEmail($data);
            $response = [
                "status" => "success",
                "message" => "Cart has been checked Out!"
            ];
            
        } catch (\Throwable $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage()
            ];
        }
        return $response;
    }

    public function formatVendorContent($cart)
    {
         foreach ($cart->cartItem as $item) {
                $product = $item->product;
                $productData = [
                "name"=>$product->name,
                "price"=>$product->price,
                "quantity"=>$item->quantity
                ];
                
                $userEmail = $product->user->email;
                $vendorContent[$userEmail][] = $productData;
                // array_push($datas[$userid],$productData);
            }
            return $vendorContent;
    }

}











?>