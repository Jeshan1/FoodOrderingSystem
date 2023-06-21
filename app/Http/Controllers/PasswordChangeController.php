<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\services\ChangePassword;
use App\Http\Requests\ChangePasswordRequest;

class PasswordChangeController extends Controller
{
    private $passwordChange;
    public function __construct(changePassword $passwordChange){
        $this->passwordChange = $passwordChange;
    }

    // for customer
    public function changePassword()
    {
        return view('pages.Password.passchange');
    }

    
    public function updatePassword(ChangePasswordRequest $request)
    {
        $response = $this->passwordChange->ChangePassword($request);
        Alert::toast($response["message"],$response["status"]);
        return redirect()->route('customerdetail');
        
    }
    
    // for admin and vendor 
    public function ChangePasswords()
    {
        return view('include.admin.password.passchange');
    }

    public function UpdatePasswords(ChangePasswordRequest $request)
    {
        $response = $this->passwordChange->ChangePassword($request);
        Alert::toast($response["message"],$response["status"]);
        if (Auth::user()->role->role == "admin") {
            return redirect()->route('admin.profile');
            // return redirect()->back();
        }
        
        if (Auth::user()->role->role == "vendor") {
            return redirect()->route('vendor.profile');
            // return redirect()->back();   
        }
            
        
  
    }
}