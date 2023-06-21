<div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name.... " value="{{isset($product)? $product->name:''}}"> 
</div>

<div class="form-group">
    <label for="price">Product Price</label>
    <input type="text" name="price" class="form-control" id="price" placeholder="Enter Product Name.... " value="{{isset($product)? $product->price:''}}"> 
</div>

<div class="form-group">
    <label for="status">Product Size</label>
    <select name="size_id" id="size_id" class="form-control">
        <option value="">-- select option --</option>
            @if (!empty($sizes) && count($sizes) > 0)
                @foreach ($sizes as $size)
                    <option value="{{$size->id}}" {{isset($size)?"selected":""}} >{{$size->name}}</option>
                @endforeach
            @endif
    </select> 
</div>

<div class="form-group">
    <label for="status">Product Status</label>
    <select name="status" id="" class="form-control">
        <option value="Available" {{isset($product)?($product->status == "Available" ? "selected":""):""}}>Available</option>
        <option value="Not Available" {{isset($product)?($product->status == "Not Available" ? "selected":""):""}}>Not Available</option>   
        <option value="Out Of Stock" {{isset($product)?($product->status == "Out Of Stock" ? "selected":""):""}}>Out Of Stock</option>   
    </select> 
</div>