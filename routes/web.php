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


    Route::group(['middleware' => ['user']], function () {
        Route::get('/account', 'AccountController@index')->name('account');

    });
});







Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('login', 'Auth\LoginController@getLoginForm');
    Route::post('login', 'Auth\LoginController@authenticate');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', 'DashboardController@index');





        Route::group(['prefix' => 'settings'], function () {


            Route::get('partners', 'PartnersController@index');
            Route::post('partners', 'PartnersController@save');
            Route::get('partners/{id}/edit', 'PartnersController@edit');
            Route::put('partners/{id}', 'PartnersController@update');
            Route::delete('partners/{id}', 'PartnersController@destroy');


            Route::get('users', 'UsersController@index');
            Route::post('users', 'UsersController@save');
            Route::get('users/{id}/edit', 'UsersController@edit');
            Route::put('users/{id}', 'UsersController@update');
            Route::delete('users/{id}', 'UsersController@destroy');
        });





    });
});


Auth::routes();

