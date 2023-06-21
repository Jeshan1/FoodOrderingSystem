@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="my-5">
            <div class="px-5 py-5">
                <h1 style="font-size: 20px; font-weight: bolder;">Contact Us</h1>
                <p style="font-size: 16px;">If you have any query , feel free to contact us!</p>
                <div class="my-2">
                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf
                         @include('pages.contactus.form')

                        <div class="my-2">
                            <button type="submit" class="btn btn-primary px-2 py-1" style="font-size: 16px;">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection