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

use Illuminate\Http\Request;

Route::group(['namespace' => 'App'], function () {
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::get('login', 'Auth\LoginController@getLoginForm');
    Route::post('login', 'Auth\LoginController@authenticate')->name('admin.login');

    Route::post('/cart/add', 'CartController@add')->name('cart.add');
    Route::post('/cart/remove', 'CartController@remove')->name('cart.remove');
    Route::get('/cart/checkout', 'CartController@show')->name('cart.show');


    Route::group(['middleware' => ['auth']], function () {
        Route::get('/account/setup', 'Account\AccountController@create')->name('account.create');
        Route::put('/account/setup', 'Account\AccountController@update')->name('account.update');


//        Route::group(['middleware' => []], function () {

            Route::post('/order/add', 'OrderController@placeOrder')->name('order.add');
            Route::post('/order/discard', 'OrderController@discard')->name('order.discard');

            Route::post('/account/order', 'Account\OrdersController@show')->name('account.order.show');

            Route::get('/account', function() {
                return redirect()->route('account.orders');
            })->name('account');
            Route::get('/account/orders', 'Account\OrdersController@index')->name('account.orders');

            Route::get('/account/profile', 'Account\ProfileController@edit')->name('account.profile');
            Route::put('/account/profile', 'Account\ProfileController@update')->name('account.profile.update');
            Route::get('/account/address', 'Account\AddressesController@index')->name('account.address');
            Route::get('/account/address/create', 'Account\AddressesController@create')->name('account.address.create');
            Route::post('/account/address', 'Account\AddressesController@store')->name('account.address.store');
            Route::get('/account/address/{id}/edit', 'Account\AddressesController@edit')->name('account.address.edit');
            Route::put('/account/address/{id}', 'Account\AddressesController@update')->name('account.address.update');
            Route::delete('/account/address/{id}', 'Account\AddressesController@delete')->name('account.address.destroy');
            Route::post('/account/address/{id}/default', 'Account\AddressesController@makeDefault')->name('account.address.default');




            Route::put('/account/address', 'Account\AccountController@edit')->name('account.address.update');
            Route::get('/account/password', 'Account\PasswordController@edit')->name('account.password');
            Route::put('/account/password', 'Account\PasswordController@update')->name('account.password.update');
//        });
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
//        Route::get('orders/{id}/edit', 'OrdersController@edit')->name('admin.orders.edit');
        Route::get('orders/{id}/approve', 'OrdersController@approve')->name('admin.orders.approve');
        Route::get('orders/{id}/reject', 'OrdersController@reject')->name('admin.orders.reject');
        Route::get('orders/{id}', 'OrdersController@show')->name('admin.orders.show');
        Route::put('orders/{id}', 'OrdersController@update');
        Route::delete('orders/{id}', 'OrdersController@destroy');

        Route::get('products', 'ProductsController@index')->name('admin.products');
        Route::post('products', 'ProductsController@store')->name('admin.products.store');
        Route::get('products/create', 'ProductsController@create')->name('admin.products.create');
        Route::get('products/{id}/edit', 'ProductsController@edit')->name('admin.products.edit');
//        Route::get('products/{id}', 'ProductsController@show')->name('admin.products.edit');
        Route::put('products/{id}', 'ProductsController@update')->name('admin.products.update');
        Route::delete('products/{id}', 'ProductsController@destroy')->name('admin.products.delete');


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
            Route::post('users', 'UsersController@store')->name('admin.users.store');
            Route::get('users/create', 'UsersController@create')->name('admin.users.create');
            Route::get('users/{id}', 'UsersController@edit')->name('admin.users.edit');
            Route::put('users/{id}', 'UsersController@update')->name('admin.users.update');
            Route::delete('users/{id}', 'UsersController@destroy')->name('admin.users.delete');


            Route::get('/account/profile', 'ProfileController@edit')->name('admin.account.profile');
            Route::put('/account/profile', 'ProfileController@update')->name('admin.account.profile.update');

            Route::get('/account/password', 'PasswordController@edit')->name('admin.account.password');
            Route::put('/account/password', 'PasswordController@update')->name('admin.account.password.update');
        });
    });
});

Route::get('attachments/{filename}', function($filename=null)
{

    $path = storage_path('app/attachments/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});



Route::get('/oauth/{provider}', 'Auth\AuthProviderController@redirectToProvider')->name('provider.redirect');
Route::get('/oauth/{provider}/callback', 'Auth\AuthProviderController@handleProviderCallback')->name('provider.callback');

Route::get('/facebook/javascript', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    try {
        $token = $fb->getJavaScriptHelper()->getAccessToken();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // Failed to obtain access token
        dd($e->getMessage());
    }

    // $token will be null if no cookie was set or no OAuth data
    // was found in the cookie's signed request data
    if (! $token) {

        // User hasn't logged in using the JS SDK yet
    }
});

Auth::routes();

