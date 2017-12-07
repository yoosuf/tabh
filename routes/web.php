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
    Route::get('login', 'Auth\LoginController@getLoginForm');
    Route::post('login', 'Auth\LoginController@authenticate')->name('admin.login');
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/account/setup', 'Account\AccountController@create')->name('account.create');
        Route::put('/account/setup', 'Account\AccountController@update')->name('account.update');


        Route::group(['middleware' => ['completed']], function () {
            Route::get('/account', function() {
                return redirect()->route('account.orders');
            })->name('account');
            Route::get('/account/orders', 'Account\OrdersController@index')->name('account.orders');

            Route::get('/account/profile', 'Account\ProfileController@edit')->name('account.profile');
            Route::put('/account/profile', 'Account\ProfileController@update')->name('account.profile.update');
            Route::get('/account/address', 'Account\AddressesController@index')->name('account.address');
            Route::post('/account/address', 'Account\AccountController@create')->name('account.address.store');
            Route::delete('/account/address/id', 'Account\AccountController@delete')->name('account.address.destroy');



            Route::put('/account/address', 'Account\AccountController@edit')->name('account.address.update');
            Route::get('/account/password', 'Account\PasswordController@edit')->name('account.password');
            Route::put('/account/password', 'Account\PasswordController@update')->name('account.password.update');
        });
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
        Route::post('customers', 'CustomersController@store')->name('admin.customers.store');
        Route::get('customers/create', 'CustomersController@create')->name('admin.customers.create');
        Route::get('customers/{id}/edit', 'CustomersController@edit')->name('admin.customers.edit');
        Route::get('customers/{id}', 'CustomersController@edit')->name('admin.customers.show');
        Route::put('customers/{id}', 'CustomersController@update')->name('admin.customers.update');
        Route::delete('customers/{id}', 'CustomersController@destroy')->name('admin.customers.delete');


        Route::group(['prefix' => 'settings'], function () {

            Route::get('partners', 'PartnersController@index')->name('admin.partners');
            Route::post('partners', 'PartnersController@store')->name('admin.partners.store');
            Route::get('partners/create', 'PartnersController@create')->name('admin.partners.create');
            Route::get('partners/{id}/edit', 'PartnersController@edit')->name('admin.partners.edit');
            Route::put('partners/{id}', 'PartnersController@update')->name('admin.partners.update');
            Route::delete('partners/{id}', 'PartnersController@destroy')->name('admin.partners.delete');


            Route::get('users', 'UsersController@index')->name('admin.users');
            Route::post('users', 'UsersController@store');
            Route::get('users/create', 'UsersController@create')->name('admin.users.create');
            Route::get('users/{id}', 'UsersController@edit')->name('admin.users.edit');
            Route::put('users/{id}', 'UsersController@update');
            Route::delete('users/{id}', 'UsersController@destroy');
        });
    });
});

Route::get('attachments/{filename}', function($filename=null)
{
    $path = storage_path().'/app/attachments/'.$filename;
    if (file_exists($path)) {
        return Response::download($path);
    }
    else{
        $errors = collect(['Attachment not found',$path]);
        return redirect()->back()->with('errors', $errors);
    }
});



Route::get('/oauth/{provider}', 'Auth\AuthProviderController@redirectToProvider')->name('provider.redirect');
Route::get('/oauth/{provider}/callback', 'Auth\AuthProviderController@handleProviderCallback')->name('provider.callback');

Auth::routes();

