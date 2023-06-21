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
                <h1>Order Received!</h1>
            </div>
            
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
                        @php
                            $orderedDate = date('Y m d');
                        @endphp
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; border-right: 1px solid #cecece;">Ordered Date: {{$orderedDate}}</td>
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
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; border-bottom: 1px solid #cecece;"> {{$deliveryInfo['name']}} </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 30%; border-bottom: 1px solid #cecece; border-right: 1px solid #cecece;"> Phone number: </td>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; border-bottom: 1px solid #cecece;">{{$deliveryInfo['phone']}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 30%; border-right: 1px solid #cecece;"> Delivery location: </td>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;"> {{$deliveryInfo['shipping_address'] }}</td>
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
                        @endphp

                        @if(isset($content))
                            @if(count($content) > 0)
                            @foreach($content as $item)
                            <tr>
                                <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;">{{$item['name'] ?? ''}}</td>
                                <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 17%;">{{$item['price'] ?? ''}}</td>
                                <td style="border-bottom: 1px solid #cecece; border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; width: 12%;">{{$item['quantity'] ?? ''}}</td>
                                @php
                                    $total = $item['quantity'] * $item['price'];
                                    $grandTotal += $total;
                                @endphp
                                <td style="border-bottom: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;">{{ $total ?? ''}}</td>
                            </tr>
                            @endforeach
                            @endif
                        @endif
        
                        <tr>
                            <td style="border-right: 1px solid #cecece; font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important; text-align: right;" colspan="3" class="text-right">Grand Total</td>
                            <td style="font-size: 13px; color: rgb(70, 70, 70); padding: 10px !important;"> {{$grandTotal ?? ''}} </td>
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
