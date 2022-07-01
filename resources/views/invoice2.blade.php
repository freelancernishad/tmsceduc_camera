<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet"> --}}
    <style>
@page {
     margin: 0px;
     size: landscape;
    }
    /* @page {
        size: landscape;

    } */
    .memoborder{
        float: left;
        width: 393px;
    }
    .memobg1{
        margin-right: 5px;
    }

        .memobg {

            padding: 10px;
            position: relative;
            background: linear-gradient(42deg, rgba(163, 92, 33, 1) 0%, rgba(147, 61, 83, 1) 11%, rgba(67, 120, 108, 1) 24%, rgba(28, 140, 194, 1) 33%, rgba(88, 132, 157, 1) 42%, rgba(135, 119, 143, 1) 51%, rgba(162, 87, 145, 1) 61%, rgba(180, 126, 20, 1) 71%, rgba(190, 155, 49, 1) 80%, rgba(195, 113, 90, 1) 89%, rgba(111, 137, 52, 1) 98%);
            /* padding: 3px; */

        }
        .memo {
            /* width: 500px; */
            /* margin: 0 auto; */
            /* padding:20px; */
            background: white;
        }
        .memoHead {
            text-align: center;
            color: #444B8F
        }
        h1.companiname {
            transform: scaleX(2);
            margin: 0;
            color: #C7554D;
        }
        p {
            color: #2F77A5;
            margin: 0;
        }
        div {
            color: #2F77A5;
            margin: 0;
        }
        p.defalttext.name {
            background: #6A4B5A;
            width: 269px;
            margin: 0 auto;
            color: white;
            border-radius: 50px;
            padding: 2px 0px;
        }
        p.defalttext.address {
            background: #D25664;
            width: 100%;
            margin: 0 auto;
            color: white;
            padding: 2px 0px;
        }
        p.defalttext {
            font-weight: 600;
            font-size: 13px;
            margin: 0;
            /* transform: scaleX(1.2); */
        }
        .thead .tr {
            background: #3F6D49;
        }
        .thead .tr .th {
            color: white;
        }
        .tr {
            border: 1px solid #2F77A5;
        }
        .th {
            border: 1px solid #444B8F;
            border-right: 1px solid white;
        }
        .td {
            border: 1px solid #2F77A5;
        }
        .table,
        .td {
            border: 1px solid #2F77A5;
            border-collapse: collapse;
            text-align: center;
            color: #2F77A5;
        }
        .th,
            {
            border: 1px solid white;
            border-collapse: collapse;
        }
        .td {
            height: 27px;
        }
        .slNo {
            float: right;
            width: 300px;
        }
        .addLebel {
            position: fixed;
            left: 2em;
        }
        .defaltfont {
            font-size: 12px;
        }
        /* .posisionfixed{
    position: fixed;
    top: 50px;
    left:0;
} */
    </style>
</head>
<body style="font-family: 'bangla', sans-serif;">
    {{-- <button id="pdf">Print</button> --}}
    <div id="body">


        <div class="memoborder" style=" border-right: 1px dotted black;" >
        <div class="memobg memobg1">
            <div class="memo">
                <div class="memoHead">
                    <h1 class="companiname">মেসার্স রনি ট্রেডার্স</h1>
                    <p class="defalttext name">প্রোঃ মোঃ হাছেন আলী </p>
                    <p class="defalttext">এখানে রাসায়নিক সার কীটনাশক ও বীজ বিক্রিয় করা হয়</p>
                    <p class="defalttext address">কালীগঞ্জ বাজার, দেবিগঞ্জ, পঞ্চগড় </p>
                    <p class="defalttext" style="color:#6A4B5A">মোবাইল নং : ০১৭৪০৯২৯৩০২ </p>
                </div>
                <div class="memobody" style="position: relative;">
                    <table width="100%" style="border: 1px solid #2F77A5;margin-bottom:20px" cellspacing="0">
                        <tr>
                            <td style="background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px;border-bottom:1px solid #2F77A5;"
                                class="defaltfont">নাম</td>
                            <td style="border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5"
                                class="defaltfont"> {{ $orders->name }}</td>
                            <td width="10%"
                                style="background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px;border-bottom:1px solid #2F77A5"
                                class="defaltfont">ক্রমিক নং</td>
                            <td width="20%" style="border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5"
                                class="defaltfont"> 12345</td>
                        </tr>
                        <tr>
                            <td style="background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px"
                                class="defaltfont">ঠিকানা</td>
                            <td class="defaltfont" style="padding-left:6px;color:#2F77A5">{{ $orders->address }}</td>
                            <td style="background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px"
                                class="defaltfont">তারিখ</td>
                            <td class="defaltfont" style="padding-left:6px;color:#2F77A5">{{ $orders->order_date }}
                            </td>
                        </tr>
                    </table>
                    <div class="productDetails">
                        <table class="table" style="border:1px solid #444B8F;width:100%" cellspacing="0">
                            <thead class="thead">
                                <tr class="tr">
                                    <th class="th defaltfont" width="10%">সংখ্যা</th>
                                    <th class="th defaltfont" width="45%">বিবরন</th>
                                    <th class="th defaltfont" width="15%">পরিমান</th>
                                    <th class="th defaltfont" width="15%">দর</th>
                                    <th class="th defaltfont" width="15%">টাকা</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $subtotal = 0;
                                    $index = 1;
                                @endphp
                                @foreach ($orderDetails as $product)
                                    <tr class='tr'>
                                        <td class="td defaltfont">{{ $index }}</td>
                                        <td class="td defaltfont">{{ $product->product_name }}</td>
                                        <td class="td defaltfont">{{ $product->product_quantity }}</td>
                                        <td class="td defaltfont">{{ $product->product_price }}</td>
                                        <td class="td defaltfont">{{ $product->sub_total }}</td>
                                    </tr>
                                    @php
                                        $index++;
                                        $subtotal += $product->sub_total;
                                    @endphp
                                @endforeach
                                @foreach ($custom_order_details as $productCustom)
                                    <tr class='tr'>
                                        <td class="td defaltfont">{{ $index }}</td>
                                        <td class="td defaltfont">{{ $productCustom->product_name }}</td>
                                        <td class="td defaltfont">{{ $productCustom->product_quantity }}
                                            {{ $productCustom->product_quantity_type }}</td>
                                        <td class="td defaltfont">{{ $productCustom->product_price }}</td>
                                        <td class="td defaltfont">{{ $productCustom->sub_total }}</td>
                                    </tr>
                                    @php
                                        $index++;
                                        $subtotal += $productCustom->sub_total;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot class="tfoot">
                                <tr class="tr">
                                    <td colspan="4" class="defalttext td defaltfont"
                                        style="text-align:right;    padding: 0 13px;">
                                        <p> মোট </p>
                                    </td>
                                    <td class="td defaltfont">{{ $subtotal }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <p style="margin-top:20px;padding:0 15px" class="defaltfont">কথাই : {{ $amount }}</p>
                    </div>
                </div>
                <div class="memofooter" style="margin-top:50px">
                    <p style="float:left;width:30%;padding:10px 15px" class="defaltfont">ক্রেতার সাক্ষর</p>
                    <p style="float:right;width:30%;text-align:right;padding:10px 15px" class="defaltfont">বিক্রেতার
                        সাক্ষর</p>
                </div>
            </div>
        </div>
        </div>







        <div class="memoborder" style="float:right;">
        <div class="memobg">
            <div class="memo">
                <div class="memoHead">
                    <h1 class="companiname">মেসার্স রনি ট্রেডার্স</h1>
                    <p class="defalttext name">প্রোঃ মোঃ হাছেন আলী </p>
                    <p class="defalttext">এখানে রাসায়নিক সার কীটনাশক ও বীজ বিক্রিয় করা হয়</p>
                    <p class="defalttext address">কালীগঞ্জ বাজার, দেবিগঞ্জ, পঞ্চগড় </p>
                    <p class="defalttext" style="color:#6A4B5A">মোবাইল নং : ০১৭৪০৯২৯৩০২ </p>
                </div>
                <div class="memobody" style="position: relative;">
                    <table width="100%" style="border: 1px solid #2F77A5;margin-bottom:20px" cellspacing="0">
                        <tr>
                            <td style="background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px;border-bottom:1px solid #2F77A5;"
                                class="defaltfont">নাম</td>
                            <td style="border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5"
                                class="defaltfont"> {{ $orders->name }}</td>
                            <td width="10%"
                                style="background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px;border-bottom:1px solid #2F77A5"
                                class="defaltfont">ক্রমিক নং</td>
                            <td width="20%" style="border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5"
                                class="defaltfont"> 12345</td>
                        </tr>
                        <tr>
                            <td style="background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px"
                                class="defaltfont">ঠিকানা</td>
                            <td class="defaltfont" style="padding-left:6px;color:#2F77A5">{{ $orders->address }}</td>
                            <td style="background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px"
                                class="defaltfont">তারিখ</td>
                            <td class="defaltfont" style="padding-left:6px;color:#2F77A5">{{ $orders->order_date }}
                            </td>
                        </tr>
                    </table>
                    <div class="productDetails">
                        <table class="table" style="border:1px solid #444B8F;width:100%" cellspacing="0">
                            <thead class="thead">
                                <tr class="tr">
                                    <th class="th defaltfont" width="10%">সংখ্যা</th>
                                    <th class="th defaltfont" width="45%">বিবরন</th>
                                    <th class="th defaltfont" width="15%">পরিমান</th>
                                    <th class="th defaltfont" width="15%">দর</th>
                                    <th class="th defaltfont" width="15%">টাকা</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $subtotal = 0;
                                    $index = 1;
                                @endphp
                                @foreach ($orderDetails as $product)
                                    <tr class='tr'>
                                        <td class="td defaltfont">{{ $index }}</td>
                                        <td class="td defaltfont">{{ $product->product_name }}</td>
                                        <td class="td defaltfont">{{ $product->product_quantity }}</td>
                                        <td class="td defaltfont">{{ $product->product_price }}</td>
                                        <td class="td defaltfont">{{ $product->sub_total }}</td>
                                    </tr>
                                    @php
                                        $index++;
                                        $subtotal += $product->sub_total;
                                    @endphp
                                @endforeach
                                @foreach ($custom_order_details as $productCustom)
                                    <tr class='tr'>
                                        <td class="td defaltfont">{{ $index }}</td>
                                        <td class="td defaltfont">{{ $productCustom->product_name }}</td>
                                        <td class="td defaltfont">{{ $productCustom->product_quantity }}
                                            {{ $productCustom->product_quantity_type }}</td>
                                        <td class="td defaltfont">{{ $productCustom->product_price }}</td>
                                        <td class="td defaltfont">{{ $productCustom->sub_total }}</td>
                                    </tr>
                                    @php
                                        $index++;
                                        $subtotal += $productCustom->sub_total;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot class="tfoot">
                                <tr class="tr">
                                    <td colspan="4" class="defalttext td defaltfont"
                                        style="text-align:right;    padding: 0 13px;">
                                        <p> মোট </p>
                                    </td>
                                    <td class="td defaltfont">{{ $subtotal }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <p style="margin-top:20px;padding:0 15px" class="defaltfont">কথাই : {{ $amount }}</p>
                    </div>
                </div>
                <div class="memofooter" style="margin-top:50px">
                    <p style="float:left;width:30%;padding:10px 15px" class="defaltfont">ক্রেতার সাক্ষর</p>
                    <p style="float:right;width:30%;text-align:right;padding:10px 15px" class="defaltfont">বিক্রেতার
                        সাক্ষর</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
