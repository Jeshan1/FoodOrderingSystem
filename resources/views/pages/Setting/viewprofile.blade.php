@extends('layouts.adminlayout')

@section('dashboard-content')

    @php
      $breadcrumb = ["Dashboard"=>route('dashboard'),"Profile"=>"#"];
    @endphp
    @include('include.admin.breadcrumb',["breadcrumb"=>$breadcrumb]) 

    {{-- view profile --}}
    <div class="container">
        <div class="mx-5 my-2">
            <div class="border shadow px-5 py-5" style="border-radius: 10px;">
                <h1 style="color: rgb(38, 37, 37); font-size: 20px; font-weight: bolder;">User Info !</h1>
                <div>
                    {{-- <p>User Name : <span>{{$profile->username}}</span></p> --}}
                    <label for="" class="border bg-white w-50 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
                        User Name : 
                        <input type="text" value="{{$profile->username}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;" class="disabled border-0" disabled>
                    </label>

                    <label for="" class="border bg-white w-50 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
                        User Email : 
                        <input type="text" value="{{$profile->email}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;" class="disabled border-0" disabled>
                    </label>

                    <label for="" class="border bg-white w-50 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
                        User Role : 
                        <input type="text" value="{{$profile->role->role}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;" class="disabled border-0" disabled>
                    </label>

                    <label for="" class="border bg-white w-50 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
                        User Phone : 
                        <input type="text" value="{{$profile->userDetails->phone}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;" class="disabled border-0" disabled>
                    </label>

                    <label for="" class="border bg-white w-50 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
                        User Address : 
                        <input type="text" value="{{$profile->userDetails->address}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;" class="disabled border-0" disabled>
                    </label>

                    @if (auth()->check() && auth()->user()->role->role == "vendor")
                        <label for="" class="border bg-white w-50 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
                            User Status : 
                            <input type="text" value="{{$profile->vendor->is_active ===1 ? 'Active':'Inactive'}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;" class="disabled border-0" disabled>
                        </label>   
                    @endif
                    <div class="my-4">
                        <p class="" style="font-weight: bolder;font-size: 16px; color: rgb(151, 147, 147);">If you want to change your password click here !</p>
                        <a href="{{$profile->role->role == "admin" ? route('admin.password.change') : route('vendor.password.change') }}" class="btn btn-primary px-4 py-2 fs-5 fw-bold" style="border-radius: 10px;">Change Your Password</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- update vendor data  --}}

    @if ($profile->role->role == "vendor")
        <div class="container">
        <div class="mx-5 my-4">
            <div class="border shadow px-5 py-5" style="border-radius: 10px;">
                <h1 style="color: rgb(38, 37, 37); font-size: 20px; font-weight: bolder;">Edit Your Vendor Info</h1>
                @include('pages.Setting.editvendor',['vendorData'=>$profile->vendor])
            </div>
        </div>
        </div>
    @endif
@endsection

{{-- <div class="border border-success p-3">
                <p class="fs-2 fw-bold text-primary">User Name : <span>{{$profile->username}}</span></p>
                <p class="fs-2 fw-bold text-primary">Email : <span>{{$profile->email}}</span> </p>
                <p class="fs-2 fw-bold text-primary">Role :  <span>{{$profile->role->role}}</span> </p>
                @if (auth()->check() && auth()->user()->role->role == "vendor")
                    <p class="fs-2 fw-bold text-primary">Status : <span>{{$profile->vendor->is_active == 1? 'Active':'Inactive'}}</span> </p>
                @endif
            </div> --}}