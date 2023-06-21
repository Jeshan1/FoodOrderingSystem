@extends('layouts.adminlayout')

@section('page-specific-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('dashboard-content')

    @php
      $breadcrumb = ['Dashboard'=>route('dashboard'),"Pending Order"=>"#"]
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
          {{-- <th class="text-center">Price</th> --}}
          <th class="text-center">Status</th>
          <th class="text-center">Address</th>
          <th class="text-center">Action</th>
          
        </tr>
        </thead>
        <tbody>
            @php
                $sn = 1;
            @endphp
            @if (isset($pendingOrders) && count($pendingOrders) > 0)
                @foreach ($pendingOrders as $order)
                <tr>
                    <td class="text-center">{{$order->id}}</td>
                    <td class="text-center">{{$order->order_id}}</td>
                    {{-- <td class="text-center">{{$order->price}}</td> --}}
                    <td class="text-center">{{$order->status}}</td>
                    <td class="text-center">{{$order->shipping_address}}</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-primary itemModal px-4 py-2" data-toggle="modal"  data-target="#itemModal" data-id="{{$order->id}}">
                          <i class="fas fa-eye fs-5"></i>
                      </button>
                      <input type="hidden" value="{{Session::get('token')}}" id="accessToken">
                      <button type="button" style="background-color: #14eb58;" onclick="processModal({{$order->id}})" class="btn processMOdal px-4 py-2 text-white fw-bold" data-toggle="modal"  data-target="#processModal" data-id="">
                          Action
                      </button>
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
            <th>S.No.</th>
            <th>Order ID</th>
            {{-- <th>Price</th> --}}
            <th>Status</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  {{-- for open modal to show cart items  --}}

<!-- Modal -->
<div class="modal fade" class="modal" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" class="fs-3 fw-bold">Orders</h5>
          <button type="button" id="closeEditModal" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times text-danger fs-3" aria-hidden="true"></i>
          </button>
        </div>
        <div class="modal-body">
                <div class="card-body" id="cardBody">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
      </div>
    </div>
  </div>

  {{-- for process modal  --}}

  <div class="modal fade" class="modal" id="processModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" class="fs-3 fw-bold">Order Updation</h5>
          <button type="button" id="closeEditModal" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times text-danger fs-3" aria-hidden="true"></i>
          </button>
        </div>
        <div class="modal-body">
                <div class="card-body" id="processBody">
                  <form action="{{route('updateStatus')}}" method="POST">
                    @csrf
                    <input type="hidden" name="cart_id" id="cartid">
                    <select class="form-select form-control" aria-label="Default select example" name="status">
                        <option value="pending">Pending</option>
                        <option value="processed">Processed</option>
                        <option value="cancel">Cancel</option>
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update Status</button>
                    </div>
                  </form>
                </div>
            </div>
      </div>
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

      // for listing pending item in admin side

    $('.itemModal').on('click',function () {
      var id = $(this).data('id');
       let token = document.getElementById("accessToken").value;
      console.log(id);
      var modal = $('#cardBody');
      modal.empty();
      if (id && token) {
        $.ajax({
            type: 'GET',
            url: "/api/admin/pendingorderitem/" + id,
            headers: { Authorization: `Bearer ${token}` },
            dataType: 'json',
            success: function (response) {
              
               console.log(response);
             $.each(response, function(index, items) {
            var html = `
                <div>
                <h2 class="border-bottom border-secondary border-4 pb-2" style="font-size:20px;">${index}</h2>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    `;
            $.each(items,function (index,item) {
                html += `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.price}</td>
                            <td>${item.quantity}</td>
                            <td>${item.total}</td>

                        </tr>
                        `;
            });

            html += `
                        </tbody>
                    </table>
                    </div>
                `;
            modal.append(html);
            });

            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
      }
    });

    //for click action button

    function processModal(id)
    {
      document.getElementById('cartid').value = id;  
    }


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- for popup modal cdn in bootstrap  --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection