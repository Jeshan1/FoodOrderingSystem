@extends('layouts.app')

@section('content')
    <div class="container px-2 py-2" style="background-color: whitesmoke;" id="about">
        <div class="my-5">
            <h1 style="font-size: 20px;font-weight: bold;">About Us</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="my-3">
                        <p style="font-size: 16px;text-align: justify; color: gray">
                            Food Ordering System is the first System in Nepal that delivers food from hundreds of popular restaurants. As a pioneer food delivery service provider, we are making life easier through online ordering.
                        </p>

                        <p style="font-size: 16px;text-align: justify; color: gray">
                            We know that your time is valuable and sometimes every minute in the day counts. That’s why we deliver! So you can spend more time doing the things you love. You can get anything from Indian food to high French cuisine by placing a simple order online through our website, mobile app or over the phone. Then just sit back, relax, and wait for your order to arrive.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <img src="{{asset('image/about_us.jpg')}}" alt="" style="width: 80%;height: 60%; border-radius: 10px;">
                    </div>
                </div>
            </div>

        </div>

    </div>
   
@endsection
