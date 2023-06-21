<div class="form-group my-2">
    <label for="name" class="my-2 fw-bold">Full Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name....">
     @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror   
</div>

<div class="form-group my-2">
    <label for="email" class="my-2 fw-bold">Email</label>
    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Your Valid Email....">
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror   
</div>

<div class="form-group my-2">
    <label for="message" class="my-2 fw-bold">Message</label>
    <input type="text" name="message" class="form-control" id="message" placeholder="Enter Your Name....">
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror   
</div>
  
  

    