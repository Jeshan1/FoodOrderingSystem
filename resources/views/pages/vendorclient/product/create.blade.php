
@extends('layouts.adminlayout')

@section('dashboard-content')
    
  @php
      $breadcrumb = ['Dashboard' => route('dashboard'),'Product' => route('product.index'),'Product Create'=>'#'];
  @endphp

  @include('include.admin.breadcrumb',['breadcrumb'=>$breadcrumb])

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  
                  @include('pages.vendorclient.product.form',["sizes"=>$sizes])
                 
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