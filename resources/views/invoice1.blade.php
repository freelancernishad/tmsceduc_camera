<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet"> --}}

<style>

*{
    margin:0;
    padding: 0;
    --color:#444B8F;
    font-family: 'Kalpurush', sans-serif;
}
.memo {
   width: 500px;
   margin:0 auto;
   padding:20px;
}.memoHead {
    text-align: center;
    color:#444B8F
}
h1.companiname {
    transform: scaleX(2);
    margin:0;
}
p {

    color:#444B8F;
    margin:0;

}div {

    color:#444B8F;
    margin:0;

}
p.defalttext.address {
    background:#444B8F;
    width: 269px;
    margin: 0 auto;
    color: white;
    border-radius: 50px;
    padding: 2px 0px;
}
p.defalttext {
    font-weight: 600;
    font-size: 16px;
    margin: 0;
    /* transform: scaleX(1.2); */

}


thead tr {
    background: #444B8F;
}
thead tr th {
    color: white;
}

tr {
    border: 1px solid #444B8F;
}

th {
    border: 1px solid #444B8F;
    border-right: 1px solid white;
}

td {
    border: 1px solid #444B8F;
}
table,  td {
  border: 1px solid #444B8F;
  border-collapse: collapse;
  text-align: center;
  color:#444B8F;
}th, {
  border: 1px solid white;
  border-collapse: collapse;
}

td {
    height: 27px;

}
.slNo{
    float: right;
    width: 300px;
}
</style>


</head>
<body  style="font-family: 'bangla', sans-serif;">
{{-- <button id="pdf">Print</button> --}}

<div id="body">

    <div class="memo">
        <div class="memoHead">
            <h1 class="companiname">মেসার্স এলাহী ট্রেডার্স</h1>
            <p class="defalttext">প্রোঃ শাহ্‌ আলম</p>
            <p class="defalttext">বি. সি. আই. সি. অনুমদিত সার দিলার</p>
            <p class="defalttext address">কালীগঞ্জ বাজার, দেবিগঞ্জ, পঞ্চগড় </p>
            <p class="defalttext">মোবাইল নং : ০১৭৪০৯২৯৩০২ </p>

            <div style="display:flex; margin-top:20px">
                <div style="width:350px"></div>

                <p class="slNo">ক্রমিক নং :</p>

            </div>

        </div>

        <div class="memobody">
            <div class="customerDetails">
                <div style="width:350px;float:left"><b>নাম :</b>  {{ $orders->customer_name }}</div>  <div style="float:right"><b>তারিখ :</b>{{ $orders->date }}</div>
                <div><b>ঠিকানা : </b>{{ $orders->address }}</div>
            </div>


            <div class="productDetails">
                <table style="border:1px solid #444B8F;width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">সংখ্যা</th>
                            <th width="45%">বিবরন</th>
                            <th width="15%">পরিমান</th>
                            <th width="15%">দর</th>
                            <th width="15%">টাকা</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $subtotal = 0
                    @endphp
                     @foreach (json_decode($orders->Invoices) as $index=>$product)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->weight_quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->weight_quantity*$product->price }}</td>
                        </tr>

                        @php
                            $subtotal +=  $product->weight_quantity*$product->price
                        @endphp
                    @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="defalttext" style="text-align:right;    padding: 0 13px;"><p> মোট </p></td>
                            <td>{{ $subtotal }}</td>
                        </tr>
                    </tfoot>

                </table>
<p style="margin-top:20px">কথাই : {{ $amount }}</p>

            </div>



        </div>
        <div class="memofooter" style="margin-top:50px">



                <p style="float:left;width:50%">ক্রেতার সাক্ষর</p>
                <p style="float:right;width:50%;text-align:right">বিক্রেতার সাক্ষর</p>



        </div>

    </div>


</div>



{{--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        $(document).ready(function($) {
            $(document).on('click', '#pdf', function(event){

                event.preventDefault();
                var element = document.getElementById('body');
                var opt = {
                  margin:       0,
                  filename:     'pdf'+'.pdf',
                  image:        { type: '.pdf', quality: 0.2 },
                  html2canvas:  { scale: 2 },
                  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
                html2pdf().set(opt).from(element).save();
            });
        });
    </script> --}}
</body>
</html>
