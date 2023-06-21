<div class="form-group">
    <label for="slider_text">Slider Description</label>
    <input type="text" name="slider_text" class="form-control" id="slider_text" placeholder="Enter Slider Description...." value="{{isset($slider)? $slider->slider_text:''}}">

   
  </div>
  
  <div class="form-group">
    <label for="slider_image">Slider Image</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="slider_image" name="slider_image">
        <label class="custom-file-label" for="slider_image">Choose Image</label>
       
      </div>
      <div class="input-group-append">
        <span class="input-group-text">Upload</span>
      </div>
    </div>

    @if (isset($slider))
      <div class="mt-3">
        <label for="">Current Slider</label>
      <img src="{{asset('storage/slider/'.$slider->slider_image)}}" alt="" class="ml-5" width="400">
      </div>
    @endif
  </div>