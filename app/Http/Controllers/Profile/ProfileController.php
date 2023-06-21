<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\services\ProfileService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    private $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    
    public function profile()
    {
        $profile = $this->profileService->profileById();
        return view('pages.Setting.viewprofile',compact('profile'));
    }

    public function updateVendor(Request $request,$id)
    {
        $response = $this->profileService->updateVendor($request,$id);
        Alert::toast($response['message'],$response['status']);
        return redirect()->back();
    }

    public function viewvendor()
    {
        $vendordata = auth()->user();
        return view('pages.Setting.viewvendor',compact('vendordata'));
    }

   
}
