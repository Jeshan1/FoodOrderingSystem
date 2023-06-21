
<form action="{{route('vendor.update',$profile->vendor->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        @include('pages.Setting.form',['vendorData'=>$vendorData])
        {{-- @include('pages.productsize.form',['size'=>$size]) --}} 
                </div>
              

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
    </form>