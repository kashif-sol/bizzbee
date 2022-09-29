<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowSyncData;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Webhook;
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
Route::get('/home',[ShowSyncData::class,"show"]);
Route::get('/testapi', [ShowSyncData::class,"testApiCall"]);
Route::post('/verifyApi',[VerifyController::class,"verifyData"]);
Route::post('/cancelorder', [OrderStatusController::class,"cancelOrder"]);
Route::post('/fulfillorder',[OrderStatusController::class,"fulfillOrder"]);
Route::post('/stockorder',[OrderStatusController::class,"stockOrder"]);
Route::group(['middleware' => 'verify.shopify'], function () {
Route::get('/',[ShopController::class,"getData"])->name('home');
Route::get('orders',[OrderController::class ,"index"]);
Route::get('orderid/{arr}',[OrderController::class,'getOrderID']);
});

Route::get('/webhook', [Webhook::class,"create"]);
Route::get('/customers/data_request', function () {
    
});

Route::get('/customers/redact', function () {
    
});

Route::get('/shop/redact', function () {
    
});
 
 
 
