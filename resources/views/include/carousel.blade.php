<div class="">
    <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
          @if (isset($sliders) && count($sliders) > 0)
          @foreach ($sliders as $key=>$item)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="{{$key==0?'active':''}}" aria-current="{{$key==0? true:false}}" aria-label="Slide {{$key + 1 }}"></button>
          @endforeach
            
          @endif
        </div>
        <div class="carousel-inner">
          @if (isset($sliders) && count($sliders) > 0)
          @foreach ($sliders as $key=>$slider)
          <div class="carousel-item {{$key==0?'active':''}}">
            <img src="{{asset('storage/slider/'.$slider->slider_image)}}" class="d-block w-100 " alt="..." style="max-height: 80vh;">
            <div class="carousel-caption d-none d-md-block mb-5 bg-white text-primary fw-bold" style="border-radius: 30px;">
              <p class="mb-0">{{$slider->slider_text}}</p>
            </div>
          </div>
          @endforeach
            
          @endif
         
          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>