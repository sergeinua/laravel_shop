<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'SiteController@index');

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/admin/orders', 'OrderController@index');

Route::get('/admin/category', 'CategoryController@index')
    ->name('category_list');
Route::get('/admin/category/add', 'CategoryController@create');
Route::post('/admin/category/add', 'CategoryController@create')->name('category_add');
Route::any('/admin/category/edit/{id}', 'CategoryController@update')->name('category_edit');
