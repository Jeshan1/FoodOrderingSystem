
@extends('layouts.app')

@section('content')
    
  {{-- @php
      $breadcrumb = ['User Detail' => route('userdetail.index'),'User Detail Create'=>'#'];
  @endphp --}}

  {{-- @include('include.admin.breadcrumb',['breadcrumb'=>$breadcrumb]) --}}

      <div class="container my-5">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary shadow" style="border-radius: 0px;">
              <div class="card-header">
                <h3 class="card-title px-4" style="font-size: 16px;font-weight: bold;">Add Your Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('add.customerdetail')}}" method="POST">
                @csrf
                <div class="card-body px-5">
                  
                  @include('pages.userDetail.customer.form')
                 
                </div>
              

                <div class="card-footer px-5">
                  <button type="submit" class="btn btn-primary px-4 py-2" style="font-size: 14px;">Submit</button>
                </div>
              </form>
            </div>
            <div class="my-4">
              <p style="font-size: 14px; font-weight: bolder; color: rgb(35, 34, 34);">If you want to change your password click here !</p>
              <a href="{{route('password.change')}}" class="btn btn-primary px-4 py-2">Change Your Password</a>
            </div>


     

          </div>

          <div class="col-md-8">
                <table class="w-100">
                    <thead class="border border-3">
                        <tr class="text-center" style="font-size: 16px;font-weight: bold;color: #0d0d0d;">
                            <th>S.No.</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="border border-1">
                       @php
                           $sn=1;
                       @endphp
                       @if (!empty($customers) && count($customers) > 0)
                            @foreach ($customers as $customer)
                            <tr class="text-center py-2" style="font-size: 16px; font-weight: bolder;">
                            <td style="color: #1D267D;">{{$sn}}</td>
                            <td id="{{$customer->id}}address" style="color: #1D267D;">{{$customer->address}}</td>
                            <td id="{{$customer->id}}phone" style="color: #1D267D;">{{$customer->phone}}</td>
                            <td class="py-2">
                                <form action="{{route('delete.customerdetail',$customer->id)}}" method="POST" style="display: inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <input type="hidden" value="DELETE" name="_method">
                                  <button type="submit" class="btn btn-danger showConfirm" title="DELETE"><a href="" style="color: white; font-weight: bold;"><i class="fas fa-trash"></i></a></button>
                                </form>
                                <button type="button" class="btn btn-primary editButton" style="display: inline-block;" data-toggle="modal"  data-target="#editModal" data-id="{{$customer->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @php
                            $sn++;
                        @endphp
                        @endforeach
                       @endif

                    </tbody>
                </table>

                <div class="my-4 border shadow" style="border-radius: 0px;">
                  <div class="px-5 py-3">
                    
                     <h1 class="text-left" style="font-size: 20px;font-weight: bold;">User Details</h1>
                     <div class="my-2 border px-3 py-3 shadow" style="border-radius: 0px;">
                        @if (count($customers) > 0)
                        <p class="fw-semibold" style="font-size: 16px;">Name : <span style="color: #4e5051">{{$customer->user->username}}</span></p>
                        <p class="fw-semibold" style="font-size: 16px;">Email : <span style="color: #4e5051">{{$customer->user->email}}</span></p>
                        @endif
                        {{-- <p>Password : <span>{{$customer->user->password}}</span></p> --}}
                       @if (isset($customers) && count($customers) > 0)
                          @foreach ($customers as $customer)
                        <p class="fw-semibold" style="font-size: 16px;">Phone : <span style="color: #4e5051">{{$customer->phone}}</span></p>
                        <p class="fw-semibold" style="font-size: 16px;">Address : <span style="color: #4e5051">{{$customer->address}}</span></p>
                        @endforeach
                       @endif
                     </div>
                    
                  </div>

                </div>
          </div>
          
        </div>
       
      </div>

      {{-- for edit modal  --}}

     

  <!-- Modal -->
  <div class="modal fade" class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" class="fs-3 fw-bold">Edit User Detail</h5>
          <button type="button" id="closeEditModal" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fas fa-times text-danger fs-3" aria-hidden="true"></i>
          </button>
        </div>
        <div class="modal-body">
          <form id="updateForm" method="POST"> 
                <div class="card-body">
                  <div class="form-group my-2">
                    
                    <label for="address" class="fs-3">User Address</label>
                    <input type="text" name="address" class="form-control py-3 fs-5" id="m_address" placeholder="Enter Your Address.... ">
                  </div>

                  <div class="form-group ">
                      <label for="phone" class="fs-3">User Contact</label>
                      <input type="text" name="phone" class="form-control py-3 fs-5" id="m_phone" placeholder="Enter Your Contact.... " >
                  </div>
                 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  id="updateBtn">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>



   

@endsection

@section('specific_js')

<script>

   $(document).ready(function() {
   
     $('.editButton').on('click',function () {
      var id = $(this).data('id');
      console.log(id);
      
     
      $.ajax({
            url: "/customerdetail/edit/"+id,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('#updateBtn').val(response.id);
                $('#m_address').val(response.address);
                $('#m_phone').val(response.phone);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('#updateBtn').on('click',function () {
      var id = $(this).val();
      console.log(id);
      data = {
          'address':$("#m_address").val(),
          'phone':$("#m_phone").val(),
        }
       $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
     
      $.ajax({
            url: "/customerdetail/update/"+id,
            type: 'PUT',
            data:data,

            // data: { CSRF: getCSRFTokenValue()},
            dataType: 'json',
            success: function (response) {
               $(`#${id}address`).html(data.address);
               $(`#${id}phone`).html(data.phone);
               $("#closeEditModal").trigger("click");
               console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

  });


// for delete user detail

$('.showConfirm').click(function(event) {
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
      {{-- sweetalert cdn  --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  {{-- for popup modal cdn in bootstrap  --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection