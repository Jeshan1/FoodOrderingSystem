
@extends('layouts.adminlayout')

@section('dashboard-content')
    
      
  @php
      $breadcrumb = ['Dashboard' => route('dashboard'),'Product' => route('product.index'),'Product Update'=>'#'];
  @endphp

    @include('include.admin.breadcrumb',['breadcrumb'=>$breadcrumb])

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.update',$product->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  
                  @include('pages.vendorclient.product.form',['sizes'=>$sizes,'product'=>$product])
                 
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