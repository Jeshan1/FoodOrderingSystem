<div class="form-group my-2">
    <label for="address" class="my-2" style="font-size: 14px; font-weight: bolder;">User Address</label>
    <input type="text" name="address" style="border-radius: 0px;" class="form-control py-2" id="address" placeholder="Enter Your Address.... " value="{{isset($user)? $user->address:''}}">
</div>

<div class="form-group">
    <label for="phone" class="my-2" style="font-size: 14px; font-weight: bolder;">User Contact</label>
    <input type="text" name="phone" style="border-radius: 0px;" class="form-control py-2" id="phone" placeholder="Enter Your Contact.... " value="{{isset($user)? $user->phone:''}}">
</div>