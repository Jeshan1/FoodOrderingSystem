@extends('auth.master')

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{__('Register')}}</p>
  
                  <form class="mx-1 mx-md-4" method="POST" action="{{route('register')}}">
                    @csrf
  
                    <div class="d-flex flex-row align-items-center mb-4">
                     
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label mt-3" for="username">{{__('User Name')}}</label>
                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username')}}" required  />

                        @error('username')
                             <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>  
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label mt-3" for="email">{{__('Email Address')}}</label>
                        <input type="email" id="email" name="email" class="form-control  @error('email') is-invalid @enderror"  value="{{old('email')}}" required/>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>   
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                     
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label mt-3" for="password">{{__('Password')}}</label>
                        <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password"  required/>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                      </div>   
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label mt-3" for="password-confirm">{{__('Confirm Password')}}</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required />
                      </div>
                    </div>

                    <input type="hidden" name="role_id" value="3">

                    <div class="form-check mb-0">
                      <label class="form-check-label" for="is_vendor">
                      <input class="form-check-input me-2" type="checkbox" name="is_vendor" id="is_vendor" {{old('is_vendor') ? 'checked':''}} />
                        {{__('Check For Vendors')}}
                      </label>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">{{__('Register')}}</button>
                    </div>
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>