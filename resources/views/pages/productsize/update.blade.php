
@extends('layouts.adminlayout')

@section('dashboard-content')
    
      
  @php
      $breadcrumb = ['Dashboard' => route('dashboard'),'Product Size' => route('size.index'),'Product Update'=>'#'];
  @endphp

    @include('include.admin.breadcrumb',['breadcrumb'=>$breadcrumb])

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Size Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('size.update',$size->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  
                  @include('pages.productsize.form',['size'=>$size])
                 
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