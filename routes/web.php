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
Route::get('/catalog/{slug}', 'SiteController@category')->name('site_category');
Route::get('/{slug}', 'SiteController@page')->name('site_page');

Auth::routes();

/* orders */
Route::get('/admin', 'OrderController@index');
Route::get('/admin/orders', 'OrderController@index');
/* category */
Route::get('/admin/category', 'CategoryController@index')
    ->name('category_list');
Route::get('/admin/category/add', 'CategoryController@create');
Route::post('/admin/category/add', 'CategoryController@create')
    ->name('category_add');
Route::any('/admin/category/edit/{id}', 'CategoryController@update')
    ->name('category_edit');
/* page */
Route::get('/admin/page', 'PageController@index')
    ->name('page_list');
Route::get('/admin/page/add', 'PageController@create');
Route::post('/admin/page/add', 'PageController@create')
    ->name('page_add');
Route::any('/admin/page/edit/{id}', 'PageController@update')
    ->name('page_edit');
