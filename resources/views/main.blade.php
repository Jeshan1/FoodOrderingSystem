@extends('layouts.app')
@extends('layouts.style')
@section('content')
  
    @include('include.carousel')
     @php
            if (auth()->check() && auth()->user()->is_vendor==1) {
                $is_approved = getVendorApprovalStatus(auth()->user()->id);
            }
    @endphp

    @if (auth()->check() && auth()->user()->is_vendor == 1)
        @if (isset($is_approved) && !$is_approved)
            <div class="alert alert-info container my-2">
            <div class="mx-5">
                    <p class="mt-4 fs-3 fw-bold px-4">Your vendor approval request is being processed.Thank You for Having patience.</p>
            </div>
            </div> 
        @endif
    @endif
    <div class="container py-5">
        <h1 class="fs-3 text-primary fw-bold">Food Fresh</h1>
        <img src="https://foodmandu.com/Images/Foodmandu-Fresh.jpg" alt="">
    </div>

    <div class="about">
        <div class="about-main">
            <h1 class=" fw-bold fs-2 mt-5">About Us</h1>
            <p class=" fs-4 fw-bold" style="padding: 0px 200px">
                It is the fastest, easiest and most convenient way to enjoy the best food of your favourite restaurants at home, at the office or wherever you want to.
            </p>

            <p class=" fs-4 fw-bold" style="padding: 0px 200px">
                We know that your time is valuable and sometimes every minute in the day counts. That’s why we deliver! So you can spend more time doing the things you love.
            </p>

            <div>
                <button style="border: none;"><a href="{{route('about')}}" style="color: white; border: none; font-size:20px;font-weight: bold;">Learn More</a></button>
            </div>
           
        </div>
    </div>
    
@endsection