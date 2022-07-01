<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProductController;
use Meneses\LaravelMpdf\Facades\LaravelMpdf;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/memo', function () {



    $fileName = 'Invoice-'.date('Y-m-d H:m:s');

    $data['fileName'] = $fileName;

    $pdf = LaravelMpdf::loadView('invoice1',$data);
    return $pdf->stream("$fileName.pdf");

    // return view('invoice1');

});

// Auth::routes();

// Route::group(['middleware' => ['is_admin']], function() {
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// Route::group(['middleware' => ['CustomerMiddleware']], function() {
// Route::get('/sub', [App\Http\Controllers\HomeController::class, 'sub'])->name('sub');
// });



    Route::get('product/export',[ProductController::class,'export']);
    Route::get('invoice/{id}',[OrderController::class,'invoice']);
    Route::get('/custom/invoice/{id}',[InvoiceController::class,'invoice']);




Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');


