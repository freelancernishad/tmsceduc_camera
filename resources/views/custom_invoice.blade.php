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
        <div class="col-xl-6 col-lg-6">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary title">Order Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Name : </b>{{ $orders->customer_name }}</li>
                        {{-- <li class="list-group-item"><b>Phone : </b>{{ $orders->phone }}</li> --}}
                        <li class="list-group-item"><b>Address : </b>{{ $orders->address }}</li>
                        <li class="list-group-item"><b>Date : </b>{{ $orders->date }}</li>

                  </ul>
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
                                <th>নাম</th>
                                <th>ওজন/পরিমাণ</th>
                                <th>ইউনিট দাম</th>
                                <th>মোট দাম</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0
                            @endphp
                            @foreach (json_decode($orders->Invoices) as $product)


                            <tr>
                                <td class="td">{{ $product->name }}</td>
                                <td class="td">{{ $product->weight_quantity }}</td>
                                <td class="td">{{ $product->price }}</td>
                                <td class="td">{{ $product->weight_quantity*$product->price }}</td>
                            </tr>

@php

  $subtotal +=  $product->weight_quantity*$product->price
@endphp

                            @endforeach

                            <tr>
                                <td colspan='3' class="td" style='text-align: right;'>Sub Total</td>

                                <td class="td">{{ $subtotal }}</td>
                            </tr>
                        </tbody>
                    </table>
                    কথাইঃ {{ $amount }}
                </div>
            </div>
          </div>
        </div>



</body>
</html>
