@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <h1 class="py-3" style="color:rgb(46, 46, 47); font-size: 20px; font-weight: bold; text-transform: uppercase">Cart Items</h1>
                <table class="w-100 table table-bordered text-center p-2">
                    <thead>
                        <tr>
                        <th class="fw-bolder text-secondary" style="font-size: 16px;">S.No.</th>
                        <th class="fw-bolder text-secondary" style="font-size: 16px;">Items</th>
                        <th class="fw-bolder text-secondary" style="font-size: 16px;">Quantity</th>
                        <th class="fw-bolder text-secondary" style="font-size: 16px;">Action</th>
                        </tr>
                    </thead>
                    @php
                        $sn = 1;
                    @endphp
                    @if (!empty($cartitems) && count($cartitems) > 0)
                        @foreach ($cartitems as $item)
                        <tbody style="color:rgb(46, 46, 47);">
                            
                            <tr>
                                <td border="2">{{$sn}}</td>
                                <td border="2">{{$item->product->name}}</td>
                                <td border="2">{{$item->quantity}}</td>
                                <td border="2">
                                    <form action="{{route('cartItem.delete',$item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm showConfirm" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @php
                            $sn++;
                        @endphp
                        @endforeach 
                        @else
                        <tr>
                            <td class="text-center fs-3 fw-bolder" colspan="4">No any cart Found!</td>
                        </tr>
                    @endif
                </table>
            </div>

            <div class="col-md-4">
               <div class="py-5 px-5">
                    <form action="{{route('checkout.cart')}}" method="POST" class="py-3">
                        @csrf
                        <div>
                            <label for="shipping_address" style="font-size: 16px; font-weight: bold; color:rgb(46, 46, 47);">Shipping Address</label>
                            <input type="text" name="shipping_address" id="shipping_address" class="form-control py-2 px-2 mt-2" value="" style="font-size: 14px;">
                        </div>
                        @if (count($cartitems) > 0)
                            <input type="hidden" value="{{$cartitems[0]->cart_id}}" name="cart_id">
                        @endif
                        <button type="submit" class="my-3 btn btn-primary w-100 fw-bold {{count($cartitems) < 1 ? 'disabled':''}}" style="font-size: 20px;">Checkout</button>
                    </form>
               </div>
            </div>

        </div>
    </div>

@endsection

@section('specific_js')

     <script>
        $('.showConfirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
            //   buttons: true,
            //   dangerMode: true,
              showCancelButton: true,
              confirmButtonText: 'Yes',
              cancelButtonText: 'No'
          })
          .then((willDelete) => {
            if (willDelete.isConfirmed) {
              form.submit();
            }
          });
      });
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}
@endsection