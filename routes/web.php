<?php

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
    return view('welcome');
});

Auth::routes();


Route::resource('ajaxusers','UserAjaxController');
Route::resource('user', 'UserController');
Route::resource('product', 'ProductController');
Route::post('product/{id}', 'AddToCartController@addToCart')->name('addtocart');
Route::get('viewCart', 'AddToCartController@index');
Route::delete('viewCart/{id}', 'AddToCartController@destroy')->name('deletecart');
//image upload
// Route::get('createProduct','ImageUploadController@create');
// Route::post('createProduct','ImageUploadController@store');

