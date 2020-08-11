<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/product/create', 'ProductController@store');
Route::get('/products/{api}', 'ProductController@list');
Route::get('/cash-register/{barcode}', 'CashRegisterController@show');
Route::post('/cash-register/receipt/create', 'CashRegisterController@receipt');
Route::post('/cash-register/receipt/{receipt_id}/add-product', 'CashRegisterController@receipt_product');
Route::post('/cash-register/receipt-product/{receipt_product_id}/change-amount', 'CashRegisterController@change_receipt_product');
Route::post('/cash-register/receipt/{receipt_id}/close', 'CashRegisterController@close_receipt');
Route::get('/cash-register/receipt/{receipt_id}/list', 'CashRegisterController@receipt_list');

Route::get('/', function () {
    return view('welcome');
});
