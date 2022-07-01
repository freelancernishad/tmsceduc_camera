<?php

namespace App\Http\Controllers\api;

use DateTime;
use PDF;
use App\Models\Duepayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
use Rakibhstu\Banglanumber\NumberToBangla;

class OrderController extends Controller
{
    public function all_order()
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')

    				->select('customers.name', 'orders.*')
    				->orderBy('orders.id', 'desc')
    				->get();
    	return response()->json($orders);
    }

    public function todayOrder()
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')
    				->where('orders.order_date', date('d/m/Y'))
    				->select('customers.name', 'orders.*')
    				->orderBy('orders.id', 'desc')
    				->get();
    	return response()->json($orders);
    }

    public function DueOrder($id)
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')
    				->where('orders.customer_id', $id)
    				->where('orders.due','>', 0)
    				->select('customers.name', 'orders.*')
    				->orderBy('orders.id', 'desc')
    				->get();
    	return response()->json($orders);
    }

    public function DueOrderupdate(Request $request, $id)
    {
// dd($request->all());


        $order_id = $request->id;
        $customer_id = $request->customer_id;
        $pay = $request->pay;
        $due = $request->due;
        $payamount = $request->payamount;

        $totalpay = $pay+$payamount;
        $totalDue = $due-$payamount;

        $data = [
            'pay' => $totalpay,
            'due' => $totalDue,
            ];

        $duepaylist = [
            'customer_id' => $customer_id,
            'order_id' => $order_id,
            'payment_amount' => $payamount,
            'payBy' => $request->payBy,
            'pay_date' => date('d/m/Y'),
            'pay_month' => date('F'),
            'pay_year' => date('Y'),
            ];

        DB::table('orders')->where('id',$order_id)->update($data);
        Duepayment::create($duepaylist);
        return response()->json($customer_id);
    }

    public function monthOrder()
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')
    				->where('orders.order_month', date('F'))
    				->select('customers.name', 'orders.*')
    				->orderBy('orders.id', 'desc')
    				->get();
    	return response()->json($orders);
    }
    public function yearOrder()
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')
    				->where('orders.order_year', date('Y'))
    				->select('customers.name', 'orders.*')
    				->orderBy('orders.id', 'desc')
    				->get();
    	return response()->json($orders);
    }

    public function orders($id)
    {
    	$orders = DB::table('orders')
    				->join('customers', 'orders.customer_id', 'customers.id')
    				->where('orders.id', $id)
    				->select('customers.name', 'customers.phone', 'customers.address', 'orders.*')
    				->first();

    	return response()->json($orders);
    }

    public function orderDetails($id)
    {
    	$details = DB::table('order_details')
    				->join('products', 'order_details.product_id', 'products.id')
    				->where('order_details.order_id', $id)
    				->select('products.product_name', 'products.product_code', 'products.image', 'order_details.*')
    				->get();
    	return response()->json($details);
    }


    public function custom_order_details($id)
    {
    	$details = DB::table('custom_order_details')
    				->where('custom_order_details.order_id', $id)
    				->select('custom_order_details.*')
    				->get();
    	return response()->json($details);
    }




    public function orderduepay($id)
    {

        $datacount = DB::table('duepayments')->where('order_id', $id)->count();
if($datacount>0){
        	$details = DB::table('duepayments')
    				->join('orders', 'duepayments.order_id', 'orders.id')
    				->join('customers', 'duepayments.customer_id', 'customers.id')
    				->where('duepayments.order_id', $id)
    				->select( 'customers.*', 'orders.*', 'duepayments.*')
    				->get();

}else{
    $details = 0;
}


    	return response()->json($details);
    }

    public function searchOrder(Request $request){
    	$orderdate = $request->date;
    	$newdate = new DateTime($orderdate);
    	$done = $newdate->format('d/m/Y');

    	$order = DB::table('orders')
    	->join('customers','orders.customer_id','customers.id')
    	->select('customers.name','orders.*')
    	->where('orders.order_date',$done)
    	->get();

    	return response()->json($orderdate);

    }





    public function invoice(Request $request,$id)
    {


        $orders = $this->orders($id);
        $orders = $orders->getContent();
        $orders = json_decode($orders);




        $orderDetails = $this->orderDetails($id);
        $orderDetails = $orderDetails->getContent();
        $orderDetails = json_decode($orderDetails);



        $custom_order_details = $this->custom_order_details($id);
        $custom_order_details = $custom_order_details->getContent();
        $custom_order_details = json_decode($custom_order_details);


        $duepaymets = $this->orderduepay($id);
        $duepaymets = $duepaymets->getContent();
        $duepaymets = json_decode($duepaymets);

//         print_r($orderDetails);
//  die();






$numto = new NumberToBangla();
$amount = $numto->bnMoney($orders->sub_total);

        $fileName = 'Invoice-'.date('Y-m-d H:m:s');



        $data['fileName'] = $fileName;

//  echo $this->invoice1($orders,$orderDetails,$duepaymets,$amount,$custom_order_details,'left');
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L','default_font' => 'bangla',]);

$memo = $orders->memo;
        if($memo=='memo1'){

            $mpdf->WriteHTML( $this->invoice1($orders,$orderDetails,$duepaymets,$amount,$custom_order_details,'right'));
        }else if($memo=='memo2'){
            $mpdf->WriteHTML( $this->invoice2($orders,$orderDetails,$duepaymets,$amount,$custom_order_details,'right'));

        }




       $mpdf->Output($fileName,'I');



        // $mpdf = new \Mpdf\Mpdf([
        //     'default_font_size' => 12,
        //     'default_font' => 'nikosh',
        //     'mode' => 'utf-8',
        //     'format' => 'A4',
        //     'setAutoTopMargin' => 'stretch',
        //     'setAutoBottomMargin' => 'stretch'
        // ]);


        // $mpdf->WriteHTML( $this->invoice2($orders,$orderDetails,$duepaymets,$amount,$custom_order_details,'left'));

        // $mpdf->Output();

        // $pdf = LaravelMpdf::loadView('invoice2',$data,compact('orders','orderDetails','duepaymets','amount','custom_order_details'));

        // return $pdf->stream("$fileName.pdf");
        # code...
    }




    public function invoice1($orders,$orderDetails,$duepaymets,$amount,$custom_order_details,$float){

        $html = "

        <style>
        @page {
            margin: 10px;
           }

        .memoborder{
            width: 49%;
        }

        .memobg {

            padding: 10px;
            position: relative;
            background: linear-gradient(42deg, rgba(163, 92, 33, 1) 0%, rgba(147, 61, 83, 1) 11%, rgba(67, 120, 108, 1) 24%, rgba(28, 140, 194, 1) 33%, rgba(88, 132, 157, 1) 42%, rgba(135, 119, 143, 1) 51%, rgba(162, 87, 145, 1) 61%, rgba(180, 126, 20, 1) 71%, rgba(190, 155, 49, 1) 80%, rgba(195, 113, 90, 1) 89%, rgba(111, 137, 52, 1) 98%);
            /* padding: 3px; */

        }
        .memo {
        //    width: 500px;
        //    margin:0 auto;
        //    padding:20px;
            background: white;

        }



        .memoHead {
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
            height: 18.5px;

        }
        .slNo{
            float: right;
            width: 300px;
        }
        </style>


    <div id='body'>

    <div class='memoborder' style='float:$float' >
    <div class='memobg memobg1'>
            <div class='memo'>
            <div class='memoHead'>
            <h1 class='companiname'>মেসার্স এলাহী ট্রেডার্স</h1>
            <p class='defalttext'>প্রোঃ শাহ্‌ আলম</p>
            <p class='defalttext'>বি. সি. আই. সি. অনুমদিত সার দিলার</p>
            <p class='defalttext address'>কালীগঞ্জ বাজার, দেবিগঞ্জ, পঞ্চগড় </p>
            <p class='defalttext'>মোবাইল নং : ০১৭৪০৯২৯৩০২ </p>

            <div style='display:flex; margin-top:20px'>

            </div>

        </div>

                <div class='memobody' style='position: relative;'>
                    <table width='100%' style='border: 1px solid #2F77A5;margin-bottom:20px' cellspacing='0'>
                        <tr>
                            <td style='background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;border-bottom:1px solid #2F77A5;text-align:left'
                                class='defaltfont'>নাম</td>
                            <td style='border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5;text-align:left'
                                class='defaltfont'>$orders->name</td>
                            <td width='10%'
                                style='background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;border-bottom:1px solid #2F77A5;text-align:left'
                                class='defaltfont'>ক্রমিক নং</td>
                            <td width='20%' style='border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5;text-align:left'
                                class='defaltfont'> $orders->orderId</td>
                        </tr>
                        <tr>
                            <td style='background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;text-align:left'
                                class='defaltfont'>ঠিকানা</td>
                            <td class='defaltfont' style='padding-left:6px;color:#2F77A5;text-align:left'> $orders->address</td>
                            <td style='background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;text-align:left'
                                class='defaltfont'>তারিখ</td>
                            <td class='defaltfont' style='padding-left:6px;color:#2F77A5;text-align:left'>$orders->order_date
                            </td>
                        </tr>
                    </table>
                    <div class='productDetails'>
                        <table class='table' style='border:1px solid #444B8F;width:100%' cellspacing='0'>
                            <thead class='thead'>
                                <tr class='tr'>
                                    <th class='th defaltfont' width='10%'>সংখ্যা</th>
                                    <th class='th defaltfont' width='45%'>বিবরন</th>
                                    <th class='th defaltfont' width='15%'>পরিমান</th>
                                    <th class='th defaltfont' width='15%'>দর</th>
                                    <th class='th defaltfont' width='15%'>টাকা</th>
                                </tr>
                            </thead>
                            <tbody class='tbody'>";


                                    $subtotal = $orders->sub_total;
                                    $totalpay = $orders->pay;
                                    $totaldue = $orders->due;
                                    $index = 1;

                                foreach($orderDetails as $product){
                                  $html .="  <tr class='tr'>
                                        <td class='td defaltfont'>".int_en_to_bn($index)."</td>
                                        <td class='td defaltfont'>$product->product_name</td>
                                        <td class='td defaltfont'>$product->product_quantity</td>
                                        <td class='td defaltfont'>$product->product_price</td>
                                        <td class='td defaltfont'>$product->sub_total</td>
                                    </tr>";

                                        $index++;
                                        // $subtotal += $product->pay;

                                }
                                foreach ($custom_order_details as $productCustom){
                                $html .=" <tr class='tr'>
                                        <td class='td defaltfont'>".int_en_to_bn($index)."</td>
                                        <td class='td defaltfont'>$productCustom->product_name</td>
                                        <td class='td defaltfont'>$productCustom->product_quantity
                                            $productCustom->product_quantity_type</td>
                                        <td class='td defaltfont'>$productCustom->product_price</td>
                                        <td class='td defaltfont'>$productCustom->sub_total</td>
                                    </tr>";

                                        $index++;
                                        // $subtotal += $productCustom->pay;

                                };

                                    $totalrow = 16-$index;
                                    for ($i=0; $i <$totalrow ; $i++) {
                                        $html .=" <tr class='tr'>
                                        <td class='td defaltfont'>".int_en_to_bn($i+$index)."</td>
                                        <td class='td defaltfont'></td>
                                        <td class='td defaltfont'></td>
                                        <td class='td defaltfont'></td>
                                        <td class='td defaltfont'></td>
                                    </tr>";
                                    }



                                $html .=" </tbody>
                            <tfoot class='tfoot'>";

if($duepaymets==0){



                            $html .="
                            <tr class='tr'>
                            <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> মোট </p></td>
                            <td class='td defaltfont'>$subtotal</td>
                    </tr>
                            <tr class='tr'>
                                    <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> জমা </p></td>
                                    <td class='td defaltfont'>$totalpay</td>
                            </tr>
                            <tr class='tr'>
                                    <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> বাকি </p></td>
                                    <td class='td defaltfont'>$totaldue</td>
                            </tr>

                            ";
                            }else{


                                $previousDue = 0;

                            foreach($duepaymets as $duepaymet){
                              $previousDue += $duepaymet->payment_amount;
                            }
$payable = $orders->pay-$previousDue;

                            $html .="
                            <tr class='tr'>
                            <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> মোট </p></td>
                            <td class='td defaltfont'>$subtotal</td>
                    </tr>
                            <tr class='tr'>
                                    <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> $orders->order_date </p></td>
                                    <td class='td defaltfont'>$payable</td>
                            </tr>";
                            foreach($duepaymets as $duepaymet){
                                $html .=" <tr class='tr'>
                                <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> $duepaymet->pay_date </p></td>
                                <td class='td defaltfont'>$duepaymet->payment_amount</td>
                                 </tr>";
                              }



                            $html .=" <tr class='tr'>
                                    <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> বাকি </p></td>
                                    <td class='td defaltfont'>$totaldue</td>
                            </tr>


                            ";
                            };







                                $html .=" </tfoot>
                        </table>
                        <p style='margin-top:15px;padding:0 15px' class='defaltfont'>কথাই : $amount</p>
                    </div>
                </div>
                <div class='memofooter' style='margin-top:25px'>
                    <p style='float:left;width:30%;padding:10px 15px' class='defaltfont'>ক্রেতার সাক্ষর</p>
                    <p style='float:right;width:30%;text-align:right;padding:10px 15px' class='defaltfont'>বিক্রেতার
                        সাক্ষর</p>
                </div>
            </div>
        </div>
        </div>
        </div>



        ";


        return $html;
    }



    public function invoice2($orders,$orderDetails,$duepaymets,$amount,$custom_order_details,$float){

        $html = "

        <style>
        @page {
         margin: 12px;
        }
        .memoborder{
            width: 49%;
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
                height: 18.5px;
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
    <div id='body'>


        <div class='memoborder' style='float:$float' >
        <div class='memobg memobg1'>
            <div class='memo'>
                <div class='memoHead'>
                <p class='defalttext'>বিসমিল্লাহির রাহমানির রাহিম</p>
                <table>
                    <tr>
                        <td width='155px'><img style='position:fixed;width:50px;top:0px;left:0px' src='".base64('m.png')."'></td>
                        <td><h1 class='companiname'> মেসার্স রনি ট্রেডার্স</h1></td>
                    </tr>
                </table>



                    <p class='defalttext name'>প্রোঃ মোঃ হাছেন আলী </p>
                    <p class='defalttext'>এখানে রাসায়নিক সার কীটনাশক ও বীজ বিক্রিয় করা হয়</p>
                    <p class='defalttext address'>কালীগঞ্জ বাজার, দেবিগঞ্জ, পঞ্চগড় </p>
                    <p class='defalttext' style='color:#6A4B5A'>মোবাইল নং : ০১৭৪০৯২৯৩০২, ০১৭৮৫৪৯৪২১৬ </p>
                </div>
                <div class='memobody' style='position: relative;'>
                    <table width='100%' style='border: 1px solid #2F77A5;margin-bottom:20px' cellspacing='0'>
                        <tr>
                            <td style='background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px;border-bottom:1px solid #2F77A5;'
                                class='defaltfont'>নাম</td>
                            <td style='border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5'
                                class='defaltfont'>$orders->name</td>
                            <td width='10%'
                                style='background:#2F77A5;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px;border-bottom:1px solid #2F77A5'
                                class='defaltfont'>ক্রমিক নং</td>
                            <td width='20%' style='border-bottom:1px solid #2F77A5;padding-left:6px;color:#2F77A5'
                                class='defaltfont'> $orders->orderId</td>
                        </tr>
                        <tr>
                            <td style='background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px'
                                class='defaltfont'>ঠিকানা</td>
                            <td class='defaltfont' style='padding-left:6px;color:#2F77A5'> $orders->address</td>
                            <td style='background:#935E6C;padding:10px 5px;color:white;padding:5px 5px;width:15%;float:left;position: fixed;top:0px'
                                class='defaltfont'>তারিখ</td>
                            <td class='defaltfont' style='padding-left:6px;color:#2F77A5'>$orders->order_date
                            </td>
                        </tr>
                    </table>
                    <div class='productDetails'>
                        <table class='table' style='border:1px solid #444B8F;width:100%' cellspacing='0'>
                            <thead class='thead'>
                                <tr class='tr'>
                                    <th class='th defaltfont' width='10%'>সংখ্যা</th>
                                    <th class='th defaltfont' width='45%'>বিবরন</th>
                                    <th class='th defaltfont' width='15%'>পরিমান</th>
                                    <th class='th defaltfont' width='15%'>দর</th>
                                    <th class='th defaltfont' width='15%'>টাকা</th>
                                </tr>
                            </thead>
                            <tbody class='tbody'>";


                            $subtotal = $orders->sub_total;
                            $totalpay = $orders->pay;
                            $totaldue = $orders->due;
                                    $index = 1;

                                foreach($orderDetails as $product){
                                  $html .="  <tr class='tr'>
                                        <td class='td defaltfont'>".int_en_to_bn($index)."</td>
                                        <td class='td defaltfont'>$product->product_name</td>
                                        <td class='td defaltfont'>$product->product_quantity</td>
                                        <td class='td defaltfont'>$product->product_price</td>
                                        <td class='td defaltfont'>$product->sub_total</td>
                                    </tr>";

                                        $index++;
                                        // $subtotal += $product->sub_total;

                                }
                                foreach ($custom_order_details as $productCustom){
                                $html .=" <tr class='tr'>
                                        <td class='td defaltfont'>".int_en_to_bn($index)."</td>
                                        <td class='td defaltfont'>$productCustom->product_name</td>
                                        <td class='td defaltfont'>$productCustom->product_quantity
                                            $productCustom->product_quantity_type</td>
                                        <td class='td defaltfont'>$productCustom->product_price</td>
                                        <td class='td defaltfont'>$productCustom->sub_total</td>
                                    </tr>";

                                        $index++;
                                        // $subtotal += $productCustom->sub_total;

                                };

                                $totalrow = 19-$index;
                                for ($i=0; $i <$totalrow ; $i++) {
                                    $html .=" <tr class='tr'>
                                    <td class='td defaltfont'>".int_en_to_bn($i+$index)."</td>
                                    <td class='td defaltfont'></td>
                                    <td class='td defaltfont'></td>
                                    <td class='td defaltfont'></td>
                                    <td class='td defaltfont'></td>
                                </tr>";
                                }





                                $html .=" </tbody>
                            <tfoot class='tfoot'>";

if($duepaymets==0){



                            $html .="
                            <tr class='tr'>
                            <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> মোট </p></td>
                            <td class='td defaltfont'>$subtotal</td>
                             </tr>
                            <tr class='tr'>
                                    <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> জমা </p></td>
                                    <td class='td defaltfont'>$totalpay</td>
                            </tr>
                            <tr class='tr'>
                                    <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> বাকি </p></td>
                                    <td class='td defaltfont'>$totaldue</td>
                            </tr>

                            ";
                            }else{


                                $previousDue = 0;

                            foreach($duepaymets as $duepaymet){
                              $previousDue += $duepaymet->payment_amount;
                            }
$payable = $orders->pay-$previousDue;

                    //         $html .="
                    //         <tr class='tr'>
                    //         <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> মোট </p></td>
                    //         <td class='td defaltfont'>$subtotal</td>
                    // </tr>

                    //     <tr class='tr'>

                    //   <td>জমা</td>
                    // <td  colspan='4' class='td defaltfont'>

                    //     <b> $orders->order_date :</b> $payable টাকা";
                    //     foreach($duepaymets as $duepaymet){
                    //         $html .=" <b> $duepaymet->pay_date :</b> $duepaymet->payment_amount টাকা";

                    //       };

                    //     $html .=" </td></td>";





                        $html .="
                        <tr class='tr'>
                        <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> মোট </p></td>
                        <td class='td defaltfont'>$subtotal</td>
                </tr>
                        <tr class='tr'>
                                <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> $orders->order_date </p></td>
                                <td class='td defaltfont'>$payable</td>
                        </tr>";
                        foreach($duepaymets as $duepaymet){
                            $html .=" <tr class='tr'>
                            <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> $duepaymet->pay_date </p></td>
                            <td class='td defaltfont'>$duepaymet->payment_amount</td>
                             </tr>";
                          }










                            $html .=" <tr class='tr'>
                                    <td colspan='4' class='defalttext td defaltfont'style='text-align:right;    padding: 0 13px;'><p> বাকি </p></td>
                                    <td class='td defaltfont'>$totaldue</td>
                            </tr>


                            ";
                            };
                $html .=" </tfoot>
                        </table>
                        <p style='margin-top:20px;padding:0 15px' class='defaltfont'>কথাই : $amount</p>
                    </div>
                </div>
                <div class='memofooter' style='margin-top:25px'>
                    <p style='float:left;width:30%;padding:10px 15px' class='defaltfont'>ক্রেতার সাক্ষর</p>
                    <p style='float:right;width:30%;text-align:right;padding:10px 15px' class='defaltfont'>বিক্রেতার
                        সাক্ষর</p>
                </div>
            </div>
        </div>
        </div>

    </div>


        ";


        return $html;
    }







}
