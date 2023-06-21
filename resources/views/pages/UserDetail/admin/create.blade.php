
@extends('layouts.adminlayout')

@section('dashboard-content')
    
  @php
      $breadcrumb = ['User Detail' => route('admin.userdetail.index'),'User Detail Create'=>'#'];
  @endphp

  @include('include.admin.breadcrumb',['breadcrumb'=>$breadcrumb])

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Detail Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.userdetail.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  
                  @include('pages.UserDetail.form')
                 
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