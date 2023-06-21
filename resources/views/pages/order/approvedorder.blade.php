@extends('layouts.adminlayout')

@section('page-specific-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('dashboard-content')

  @php
      $breadcrumb = ["Dashboard"=>route('dashboard'),"Approved Orders"=>"#"];
  @endphp
  @include('include.admin.breadcrumb',["breadcrumb"=>$breadcrumb]) 

<div class="card">
    <div class="card-header d-flex justify-content-start">
      {{-- <h1 class="text-3xl fw-bold">Pending Vendors</h1> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th class="text-center">S.No.</th>
          <th class="text-center">Order ID</th>
          <th class="text-center">Price</th>
          <th class="text-center">Status</th>
          <th class="text-center">Address</th>
          <th class="text-center">Action</th>
          
        </tr>
        </thead>
        <tbody>
            @php
                $sn = 1;
            @endphp
            @if (isset($approvedOrders) && count($approvedOrders) > 0)
                @foreach ($approvedOrders as $order)
                <tr>
                    <td class="text-center">{{$order->id}}</td>
                    <td class="text-center">{{$order->order_id}}</td>
                    <td class="text-center">{{$order->price}}</td>
                    <td class="text-center">{{$order->status}}</td>
                    <td class="text-center">{{$order->shipping_address}}</td>
                    <td class="text-center">
                      <form action="{{route('approve.order.destroy',$order->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger show_confirm" title="Delete">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
   
                  </tr>
                  @php
                      $sn++;
                  @endphp
                @endforeach
            @endif
        
        
        </tbody>
        <tfoot>
        <tr>
            <th class="text-center">S.No.</th>
            <th class="text-center">Order ID</th>
            <th class="text-center">Price</th>
            <th class="text-center">Status</th>
            <th class="text-center">Address</th>
            <th class="text-center">Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    
  </div>

  
@endsection

@section('page-specific-js')
   
{{-- sweetalert js  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
         "lengthChange": false, 
         "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
@endsection      