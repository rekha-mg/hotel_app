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

Route::get('/zomoto', function () {
    return view('message');
});

Route::get('/zomoto/food2', function () {
    return view('food2');
});

Route::get('/zomoto/food/{fid}', function () {
    return view('food/{fid}');
});


Route::get('/zomoto/first', function () {
    return view('first');
});

Route::get('/food', 'FoodController@showAll');
Route::get('/food2', 'FoodController@showFood');
Route::get('/food/{fid}', 'FoodController@showOne');
Route::post('/food', 'FoodController@insert');
Route::patch('/food/{food_id}', 'FoodController@edit');
Route::delete('/food/{food_id}', 'FoodController@deleteFood');

Route::get('/Orders', 'OrdersController@showAll');
Route::get('/Orders/{order_id}', 'OrdersController@showOne');
Route::post('/Orders', 'OrdersController@insert');
Route::patch('/Orders/{order_id}', 'OrdersController@edit');
Route::delete('Orders/{order_id}', 'OrdersController@destroy');

Route::get('/Users', 'UserController@showAll');
Route::get('/Users/{user_id}', 'UserController@showOne');
//Route::post('/Users', 'UserController@insert');
Route::patch('/Users/{user_id}', 'UserController@edit');
Route::delete('/Users/{user_id}', 'UserController@destroy');
