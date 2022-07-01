<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ $fileName }}</title>

    <style>
        .m-0{
            margin: 0;
        }    .text-center{
            text-align:center;
        }
    .td{
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 12px;
        text-align:center;
    }
       th{
        border: 1px dotted black;
        padding:4px 10px;
        font-size: 12px;
    }

    .li{
        font-size: 10px;
    }



	table{
		border-collapse: collapse;
		width:100%
	}
    .result{
        border-bottom: 1px dotted black;
        margin-left:10px !important;
    }
    .list-group{
        list-style: none;
        margin-left:0;
        padding-left:0;
    }
    .title{
        font-size:20px;
    }


    .titlesm{
        font-size:16px;
    }
    .title2{
        font-size:25px !important;
    }

    header{
        text-align: center;
        margin-bottom: 50px;
    }
    </style>

</head>
<body style="font-family: 'bangla', sans-serif;">
<?php
//  $orders = json_decode($orders->data);
    // print_r($orders);
// die();
    ?>

  <header>

        <span class="title2">Pos Companny Name</span> <br>
        <span class="titlesm">Pos Companny Address</span> <br>
        <span class="titlesm tmarginbottom">Pos Companny Contact</span> <br>
  </header>




        <!-- Table 1 -->
        <div class="col-xl-6 col-lg-6" style="width:48%;float:left;">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary title">Order Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Name : </b>{{ $orders->name }}</li>
                        <li class="list-group-item"><b>Phone : </b>{{ $orders->phone }}</li>
                        <li class="list-group-item"><b>Address : </b>{{ $orders->address }}</li>
                        <li class="list-group-item"><b>Date : </b>{{ $orders->order_date }}</li>
                        <li class="list-group-item"><b>Pay Through : </b>{{ $orders->payBy }}</li>
                  </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Table 2 -->
        <div class="col-xl-6 col-lg-6" style="width:48%;float:right;text-align:right">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary title">Order Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if($duepaymets==0)



                    <ul class="list-group" >
                        <li class="list-group-item"><b>Sub Total : </b>{{ $orders->sub_total }}$</li>
                        <li class="list-group-item"><b>Pay Amount : </b>{{ $orders->pay }}$</li>
                        <li class="list-group-item"><b>Due Amount : </b>{{ $orders->due }}$</li>
                  </ul>
                  @else


                  @php
                      $previousDue = 0;

                  foreach($duepaymets as $duepaymet){
                    $previousDue += $duepaymet->payment_amount;
                  }



                  @endphp
                  <ul class="list-group" v-else>
                    <li class="list-group-item"><b>Sub Total : </b>{{ $orders->sub_total }}৳</li>
                    <li class="list-group-item"><b>{{ $orders->order_date }} : </b>{{ $orders->pay-$previousDue }}৳</li>
@foreach ($duepaymets as $duepaymet)


                    <li class="list-group-item"><b>{{ $duepaymet->pay_date }} : </b>{{ $duepaymet->payment_amount }}৳</li>
                    @endforeach
                    <li class="list-group-item"><b>Total Pay Amount : </b>{{ $orders->pay }}৳</li>
                    <li class="list-group-item"><b>Due Amount : </b>{{ $orders->due }}৳</li>
                 </ul>

                 @endif

                </div>
            </div>
          </div>
        </div>





        <!-- Table 3 -->
        <div class="col-xl-12 col-lg-12" style="width:100%;">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary title">Ordered Products</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Code</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0
                            @endphp
                            @foreach ($orderDetails as $product)


                            <tr>
                                <td class="td">{{ $product->product_name }}</td>
                                <td class="td">{{ $product->product_code }}</td>
                                <td class="td">{{ $product->product_quantity }}</td>
                                <td class="td">{{ $product->product_price }}$</td>
                                <td class="td">{{ $product->sub_total }}</td>
                            </tr>

@php

  $subtotal +=  $product->sub_total;
@endphp

                            @endforeach


                            @php
                                print_r($custom_order_details);
                            @endphp




                            <tr>
                                <td colspan='4' class="td" style='text-align: right;'>Sub Total</td>

                                <td class="td">{{ $subtotal }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>



</body>
</html>
