<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'category_id', 'supplier_id','product_name','product_code','root','buying_price','selling_price','buying_date','expired_date','image','product_quantity'
    ];
}
