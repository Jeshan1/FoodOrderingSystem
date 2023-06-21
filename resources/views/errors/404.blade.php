@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-5">
            <div class="text-center px-5 py-5 border rounded">
                <h1 class="text-danger fs-1 fw-bold">404 - {{$message}}</h1>
                <p style="font-weight: bold;font-size: 16px;">The page you are looking for does not exist.</p>
                <div>
                    <a href="/" class="btn btn-primary px-2 py-1 fw-bold" style="font-size: 14px;">Go To Home <i class="fas fa-chevron-right"></i> </a>
                </div>
            </div>
        </div>
    </div>
@endsection