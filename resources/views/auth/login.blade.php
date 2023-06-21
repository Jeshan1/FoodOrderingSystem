@extends('auth.master')
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-3 me-3 text-primary">Sign in Here!</p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">{{__('Email Address')}}</label>
              <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"
                placeholder="Enter a valid email address" required />

              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="form-label" for="password">{{__('password')}}</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Enter password" required />
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked':''}} />
                <label class="form-check-label" for="remember">
                  {{__('Remember Me')}}
                </label>
              </div>
              @if (Route::has('password.request'))
              <a href="{{route('password.request')}}" class="text-body">{{__('Forgot Your Password?')}}</a>
              @endif
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <div>
                <button type="submit" class="btn btn-primary btn-lg me-2"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">{{__('login')}}</button>

                <a href="{{route('redirectToGoogle')}}" class="btn bg-black text-white btn-lg">
                 <i class="fab fa-google"></i> Login With Google
                </a>
              </div>
              {{-- <div class="my-2">
                <a href="{{route('redirectToGoogle')}}" class="btn bg-black text-white btn-lg">
                 <i class="fab fa-google"></i> Login With Google
                </a> --}}
                {{-- <a href="{{route('redirectToFacebook')}}" class="btn bg-black text-white btn-lg">
                  <i class="fab fa-facebook-f fw-bold"></i> Login With Facebook
                </a> --}}
              {{-- </div> --}}
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('register')}}"
                  class="link-danger">Register</a></p>
            </div>
            
          </form>
        </div>
      </div>
    </div>
    
  </section>
