<?php

namespace App\services;
use App\Http\Controllers\OrderController;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Helper\EmailHelper;
use Illuminate\Support\Facades\Auth;

class OrderService
{
   public function getAdminPendingOrders()
   {
        $orders = Cart::where(["status"=>"pending","has_checkout"=>1])->get();
        return $orders;
   }

   public function getAdiminPendingItem($cartId)
   {
        $orderItems = CartItem::where('cart_id',$cartId)->get();
        foreach ($orderItems as $key => $item) {
               $product = $item->product;
               $productInfo = [
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'quantity'=>$item->quantity,
                    'total'=>$product->price * $item->quantity
               ];

               $brandName = $product->user->vendor->brand_name;
               $data[$brandName][] = $productInfo;

        }
        return $data;
        
   }

   public function cartStatusChange($inputs)
    {
        // dd($inputs['cart_id']);
        try{
            $cart=Cart::find($inputs['cart_id']);
            $cart->status=$inputs['status'];
            if($cart->status === "cancel"){
              Cart::where('id',$inputs['cart_id'])->delete();
            }
            $cart->save();

            if($cart->status != 'pending')
            {
                $data = [
                "name"=>$cart->user->name,
                "email"=>$cart->user->email,
                "cart"=>$cart,
                "subject"=>"Item".$cart->status
            ];
            }
            EmailHelper::sendCustomerEmail($data);
            $response=[
                'message'=>'Status Updated successfully',
                'status'=>'success',
            ];
            
        }catch(\Throwable $e)
        {
            $response=[
                'message'=>$e->getMessage(),
                'status'=>'error',
            ];
        }
        return $response;
        
    }

    //for get processed orders

    public function getApproveCarts()
    {
        $approvedOrders = Cart::where(["status"=>"processed","has_checkout"=>1])->orderBy('created_at','DESC')->get();
        return $approvedOrders;
    }
    
    // for delete approved orders 

    public function deleteApprovedOrders($id)
    {
        try {
            Cart::where('id',$id)->delete();
            $response = [
                "status"=>"success",
                "message"=>"Order Deleted Successfully"
            ];
        } catch (\Throwable $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage()
            ];
        }
        return $response;
    }

   // for order list shown in specific vendor

   public function getVendorOrders()
   {
     
            $content=[];
            $user_id=Auth::id();
            // dd($user_id);
            $data=Cart::whereIn('status',['pending','processed'])->where('has_checkout',1)->orderBy('updated_at','DESC')->get();
        
            // dd($data);
            foreach ($data as $item) {
                $cartItems=$item->CartItem;
                //dd($cartItems);
                foreach ($cartItems as $cartItem) {
                    $u_id=$cartItem->product->user_id;
                    // dd($u_id);
                    if($user_id==$u_id)
                        {
                            $content[]=$item;
                            break;
                        }
                }
                
            }

            return $content;
   }

   public function getVendorOrderItems($cartId)
   {
            $content=[];
            $user_id = Auth::id();
            $data = CartItem::where('cart_id',$cartId)->get();
            foreach ($data as $item) {
                $product=$item->product;
                $u_id=$product->user_id;
                if($user_id == $u_id)
                {
                    $productInfo=[
                        'name'=>$product->name,
                        'price'=>$product->price,
                        'quantity'=>$item->quantity,
                        'total'=>$product->price * $item->quantity
                    ];
                    $content[]=$productInfo;
                    
                }
                
            }
            return $content;
   }





   

}


?>