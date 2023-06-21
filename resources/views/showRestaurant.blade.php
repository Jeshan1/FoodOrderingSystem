@extends('layouts.app')

@section("content")
    <div class="">
        <div class="">
            <img src="{{asset("storage/vendors/cover_image/".$vendor->image_cover)}}" style="height:60vh;" class="w-100 " alt="" >
        </div>

        <div class="px-5 container-md">
           <div class="flex">
             <img src="{{asset("storage/vendors/logo/".$vendor->logo)}}" class="rounded-circle" style="margin-top:-450px; width:100px;" alt="">
             <div>
                <h1 style="margin-top:-280px; color: white; margin-left:120px;font-size: 30px;font-weight: bold;">{{$vendor->brand_name}}</h1>
                <p class="" style="font-size: 20px;font-weight: bold; color: white; margin-left:120px; margin-top: -10px;">Service: {{$vendor->service}}</p>
                
                <div class="d-flex justify-content-between">
                    <p class="fs-3 my-0 py-0" style="font-size: 20px;font-weight: bold; color: hsl(0, 0%, 100%); margin-left:120px;font-weight:bold;">Contact: 
                    {{$vendor->user->userDetails->phone}}
                
                </p>
                <p class="fs-3 my-0 py-0" style="font-size: 20px;font-weight: bold; color: #ffffff; margin-left:120px; font-weight: bold;">Address: 
                    {{$vendor->user->userDetails->address}}
                </p>
                </div>
               
             </div>
           </div>
        </div>
    </div>

    <div>
        <div class="container p-5">
            <h1 class="fw-bold" style="color: #282727;font-size: 20px;">Menu</h1>
{{-- 
            <input type="text" class="w-100 p-2 fs-3 rounded-4 text-primary" style="border-color:rgb(41, 41, 197);
            " placeholder="Search Products......"> --}}
            
       @if (!empty($products) && count($products) > 0)
            @foreach ($products as $product)
           <div class="card mt-3 container">
            <div class="card-body justify-content-between d-flex">
              <h2 class="mt-2" style="font-size: 16px;font-weight: bold;">{{$product->name}}</h2> 
              
             
                <div class="my-auto d-flex">
                @guest
                @else
                <div class="d-flex">
                    <label for="" class="me-4 mt-1" style="font-size: 16px;">Quantity</label>
                    <div class="input-group">
                        <span class="input-group-btn me-1">
                            <button type="button" onclick="incrementDecrementBtn({{$product->id}},'minus')"  class="btn text-white btn-number shadow" style="font-size: 12px; background-color:gray;border-radius: 50%;" >
                                <i class="fa fa-minus"></i>
                            </button>
                        </span>
                        <input type="text" id="Quantity{{$product->id}}"  class="form-control input-number" height="10" width="20" value="1" min="1" max="100">
                        <span class="input-group-btn ms-1">
                            <button type="button" onclick="incrementDecrementBtn({{$product->id}},'plus')" class="btn text-white btn-number shadow" style="font-size: 12px; background-color:gray;border-radius: 50%;">
                                <i class="fa fa-plus" ></i>
                            </button>
                        </span>
                    </div>
                     {{-- <input type="number" > --}}
                </div>
                @endguest
                <h3 class="my-auto ms-4" style="font-size: 16px;">{{$product->price}} {{$product->size->name}}</h3>
                @guest
                @else
                <a onclick="addToCart({{$product->id}})" class="btn cursor-pointer text-decoration-none ms-4">
                    <i class="fas fa-shopping-cart fw-bold" style="color: rgb(10, 10, 10); font-size: 16px;"></i>
                </a>
                <input type="hidden" id="accessToken" value="{{Session::get('token')}}">
                @endguest
                
                </div>
               
            </div>
          </div>
        @endforeach
       @endif

           
        </div>
    </div>
    
@endsection

@section('client_js')
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <script src="{{asset('js/Cart.js')}}"></script>
    {{-- <script src="{{asset("plugins/sweetalert2/sweetalert2.min.js")}}"></script> --}}
@endsection