<?php

use App\Models\Orders;
use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\chartsController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\OrdersChartController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=> ['auth','admin']], function(){

    Route::get('/', function () {
    return view('admin.adminpage');
    });

    Route::get('/admin/charts', [chartsController::class, 'ordersCount'])->name('admin.charts');

    Route::get('test', function(){
        return App\Models\Customers::with('orders')->get();
    });
    Route::get('test1', function(){
        return App\Models\Orders::with('products')->get();
    });

    // Route::get('/admin/barchart', [OrdersChartController::class, 'getOrdersData']);




    Route::post('/tables/createOrders', [orderController::class, 'add'])->name('/tables/createOrders');
    Route::get('/tables/createOrders', [orderController::class, 'create']);
    Route::get('/tables/orders', [orderController::class, 'index']);
    Route::get('/tables/editOrders/{id}', [orderController::class, 'edit']);
    Route::post('/tables/editOrders/{id}', [orderController::class, 'update']);  
    Route::get('/tables/details/delete/{id}', [orderController::class, 'destroy']); 
    Route::post('/tables/details/{id}', [orderController::class, 'action']);
    Route::get('/tables/details/{id}', [orderController::class, 'details']);


    Route::get('/products/main', [productsController::class, 'index']);
    Route::get('/products/createProducts', [productsController::class, 'create']);
    Route::post('/products/createProducts', [productsController::class, 'store']);  
    Route::get('/products/main/delete/{id}', [productsController::class, 'destroy']); 
    Route::get('/products/editProducts/{id}', [productsController::class, 'edit']);
    Route::post('/products/editProducts/{id}', [productsController::class, 'update']); 
    


    Route::get('customers/main', [customerController::class, 'index']);
    Route::get('customers/createCustomers', [customerController::class, 'create']);
    Route::post('customers/createCustomers', [customerController::class, 'store']);
    Route::get('customers/main/delete/{id}', [customerController::class, 'destroy']); 
    Route::get('customers/editCustomers/{id}', [customerController::class, 'edit']);
    Route::post('customers/editCustomers/{id}', [customerController::class, 'update']);

});

Route::get('passwords.email', [ForgotPasswordController::class, 'resetLink']);
Route::get('passwords.email', [ForgotPasswordController::class, 'index']);
Route::post('passwords.email', [ForgotPasswordController::class, 'resetLink']);
