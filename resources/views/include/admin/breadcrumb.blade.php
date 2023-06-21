<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: rgb(15, 131, 225); font-size: 20px; font-weight: bolder; cursor: pointer;">{{array_key_last($breadcrumb)}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @foreach ($breadcrumb as $key=>$value)
                <li class="breadcrumb-item"><a href="{{$value}}">{{$key}}</a></li>
            @endforeach
            {{-- <li class="breadcrumb-item active">Create Slider</li> --}}
          </ol>
        </div>
      </div>
    </div>
  </div>