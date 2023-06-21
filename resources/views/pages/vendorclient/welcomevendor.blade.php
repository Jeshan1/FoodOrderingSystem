@extends('layouts.adminlayout')

@section('dashboard-content')
@php
  $breadcrumb = ["Dashboard"=>route('vendor.dashboard'),"Dashboard"=>"#"]
@endphp

@include('include.admin.breadcrumb',["breadcrumb"=>$breadcrumb])

    <div class="container">
        <div class="">
            <div class="mx-5 my-5 border rounded shadow-lg">
                <div class="px-5 py-5">
                    <h1 style="color: #edb50e;">Welcome {{Auth::user()->username}} Here !</h1>
                </div>
            </div>
        </div>
    </div>
@endsection