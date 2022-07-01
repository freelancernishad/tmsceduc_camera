<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\PosController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\api\CartController;
use  App\Http\Controllers\api\authController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\SalaryController;
use App\Http\Controllers\api\ExpenseController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\BuyingcompannyController;

/*
|--------------------------------------------------------------------------
| aPI Routes
|--------------------------------------------------------------------------
|
| Here is where you can register aPI routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your aPI!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





    // Route::prefix('')->group(function () {




        // Route::post('login', [authController::class, 'login']);
        // Route::post('register', [authController::class, 'register']);

        // Route::get('login', function () {
        //     return sent_error('Unauthorised', '', 401);
        // })->name('login');

        // Route::middleware('auth:api')->group(function () {

        //     Route::post('logout', [authController::class, 'logout']);


        //     Route::get('users', [authController::class, 'index']);
        //     Route::post('users/{id}/edit', [authController::class, 'Edit']);
        //     Route::delete('users/{id}/delete', [authController::class, 'delete']);
        //     Route::get('users/restore/{id}', [authController::class, 'restore']);
        //     Route::get('users/restore/', [authController::class, 'restoreAll']);
        //     Route::get('users/deleted/', [authController::class, 'deleted']);
        //     Route::get('users/{id}', [authController::class, 'show']);
        // });
    // });


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [authController::class,'login']);
    Route::post('register', [authController::class,'register']);
    Route::post('logout', [authController::class,'logout']);
    Route::post('refresh', [authController::class,'refresh']);
    Route::post('me', [authController::class,'login']);

});






Route::apiResources([
    'employee' => EmployeeController::class,
    'supplier' => SupplierController::class,
    'category' => CategoryController::class,
    'product' => ProductController::class,
    'expense' => ExpenseController::class,
    'customer' => CustomerController::class,
]);
Route::get('/companny',[BuyingcompannyController::class,'index']);


Route::get('/customers/search',[CustomerController::class,'search']);

Route::get('/products/all',[ProductController::class,'allproducts']);

Route::get('/products/search',[ProductController::class,'search']);
Route::get('/products/stockcheck',[ProductController::class,'stockCheck']);
Route::get('/products/expired',[ProductController::class,'expired']);
Route::get('/products/code',[ProductController::class,'productCodeGen']);

Route::get('/product_code/{product_code}',  [ProductController::class,'product_code']);
Route::get('/customer/due/{id}',  [CustomerController::class,'CustomerDue']);
Route::get('/due-order/{id}',  [OrderController::class,'DueOrder']);
Route::post('/due-order/{id}',  [OrderController::class,'DueOrderupdate']);

        // Route::apiResource('employee', 'api\EmployeeController');
        // Route::apiResource('supplier', 'api\SupplierController');
        // Route::apiResource('category', 'api\CategoryController');
        // Route::apiResource('product', 'api\ProductController');
        // Route::apiResource('expense', 'api\ExpenseController');
        // Route::apiResource('customer', 'api\CustomerController');

        // Salary Routes
        Route::post('/salary/paid/{id}', [SalaryController::class,'paid']);
        Route::get('/salary',  [SalaryController::class,'allSalary']);
        Route::get('/salary/{month}',  [SalaryController::class,'salaryByMonth']);
        Route::get('/edit-salary/{id}',  [SalaryController::class,'edit']);
        Route::post('/update-salary/{id}',  [SalaryController::class,'update']);

        //Stock Routes
        Route::patch('/stock/{id}', [ProductController::class,'updateStock']);

        //POS Route
        Route::get('/category/product/{id}', [PosController::class,'categoryProducts']);

        //Cart Routes
        Route::get('/cart/price/{id}/{price}', [CartController::class,'addToCartprice']);
        Route::get('/addToCart/{id}', [CartController::class,'addToCart']);
        Route::get('/cart-products', [CartController::class,'cartProducts']);
        Route::get('/cart/delete/{id}', [CartController::class,'cartDelete']);
        Route::get('/cart/increment/{id}', [CartController::class,'increment']);
        Route::get('/cart/decrement/{id}', [CartController::class,'decrement']);

        Route::get('/vat', [CartController::class,'vat']);

        // Order
        Route::get('/all-orders', [OrderController::class,'all_order']);
        Route::post('/order', [PosController::class,'order']);
        Route::get('/today-order', [OrderController::class,'todayOrder']);
        Route::get('/month-order', [OrderController::class,'monthOrder']);
        Route::get('/year-order', [OrderController::class,'yearOrder']);
        Route::get('/orders/{id}', [OrderController::class,'orders']);
        Route::get('/order/details/{id}', [OrderController::class,'orderDetails']);
        Route::get('/customorder/details/{id}', [OrderController::class,'custom_order_details']);
        Route::get('/order/duepay/{id}', [OrderController::class,'orderduepay']);

        // Dashboard Routes
        Route::get('/today/sell', [PosController::class,'todaySell']);
        Route::get('/today/income', [PosController::class,'todayIncome']);
        Route::get('/today/due', [PosController::class,'todayDue']);

        Route::get('/total/expense', [PosController::class,'expenses']);
        Route::get('/total/totalStock', [PosController::class,'totalStock']);
        Route::get('/total/totalStockAmount', [PosController::class,'totalStockAmount']);


        Route::get('/stockout/product', [PosController::class,'stockOut']);

        Route::get('/monthly/bar', [PosController::class,'monthlybar']);
        Route::get('/daily/bar', [PosController::class,'dailybar']);
        Route::get('/years/list', [PosController::class,'yearslist']);

        Route::post('/invoice/create', [InvoiceController::class,'store']);
        Route::get('/invoice', [InvoiceController::class,'index']);








