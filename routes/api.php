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



Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1'], function ($route) {

    $route->post('register', 'RegisterController@register');
    $route->post('login', 'AuthController@authenticate');
    $route->post('reset', 'EmailPasswordController@reset');

    $route->get('me', 'ProfileController@me');
    $route->put('account/profile', 'ProfileController@update');
    $route->put('account/email', 'AccountEmailController@update');
    $route->put('account/password', 'PasswordController@update');

    $route->get('addresses', 'AddressesController@index');
    $route->post('addresses', 'AddressesController@store');
    $route->get('addresses/{id}', 'AddressesController@show');
    $route->put('addresses/{id}', 'AddressesController@update');
    $route->delete('addresses/{id}', 'AddressesController@destroy');
    $route->post('addresses/{id}/default', 'AddressesController@setDefault');

    $route->get('cart', 'CartController@index');
    $route->post('cart', 'CartController@store');
    $route->get('cart/search', 'CartController@search');
    $route->put('cart/{id}', 'CartController@update');
    $route->delete('cart/{id}', 'CartController@destroy');

    $route->get('orders', 'OrderController@index');
    $route->post('orders', 'OrderController@store');
    $route->get('orders/search', 'OrderController@search');
    $route->get('orders/{id}', 'OrderController@show');
    $route->put('orders/{id}', 'OrderController@update');

    $route->get('search', 'SearchController@index');



    $route->get('search/suggestions', 'SearchController@suggestion');
});






