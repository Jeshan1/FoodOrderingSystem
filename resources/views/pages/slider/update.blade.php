
@extends('layouts.adminlayout')

@section('dashboard-content')
    
    @php
      $breadcrumb = ['Dashboard'=>route('dashboard'),"Slider"=>route('slider.index'),"Slider Update"=>"#"]
    @endphp
  @include('include.admin.breadcrumb',["breadcrumb"=>$breadcrumb])

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Slider Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  
                  @include('pages.slider.form',['slider'=>$slider])
                 
                </div>
              

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
     

          </div>
          
        </div>
       
      </div>
   

@endsection