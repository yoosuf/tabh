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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::group(['prefix' => 'v1'], function ($route) {

    $route->post('register', 'Api\V1\RegisterController@register');
    $route->post('login', 'Api\V1\AuthController@authenticate');
    $route->post('reset', 'Api\V1\EmailPasswordController@reset');


    $route->get('me', 'Api\V1\ProfileController@me');
    $route->put('account/profile', 'Api\V1\ProfileController@update');
    $route->put('account/email', 'Api\V1\AccountEmailController@update');
    $route->put('account/password', 'Api\V1\PasswordController@update');

    $route->get('addresses', 'Api\V1\AddressesController@index');
    $route->post('addresses', 'Api\V1\AddressesController@store');
    $route->get('addresses/{id}', 'Api\V1\AddressesController@show');
    $route->put('addresses/{id}', 'Api\V1\AddressesController@update');
    $route->delete('addresses/{id}', 'Api\V1\AddressesController@destroy');
    $route->post('addresses/{id}/default', 'Api\V1\AddressesController@setDefault');


    $route->get('cart', 'Api\V1\CartController@index');
    $route->post('cart', 'Api\V1\CartController@store');
    $route->get('cart/search', 'Api\V1\CartController@search');
    $route->put('cart/{id}', 'Api\V1\CartController@update');
    $route->delete('cart/{id}', 'Api\V1\CartController@destroy');

    $route->get('orders', 'Api\V1\OrderController@index');
    $route->post('orders', 'Api\V1\OrderController@store');
    $route->get('orders/search', 'Api\V1\OrderController@search');
    $route->get('orders/{id}', 'Api\V1\OrderController@show');
    $route->put('orders/{id}', 'Api\V1\OrderController@update');


    $route->get('search', 'Api\V1\SearchController@index');
    $route->get('search/suggestions', 'Api\V1\SearchController@suggestion');

});



