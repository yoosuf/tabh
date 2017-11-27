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


    Route::get('/account', 'AccountController@index')->name('account');
});







Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
