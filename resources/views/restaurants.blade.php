@extends('layouts.app',["key"=>$key ?? ''])

@section('content')
    <div class="container-md">
        <div class="my-5 px-2">
            <h1 class="" style="font-size: 20px;font-weight: bolder;">Featured Restaurants</h1>
        </div>
    </div>

  <div class="container-md">
    <div class="row">
      @if (!empty($vendors) && count($vendors) > 0)
          @foreach ($vendors as $vendor)
        <div class="col-md-4">
          <a href="{{route('showrestaurant',$vendor->id)}}" class="text-decoration-none">
            <div class="card mx-2 my-2">
            <img src="{{asset("storage/vendors/cover_image/".$vendor->image_cover)}}" class="card-img-top w-100"
            alt="Hollywood Sign on The Hill" height="200" />
            <div>
              <img src="{{asset("storage/vendors/logo/".$vendor->logo)}}" style="margin-top:-210px; margin-left:10px;" class="card-img-top w-25 rounded-circle" alt="">
            </div>
              <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="" style="font-size: 16px;">{{$vendor->brand_name}}</p>
                    <p class="" style="font-size: 16px;">{{$vendor->is_active==1?"Active":"Inactive"}}</p>
                  </div>
              </div>
          </div>
          
          </a>
        </div>
      @endforeach
      @else
      <div class="mx-2 my-5">
        <h1 class="" style="font-size: 20px;font-weight: bolder;color: rgb(245, 33, 33);">Serch Item Not Found !</h1>
      </div>
      @endif

    </div>
  </div>
@endsection