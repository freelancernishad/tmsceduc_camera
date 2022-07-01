<?php

namespace App\Http\Controllers;

use App\Models\Buyingcompanny;
use Illuminate\Http\Request;

class BuyingcompannyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Buyingcompanny = Buyingcompanny::all();

        return response()->json($Buyingcompanny);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buyingcompanny  $buyingcompanny
     * @return \Illuminate\Http\Response
     */
    public function show(Buyingcompanny $buyingcompanny)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buyingcompanny  $buyingcompanny
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyingcompanny $buyingcompanny)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyingcompanny  $buyingcompanny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyingcompanny $buyingcompanny)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buyingcompanny  $buyingcompanny
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyingcompanny $buyingcompanny)
    {
        //
    }
}
