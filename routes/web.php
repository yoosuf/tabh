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

Route::group(['namespace' => 'App'], function () {
    Route::get('/', 'PagesController@index');
    Route::get('/search', 'SearchController@index')->name('search');



    Route::group(['middleware' => ['auth']], function () {
        Route::get('/account', 'AccountController@index')->name('account');
    });
});




Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('login', 'Auth\LoginController@getLoginForm');
    Route::post('login', 'Auth\LoginController@authenticate')->name('admin.login');

    Route::group(['middleware' => ['admin']], function () {

        Route::post('logout', 'Auth\LoginController@getLogout')->name('admin.logout');

        Route::get('/', 'DashboardController@index')->name('admin.dashboard');



        Route::get('orders', 'OrdersController@index')->name('admin.orders');
        Route::post('orders', 'OrdersController@save');
        Route::get('orders/{id}/edit', 'OrdersController@edit');
        Route::put('orders/{id}', 'OrdersController@update');
        Route::delete('orders/{id}', 'OrdersController@destroy');



        Route::get('products', 'ProductsController@index')->name('admin.products');
        Route::post('products', 'ProductsController@store');
        Route::get('products/create', 'ProductsController@create');
        Route::get('products/{id}/edit', 'ProductsController@edit');
        Route::get('products/{id}', 'ProductsController@show');
        Route::put('products/{id}', 'ProductsController@update')->name('admin.products.update');
        Route::delete('products/{id}', 'ProductsController@destroy');


        Route::get('customers', 'CustomersController@index')->name('admin.customers');
        Route::post('customers', 'CustomersController@save');
        Route::get('customers/{id}/edit', 'CustomersController@edit');
        Route::put('customers/{id}', 'CustomersController@update');
        Route::delete('customers/{id}', 'CustomersController@destroy');


        Route::group(['prefix' => 'settings'], function () {

            Route::get('partners', 'PartnersController@index')->name('admin.partners');
            Route::post('partners', 'PartnersController@save');
            Route::get('partners/{id}/edit', 'PartnersController@edit');
            Route::put('partners/{id}', 'PartnersController@update');
            Route::delete('partners/{id}', 'PartnersController@destroy');


            Route::get('users', 'UsersController@index')->name('admin.users');
            Route::post('users', 'UsersController@save');
            Route::get('users/{id}/edit', 'UsersController@edit');
            Route::put('users/{id}', 'UsersController@update');
            Route::delete('users/{id}', 'UsersController@destroy');
        });
    });
});



Route::get('/oauth/{provider}', 'Auth\AuthProviderController@redirect')->name('provider.redirect');
Route::get('/oauth/{provider}/callback', 'Auth\AuthProviderController@callback')->name('provider.callback');

Auth::routes();
