<div class="form-group">
    <label for="address">User Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your Address.... " value="{{isset($user)? $user->address:''}}">
</div>

<div class="form-group">
    <label for="phone">User Contact</label>
    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Your Contact.... " value="{{isset($user)? $user->phone:''}}">
</div>