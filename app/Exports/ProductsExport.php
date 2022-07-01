<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('productExport', ['Products' =>  DB::table('products')->join('categories', 'products.category_id', 'categories.id')->select('products.*', 'categories.category_name')->orderBy('products.id', 'desc')->get()
        ]);
    }
}
