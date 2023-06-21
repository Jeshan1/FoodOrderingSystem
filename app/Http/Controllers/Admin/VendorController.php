<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\services\VendorService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VendorController extends Controller
{
    private $vendorService;
    public function __construct(VendorService $service)
    {
        $this->vendorService = $service;
    }

    public function pendingvendor(){
       try {
        $pendingvendors =  $this->vendorService->pendingVendor();
        return view('pages.vendors.pendingvendors.index',compact('pendingvendors'));
       } catch (\Throwable $e) {
            Alert::toast($e->getMessage(),'error');
            return redirect(route('pendingvendor.index'));
       }
    }

    public function approvedvendors(){
        try {
         $approvedvendors =  $this->vendorService->findAllApproveVendor();
         return view('pages.vendors.approvevendors.index',compact('approvedvendors'));
        } catch (\Throwable $e) {
             Alert::toast($e->getMessage(),'error');
             return redirect(route('pendingvendor.index'));
        }
     }



    public function approvevendor($id){
        $response = $this->vendorService->approveVendor($id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('pendingvendor.index'));
    }

    public function rejectvendor($id){
        $response = $this->vendorService->rejectVendor($id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('pendingvendor.index'));
    }

    // delete approved vendor data

    public function deleteapprovedvendor($id){
        $response = $this->vendorService->deleteApprovedVendor($id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('approvedvendors.index'));
    }

    public function checkstatusvendor($id)
    {
        $response = $this->vendorService->checkstatusvendor($id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('approvedvendors.index'));
    }
}
