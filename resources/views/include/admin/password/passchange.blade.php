@extends('layouts.adminlayout')

@section('dashboard-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 px-5 py-5">
                <h1 class="mx-1 mt-5 mb-3" style="font-size: 20px;font-weight: bold;">Change Your password !</h1>
                <form class="border px-5 py-5 rounded" action="{{Auth::user()->role == "admin" ? route('admin.password.update'):route('vendor.password.update')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="new_password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection