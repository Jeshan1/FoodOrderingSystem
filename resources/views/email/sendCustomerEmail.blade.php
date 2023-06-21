<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
  </head>
  <body class="p-2" style="font-size: 16px !important; color: rgb(100, 100, 100) !important; font-family:Arial, Helvetica, sans-serif;">
    <div class="outer-card card" style="background-color: rgb(245, 245, 245); border-radius: 0px !important; padding: 2rem 7rem;">
        <div class="inner-card card" style="border-radius: 0px !important; padding: 3rem 3.5rem; width: 100%; background-color: #fff;">
            <div class="text-center w-100">
                <img src="https://img.freepik.com/premium-vector/restaurant-logo-design-template_79169-56.jpg" alt="logo" style="max-width: 100px; margin-bottom: 1.8rem;" />
            </div>
            <div class="w-100">
                <h1>Hello {{$name ?? "Sir/Ma'am"}},</h1>
                <h1></h1>
            </div>
            <p class="pt-2" style="font-size: 14px; color: rgb(168, 168, 168); text-align: justify; line-height: 1.2rem;">
                @if($cart->status == 'pending')
                    {{ 'Thank you for choosing us! Your order is on the way.' }}
                @elseif($cart->status == 'processed')
                    {{ 'Thank you for choosing us! Your order has been delivered.' }}
                @else
                    {{ 'Your order has been canceled! Thank you for choosing us!' }}
                @endif
                <a href="{{config('app.url') ?? '#'}}" target="_blank">Food Ordering System </a>.
            </p>

            <div class="" style="padding-top: 1.5rem; width: 100%;">
                <table class="" style="width: 100%; border: 2px solid #cecece;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border-bottom: 1px solid #cecece; padding: 10px;">Order Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;"> Payment Method: Cash On Delivery </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; border-right: 1px solid #cecece;">Ordered Date: {{$cart->updated_at->format('Y M d')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="" style="padding-top: 2rem; width: 100%;">
                <table class="" style="width: 100%; border: 2px solid #cecece;">
                    <thead>
                        <tr>
                            <th colspan="2" style="border-bottom: 1px solid #cecece; padding: 10px; border-bottom: 1px solid #cecece;">Delivery Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 30%; border-bottom: 1px solid #cecece; border-right: 1px solid #cecece;"> Receiver name: </td>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; border-bottom: 1px solid #cecece;"> {{$name}} </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 30%; border-bottom: 1px solid #cecece; border-right: 1px solid #cecece;"> Phone number: </td>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; border-bottom: 1px solid #cecece;">{{$cart->user->userDetails->phone}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 30%; border-right: 1px solid #cecece;"> Delivery location: </td>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;"> {{$cart->shipping_address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="" style="padding-top: 2rem; padding-bottom: 1.5rem; width: 100%;">
                <table class="" style="width: 100%; border: 2px solid #cecece;">
                    <thead class="text-center">
                        <tr>
                            <th style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; padding: 10px; text-align: left;">Product</th>
                            <th style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; padding: 10px; text-align: left;">Rate</th>
                            <th style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; padding: 10px;">Quantity</th>
                            <th style="border-bottom: 1px solid #cecece; padding: 10px;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $grandTotal = 0;
                            $deliveryCharge = 100;
                            
                        @endphp
                        @if(isset($cart))
                            @if(count($cart->cartItem) > 0)
                            @foreach($cart->cartItem as $item)
                            <tr>
                                <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;">{{$item->product->name ?? ''}}</td>
                                <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 17%;">{{$item->product->price ?? ''}}</td>
                                <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 12%;">{{$item->quantity}}</td>
                                @php
                                    $total = ($item->quantity) * ($item->product->price);
                                    $grandTotal += $total;
                                    $subTotal = $grandTotal + ($grandTotal*(13/100));
                                    $netTotal = $deliveryCharge + $subTotal;
                                @endphp
                                <td style="border-bottom: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;">{{ $total ?? ''}}</td>
                            </tr>
                            @endforeach
                            @endif
                        @endif
                        <tr>
                            <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; text-align: right;" colspan="3" class="text-right">Sub Total <br>(Incl. of All Taxes)</td>
                            <td style="border-bottom: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;"> {{$subTotal ?? ''}}  </td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; text-align: right;" colspan="3" class="text-right">Delivery Charge</td>
                            <td style="border-bottom: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;"> {{$deliveryCharge ?? ''}} </td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; text-align: right;" colspan="3" class="text-right">Grand Total</td>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;"> {{ $netTotal ?? ''}} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</body>

<style>
</style>

</html>
