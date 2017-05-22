<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// product options
Route::get('/options/{product_id}', [
    'uses' => 'RequestController@getOptions'
]);
Route::post('/option', [
    'uses' => 'RequestController@postOption'
]);
Route::post('/option/delete/{item_id}', [
    'uses' => 'RequestController@deleteOption'
]);
Route::post('/order/{order_id}', [
    'uses' => 'RequestController@updateOrderStatus'
]);
// product quantity
Route::get('/stock/{opt}', [
    'uses' => 'RequestController@getStock',
    'name' => 'api_get_stock'
]);
Route::post('/stock', [
    'uses' => 'RequestController@updateStock',
    'name' => 'api_update_stock'
]);