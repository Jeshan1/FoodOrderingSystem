@extends('layouts.adminlayout')

@section('page-specific-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('dashboard-content')

    @php
      $breadcrumb = ['Dashboard'=>route('dashboard'),"Pending Vendor"=>route("pendingvendor.index"),"Approved Vendor"=>"#"]
    @endphp
  @include('include.admin.breadcrumb',["breadcrumb"=>$breadcrumb])

<div class="card">
    <div class="card-header d-flex justify-content-start">
      {{-- <h1 class="text-3xl fw-bold">Approved Vendors</h1> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>S.NO.</th>
          <th>UserName</th>
          <th>Email Address</th>
          <th>Brand Name</th>
          <th>Cover Image</th>
          <th>Logo</th>
          <th>Service</th>
          <th>Status</th>
          <th>Action</th>
          
        </tr>
        </thead>
        <tbody>
            @php
                $sn = 1;
            @endphp
            @if (isset($approvedvendors) && count($approvedvendors) > 0)
                @foreach ($approvedvendors as $approvedvendor)
                <tr>
                    <td>{{$sn}}</td>
                    <td>{{$approvedvendor->username}}</td>
                    <td>{{$approvedvendor->email}}</td>
                    <td>{{$approvedvendor->vendor->brand_name}}</td>
                    <td>
                      <img src="{{asset('storage/vendors/cover_image/'.$approvedvendor->vendor->image_cover)}}" alt="image cover" class="w-100">
                    </td>
                    <td>
                      <img src="{{asset('storage/vendors/logo/'.$approvedvendor->vendor->logo)}}" alt="logo" class="w-75">
                    </td>
                    <td>{{$approvedvendor->vendor->service}}</td>
                    <td>{{$approvedvendor->vendor->is_active?'Active':'Inactive'}}</td>
                    
                    <td class="d-flex justify-content-around">
                        @if ($approvedvendor->vendor->is_active==1)
                        <a href="{{route('checkstatusvendor',$approvedvendor->vendor->id)}}" class="btn btn-primary">Inactive</a>
                        @else
                        <a href="{{route('checkstatusvendor',$approvedvendor->vendor->id)}}" class="btn btn-success">Active</a>
                        @endif
                   
                        <form action="{{route('approvedvendor.destroy',$approvedvendor->id)}}" method="POST" class="mx-2">
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
            <th>S.NO.</th>
            <th>UserName</th>
            <th>Email Address</th>
            <th>Brand Name</th>
            <th>Cover Image</th>
            <th>Logo</th>
            <th>Service</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

@section('page-specific-js')
    <!-- DataTables  & Plugins -->
<script src="{{asset('../../plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('../../plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('../../plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('../../plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('../../plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('../../plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

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