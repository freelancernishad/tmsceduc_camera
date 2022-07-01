<?php

namespace App\Http\Controllers\api;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function CustomerDue($id)
    {
        $order = DB::table('orders')->where('customer_id',$id)->sum('due');
        return response()->json($order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
            // 'email' => 'required',
            'phone' => 'required|unique:customers',
        ]);

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().'.'.$ext;
            $img = Image::make($request->photo)->resize(240, 200);

            $upload_path = 'backend/customer/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->photo = $image_url;
            $customer->save();
        } else {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:80',
            // 'email' => 'required',
            'phone' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        if ($image = $request->newPhoto) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().'.'.$ext;
            $img = Image::make($image)->resize(240, 200);

            $upload_path = 'backend/customer/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            if ($customer->photo) {
                unlink($customer->photo);

                $customer->photo = $image_url;
                $customer->save();
            } else {
                $customer->photo = $image_url;
                $customer->save();
            }

        } else {
            $customer->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $photo = $customer->photo;

        if ($photo) {
            unlink($photo);
            $customer->delete();
        }else{
            $customer->delete();
        }
    }





    public function search(Request $request)
    {
        $data = $request->data;
        $columns = ['name','phone'];
        $result =  Customer::select('*');
                foreach($columns as $column)
                {
                  $result->orWhere($column, 'like','%'.$data.'%');
                }
       $data = $result->get();

        return response()->json($data);
    }








}

