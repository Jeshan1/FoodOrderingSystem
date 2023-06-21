<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\services\OrderService;
use App\services\ProductService;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    private $pendingOrder;
    public function __construct(OrderService $pendingOrder)
    {
        $this->pendingOrder = $pendingOrder;
    }

    public function getAdminPendingOrder()
    {
        $pendingOrders = $this->pendingOrder->getAdminPendingOrders();
        return view('pages.order.pendingorder',compact('pendingOrders'));
    }

    public function getAdiminPendingItem($cartId)
    {
        $pendingItems = $this->pendingOrder->getAdiminPendingItem($cartId);
        return $pendingItems;
    }

    public function updateOrderStatus(Request $request)
    {
        $inputs=$request->all();
        $response=$this->pendingOrder->cartStatusChange($inputs);
        if($response['status']=='success')
        {
            
            Alert::success($response['status'], $response['message']);
        }
        else
        {
            Alert::error($response['status'], $response['message']);
            
        }
        return redirect()->back();

    }

    // for getting approved cart

    public function getApproveCart()
    {
        $approvedOrders = $this->pendingOrder->getApproveCarts();
        return view('pages.order.approvedorder',compact('approvedOrders'));

    }

    // for delete approved cart
    public function destroyApprovedOrder($id)
    {
        $response = $this->pendingOrder->deleteApprovedOrders($id);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('order.approve'));
    }

    // for vendor
    public function getOrders()
    {
        $orderItems = $this->pendingOrder->getVendorOrders();
        return view('pages.vendors.order.orderlist',compact('orderItems'));
    }

    public function getVendorOrderItem($cartId)
    {
        $orderVendorList = $this->pendingOrder->getVendorOrderItems($cartId) ;
        return $orderVendorList;
    }
}
