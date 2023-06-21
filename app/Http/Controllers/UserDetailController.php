<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\services\UserDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserDetailController extends Controller
{
    private $userDetail;
    public function __construct(UserDetailService $userDetail)
    {
        $this->userDetail = $userDetail;
    }
    public function index()
    {
        $users = $this->userDetail->findUserDetail(Auth::user()->id);
        return view('pages.UserDetail.index',compact('users'));
    }

    public function create()
    {
        return view('pages.UserDetail.create');
    }

    public function store(Request $request)
    {
        $response = $this->userDetail->addUserDetail($request);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('vendor.userdetail.index'));
    }

    public function edit($id)
    {
        $user = $this->userDetail->findUserById($id);
        return view('pages.UserDetail.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $response = $this->userDetail->updateUserDetail($request,$id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('vendor.userdetail.index'));
    }

    public function delete($id)
    {
        $response = $this->userDetail->deleteById($id);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('vendor.userdetail.index'));
    }

    // for admin

    public function adminIndex()
    {
        $users = $this->userDetail->findUserDetail(Auth::user()->id);
        return view('pages.UserDetail.admin.index',compact('users'));
    }

    public function adminCreate()
    {
        return view('pages.UserDetail.admin.create');
    }

    public function adminStore(Request $request)
    {
        $response = $this->userDetail->addUserDetail($request);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('admin.userdetail.index'));
    }

    public function adminEdit($id)
    {
        $user = $this->userDetail->findUserById($id);
        return view('pages.userDetail.admin.edit',compact('user'));
    }

    public function adminUpdate(Request $request,$id)
    {
        $response = $this->userDetail->updateUserDetail($request,$id);
        Alert::toast($response["message"],$response["status"]);
        return redirect(route('admin.userdetail.index'));
    }

    public function adminDelete($id)
    {
        $response = $this->userDetail->deleteById($id);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('admin.userdetail.index'));
    }

    // for customer detail handle
    public function addCustomerDetail()
    {
        $customers = $this->userDetail->findUserDetail(Auth::user()->id);
        return view('pages.UserDetail.Customer.addDetail',compact('customers'));
    }

    public function storeCustomerDetail(Request $request)
    {
        $response = $this->userDetail->addUserDetail($request);
        Alert::toast($response['message'],$response['status']);
        return redirect(route('customerdetail'));
    }

    public function editDetail($id)
    {
        $getDetails = $this->userDetail->findUserByID($id);
        return response()->json($getDetails);
    }

    public function updateDetail(Request $request,$id)
    {
        $response = $this->userDetail->updateUserDetail($request,$id);
        Alert::toast($response["message"],$response["status"]);
        return response()->json($response);
    }

    public function deleteCustomerDetail($id)
    {
        $response = $this->userDetail->deleteById($id);
        Alert::toast($response['message'],$response['status']);
        return redirect()->back();
    }


}
