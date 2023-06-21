
<label for="brand_name" class="border bg-white w-75 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
    Brand Name : 
    <input type="text" name="brand_name" id="brand_name" value="{{$vendorData->brand_name}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;outline: none;border-radius: 0px;width: 70%;" class="border px-2 py-2 ">
</label>

<label for="service" class="border bg-white w-75 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
    Service : 
    <input type="text" name="service" id="service" value="{{$vendorData->service}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;outline: none;border-radius: 0px;width: 70%;" class="border px-2 py-2 ">
</label>

<label for="logo" class="border bg-white w-75 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
    Logo : 
    <input type="file" name="logo" id="logo" value="{{$vendorData->logo}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;outline: none;border-radius: 0px;width: 70%;" class="border px-2 py-2 ">
</label>
<div class="my-2">
    <img src="{{asset('storage/vendors/logo/'.$vendorData->logo)}}" alt="">
</div>

<label for="image_cover" class="border bg-white w-75 px-2 py-2" style="font-size: 16px;color: rgb(151, 147, 147);border-radius: 0px;">
    Image Cover : 
    <input type="file" name="image_cover" id="image_cover" value="{{$vendorData->image_cover}}" style="color: rgb(79, 76, 76);font-size: 16px;font-weight: bold;outline: none;border-radius: 0px;width: 70%;" class="border px-2 py-2 ">
</label>
<div class="my-2">
    <img src="{{asset('storage/vendors/cover_image/'.$vendorData->image_cover)}}" alt="" class="w-25 h-25">
</div>



 {{-- old code  --}}
{{-- <div class="form-group" style="border-radius: 20px;">
    <label for="brand_name">Brand Name</label>
    <input type="text" name="brand_name" class="form-control" id="brand_name" value="{{$vendorData->brand_name}}">
</div> --}}

{{-- <div class="form-group">
    <label for="service">Service</label>
    <input type="text" name="service" class="form-control" id="service" value="{{$vendorData->service}}">
</div> --}}

{{-- <div class="form-group">
    <label for="logo" class="">Logo</label>
    <input type="file" name="logo" class="form-control" id="logo" value="{{$vendorData->logo}}">
    <div>
        <img src="{{asset('storage/vendors/logo/'.$vendorData->logo)}}" alt="">
    </div>
</div> --}}

{{-- <div class="form-group">
    <label for="image_cover">Image Cover</label>
    <input type="file" name="image_cover" class="form-control" id="image_cover" value="{{$vendorData->image_cover}}">
    <div>
        <img src="{{asset('storage/vendors/cover_image/'.$vendorData->image_cover)}}" alt="">
    </div>
</div> --}}










