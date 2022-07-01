<?php
namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

     public function qty_counting($product_id){

    $product = DB::table('products')->where('id', $product_id)->first();
    $pos = DB::table('pos')->where('product_id', $product_id)->first();




     return $pos;

    }
public function addToCartprice($id,$price)
{


    // $quantity = DB::table('pos')->where('id', $id)->decrement('product_quantity');

    $product = DB::table('pos')->where('id', $id)->first();

    $sub_total = $price * $product->product_quantity;


    DB::table('pos')->where('id', $id)->update(['product_price' => $price,'sub_total' => $sub_total]);



    $product_id = $product->product_id;
    $products = DB::table('products')->where('id', $product_id)->first();
    $product_quantity =  $products->product_quantity;

    $product_quantity_stock_update = $product_quantity -$product->product_quantity;

    return response()->json($product_quantity_stock_update);

}


	public function addToCart($id)
	{

        // return response()->json($this->qty_counting($id));


        $product = DB::table('products')->where('id', $id)->first();
        $product_quantity =  $product->product_quantity;
        if($product_quantity<=0){
            return response()->json($product_quantity);
        }

		 $exist_product = DB::table('pos')->where('product_id', $id)->first();

		if ($exist_product) {


            return response()->json('Product already Added');
			$product = DB::table('pos')->where('product_id', $id)->first();
             $product_quantity_stock = $product_quantity -$product->product_quantity;
             if($product_quantity_stock<=0){
                return response()->json($product_quantity_stock);
             }else{

            DB::table('pos')->where('product_id', $id)->increment('product_quantity');



            $sub_total = $product->product_price * $product->product_quantity;
			DB::table('pos')->where('product_id', $id)->update(['sub_total' => $sub_total]);

            $product_update = DB::table('pos')->where('product_id', $id)->first();
            $product_quantity_stock_update = $product_quantity -$product_update->product_quantity;

            return response()->json($product_quantity_stock_update);
             }
			// $product = Product::find($id);
			// $product->product_quantity -= 1;
			// $product->save();
		} else {
            $product = DB::table('products')->where('id', $id)->first();
			$data = [];
			$data['product_id'] = $id;
			$data['product_name'] = $product->product_name;
			$data['brand'] = $product->root;
			$data['product_quantity'] = 1;
			$data['buying_price'] = $product->buying_price;
			$data['product_price'] = $product->selling_price;
			$data['sub_total'] = $product->selling_price;
			DB::table('pos')->insert($data);
             return response()->json($product_quantity-1);
		}

	}

	public function cartProducts()
	{
		$products = DB::table('pos')->get();
		return response()->json($products);
	}

	public function cartDelete($id)
	{
		DB::table('pos')->where('id', $id)->delete();
		return response('Done');
	}

	public function increment($id)
	{
		$product = DB::table('pos')->where('id', $id)->first();
        // return response()->json($product);
        $product_id = $product->product_id;
        $products = DB::table('products')->where('id', $product_id)->first();
        $product_quantity =  $products->product_quantity;
        if($product_quantity<=0){
            return response()->json($product_quantity);
        }




             $product_quantity_stock = $product_quantity -$product->product_quantity;
             if($product_quantity_stock<=0){
                return response()->json($product_quantity_stock);
             }else{

            DB::table('pos')->where('id', $id)->increment('product_quantity');

            $product = DB::table('pos')->where('id', $id)->first();

            $sub_total = $product->product_price * $product->product_quantity;

			DB::table('pos')->where('id', $id)->update(['sub_total' => $sub_total]);

            return response()->json($sub_total);
            $product_update = DB::table('pos')->where('id', $id)->first();
            $product_quantity_stock_update = $product_quantity -$product_update->product_quantity;

            return response()->json($product_quantity_stock_update);
             }









		// $quantity = DB::table('pos')->where('id', $id)->increment('product_quantity');

		// $product = DB::table('pos')->where('id', $id)->first();
		// $sub_total = $product->product_price * $product->product_quantity;
		// DB::table('pos')->where('id', $id)->update(['sub_total' => $sub_total]);




	}

	public function decrement($id)
	{









		$quantity = DB::table('pos')->where('id', $id)->decrement('product_quantity');

		$product = DB::table('pos')->where('id', $id)->first();
		$sub_total = $product->product_price * $product->product_quantity;
		DB::table('pos')->where('id', $id)->update(['sub_total' => $sub_total]);



        $product_id = $product->product_id;
        $products = DB::table('products')->where('id', $product_id)->first();
        $product_quantity =  $products->product_quantity;

        $product_quantity_stock_update = $product_quantity -$product->product_quantity;

        return response()->json($product_quantity_stock_update);




	}

	public function vat()
	{
		$vat = DB::table('extra')->first();
		return response()->json($vat);
	}
}
