@extends('layouts.adminlayout')

@section('dashboard-content')

<style>
.main{
    background-color: rgb(130, 206, 227);
}
label{
    font-size: 30px;
}
</style>
    <div class="container m-5 p-5 main">
        <div class="top">
            <label class="">Brand Name</label>
            <p>{{$vendordata->vendor->brand_name}}</p>
        </div>
         <div>
            <label for="">Service</label>
            <p>{{$vendordata->vendor->service}}</p>
        </div>
         <div>
            <label for="">Status</label>
            <p>{{$vendordata->vendor->is_active == 1? 'Active':'Inactive'}}</p>
        </div>
         <div>
            <label for="">Logo</label>
            <div>
                <img src="{{asset('/storage/vendors/logo/'.$vendordata->vendor->logo)}}" alt="">
            </div>
        </div>
         <div>
            <label for="">Image Cover</label>
            <div>
                <img src="{{asset('/storage/vendors/cover_image/'.$vendordata->vendor->image_cover)}}" alt="">
            </div>
        </div>
    </div>
@endsection