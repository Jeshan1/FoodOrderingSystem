@extends('layouts.adminlayout')

@section('page-specific-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

  @php
      $breadcrumb = ['Dashboard' => route('dashboard'),'User Detail' => '#'];
  @endphp

@section('dashboard-content')
@include('include.admin.breadcrumb',['breadcrumb'=>$breadcrumb])

<div class="card">
    <div class="card-header d-flex justify-content-end">
      <a href="{{route('vendor.userdetail.create')}}" class="btn btn-primary fs-bold">Add Your Detail</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>S.NO.</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Action</th>  
        </tr>
        </thead>
        <tbody>
            @php
                $sn = 1;
            @endphp
            @if (isset($users) && count($users) > 0)
                
                  @foreach ($users as $user)
                <tr>
                    <td>{{$sn}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <td class="d-flex">
                      <a href="{{route('vendor.userdetail.edit',$user->id)}}" class="btn btn-info">
                          <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{route('vendor.userdetail.delete',$user->id)}}" method="POST" class="mx-2">
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
            <th>Address</th>
            <th>Phone</th>
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