@extends('layouts.adminlayout')

@php
      $breadcrumb = ['Dashboard' => route('dashboard'),'Contacts' => route('contact.index'),'View Contact'=>'#'];
  @endphp

@section('dashboard-content')

@include('include.admin.breadcrumb',['breadcrumb'=>$breadcrumb])

    <div class="container">
        <div class="my-5 mx-2">
            <div class="border px-5 py-5 shadow" style="border-radius: 10px;">
                <div>
                    <p style="font-size: 20px;">You got message from 
                        <span style="color: rgb(39, 39, 244);">{{$contact->name}}.</span>
                         His/Her email is 
                         <span style="color: rgb(39, 39, 244);">{{$contact->email}}</span>. 
                         His/Her message is " <span style="color: rgb(39, 39, 244);">{{$contact->message}}</span> "
                    </p>
                    <div class="mt-4">
                        <a href="{{route('contact.index')}}" class="btn btn-primary" style="font-size: 16px;">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection