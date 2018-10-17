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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List Product
Route::get('product', 'ProductsController@index');

//List single Products
Route::get('product/{id}', 'ProductsController@show');

//Create new Products
Route::post('product', 'ProductsController@store');

//Update Products
Route::put('product', 'ProductsController@store');

//Delete Products
Route::delete('product/{id}', 'ProductsController@destroy');