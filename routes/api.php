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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

Route::get('/options/{product_id}', [
    'uses' => 'RequestController@getOptions'
]);

Route::post('/option', [
    'uses' => 'RequestController@postOption'
]);

Route::post('/option/delete/{item_id}', [
    'uses' => 'RequestController@deleteOption'
]);