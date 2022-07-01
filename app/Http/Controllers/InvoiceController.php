<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
use Rakibhstu\Banglanumber\NumberToBangla;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = QueryBuilder::for(Invoice::class)
        ->allowedFilters([

            AllowedFilter::exact('date'),
            AllowedFilter::exact('type'),
       AllowedFilter::exact('id'),
       'customer_name',
       'address',
       'Invoices',
       'total_amount',



        ])

        ->orderBy('id', 'DESC');



            $result= $datas->get();









    return response()->json($result);
    }




    public function invoice(Request $request,$id)
    {

          $orders = Invoice::find($id);


//         print_r($orderDetails);
//  die();





$numto = new NumberToBangla();
$amount = $numto->bnMoney($orders->total_amount);

        $fileName = 'Invoice-'.date('Y-m-d H:m:s');

        $data['fileName'] = $fileName;

        $pdf = LaravelMpdf::loadView('invoice2',$data,compact('orders','amount'));
        return $pdf->stream("$fileName.pdf");
        # code...
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $data = [
        'Invoices'=> json_encode($request->Invoices),
        'address'=> $request->address,
        'customer_name'=> $request->customer_name,
        'date'=> $request->date,
        'type'=> $request->type,
       ];
        $total_amount = 0;
        foreach ($request->Invoices as $key => $value) {
        $total_amount += $value['weight_quantity']*$value['price'];
        }
        $data['total_amount'] = $total_amount;

        return Invoice::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
