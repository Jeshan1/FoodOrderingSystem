<?php

// this is autoload file
use App\Services\CartService;
use App\Models\User;

function getVendorApprovalStatus($id)
{
    $approvedVendor = User::doesntHave("vendor")->where("is_vendor",1)->where("id",$id)->first();
    if(!empty($approvedVendor)){
        return $is_approved = false;
    }
    else{
       return $is_approved = true;
    }
   
}

function getCartItemsCount()
{
    if (auth()->check()) {
        $obj = new CartService();
        $cart_id = $obj->getUsersCart(auth()->user()->id);
        $cart_items_count = $obj->getCartCount($cart_id);
    }
    else{
        $cart_items_count = 0;
    }
    return $cart_items_count;

}



?>