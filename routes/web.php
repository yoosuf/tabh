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

Route::group(['namespace' => 'App'], function ($route) {
    $route->get('/', 'PagesController@index')->name('home');
    $route->get('search', 'SearchController@index')->name('search');
    $route->get('login', 'Auth\LoginController@getLoginForm');
    $route->post('login', 'Auth\LoginController@authenticate')->name('admin.login');

    $route->post('cart/add', 'CartController@add')->name('cart.add');
    $route->post('cart/remove', 'CartController@remove')->name('cart.remove');
    $route->get('cart/checkout', 'CartController@show')->name('cart.show');

    $route->get('checkouts', 'OrderController@summery');

    $route->get('products', 'SearchController@titles');

    $route->group(['middleware' => ['auth']], function ($route) {

        $route->post('coupon-code', 'CouponController@validateCouponCode')->name('code.validate');

        $route->post('order/prescription', 'OrderController@placeOrder')->name('order.prescription.upload');
        $route->post('order/add', 'OrderController@placeOrder')->name('order.add');
        $route->get('order/discard', 'OrderController@discard')->name('order.discard');

        $route->get('account', function () {
            return redirect()->route('account.orders');
        })->name('account');

        $route->get('account/orders', 'Account\OrdersController@index')->name('account.orders');
        $route->get('account/orders/{id}', 'Account\OrdersController@show')->name('account.orders.show');

        $route->get('account/promos', 'Account\PromoController@index')->name('account.promos');
        $route->post('account/promos', 'Account\PromoController@index')->name('account.promos.invite');

        $route->get('account/profile', 'Account\ProfileController@edit')->name('account.profile');
        $route->put('account/profile', 'Account\ProfileController@update')->name('account.profile.update');
        $route->get('account/address', 'Account\AddressesController@index')->name('account.address');
        $route->get('account/address/create', 'Account\AddressesController@create')->name('account.address.create');
        $route->post('account/address', 'Account\AddressesController@store')->name('account.address.store');
        $route->delete('account/address/{id}', 'Account\AddressesController@delete')->name('account.address.destroy');
        $route->put('account/address/{id}', 'Account\AddressesController@update')->name('account.address.update');
        $route->get('account/address/{id}/edit', 'Account\AddressesController@edit')->name('account.address.edit');
        $route->post('account/address/{id}/default', 'Account\AddressesController@makeDefault')->name('account.address.default');
        $route->get('account/password', 'Account\PasswordController@edit')->name('account.password');
        $route->put('account/password', 'Account\PasswordController@update')->name('account.password.update');
    });
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function ($route) {
    $route->get('login', 'Auth\LoginController@getLoginForm');
    $route->post('login', 'Auth\LoginController@authenticate')->name('admin.login');

    $route->group(['middleware' => ['admin']], function ($route) {

        $route->post('logout', 'Auth\LoginController@getLogout')->name('admin.logout');
        $route->get('/', 'DashboardController@index')->name('admin.dashboard');

        $route->get('orders', 'OrdersController@index')->name('admin.orders');
        $route->post('orders', 'OrdersController@save');
        $route->get('orders/{id}/approve', 'OrdersController@approve')->name('admin.orders.approve');
        $route->get('orders/{id}/reject', 'OrdersController@reject')->name('admin.orders.reject');
        $route->get('orders/{id}/change_status', 'OrdersController@change_status')->name('admin.orders.change_status');
        $route->get('orders/{id}', 'OrdersController@show')->name('admin.orders.show');
        $route->put('orders/{id}', 'OrdersController@update');
        $route->delete('orders/{id}', 'OrdersController@destroy');

        $route->get('products', 'ProductsController@index')->name('admin.products');
        $route->post('products', 'ProductsController@store')->name('admin.products.store');
        $route->get('products/create', 'ProductsController@create')->name('admin.products.create');
        $route->get('products/{id}/edit', 'ProductsController@edit')->name('admin.products.edit');
        $route->put('products/{id}', 'ProductsController@update')->name('admin.products.update');
        $route->delete('products/{id}', 'ProductsController@destroy')->name('admin.products.delete');

        $route->get('customers', 'CustomersController@index')->name('admin.customers');
        $route->post('customers', 'CustomersController@store')->name('admin.customers.store');
        $route->get('customers/create', 'CustomersController@create')->name('admin.customers.create');
        $route->get('customers/{id}/edit', 'CustomersController@edit')->name('admin.customers.edit');
        $route->get('customers/{id}', 'CustomersController@edit')->name('admin.customers.show');
        $route->put('customers/{id}', 'CustomersController@update')->name('admin.customers.update');
        $route->delete('customers/{id}', 'CustomersController@destroy')->name('admin.customers.delete');

        $route->get('files', 'AttachmentsController@index')->name('admin.files');

        $route->group(['prefix' => 'settings'], function ($route) {

            $route->get('partners', 'PartnersController@index')->name('admin.partners');
            $route->post('partners', 'PartnersController@store')->name('admin.partners.store');
            $route->get('partners/create', 'PartnersController@create')->name('admin.partners.create');
            $route->get('partners/{id}/edit', 'PartnersController@edit')->name('admin.partners.edit');
            $route->put('partners/{id}', 'PartnersController@update')->name('admin.partners.update');
            $route->delete('partners/{id}', 'PartnersController@destroy')->name('admin.partners.delete');

            $route->get('users', 'UsersController@index')->name('admin.users');
            $route->post('users', 'UsersController@store')->name('admin.users.store');
            $route->get('users/create', 'UsersController@create')->name('admin.users.create');
            $route->get('users/{id}', 'UsersController@edit')->name('admin.users.edit');
            $route->put('users/{id}', 'UsersController@update')->name('admin.users.update');
            $route->delete('users/{id}', 'UsersController@destroy')->name('admin.users.delete');

            $route->get('coupons', 'CouponsController@index')->name('admin.coupons');
            $route->post('coupons', 'CouponsController@store')->name('admin.coupons.store');
            $route->get('coupons/create', 'CouponsController@create')->name('admin.coupons.create');
            $route->get('coupons/{id}', 'CouponsController@edit')->name('admin.coupons.edit');
            $route->put('coupons/{id}', 'CouponsController@update')->name('admin.coupons.update');
            $route->delete('coupons/{id}', 'CouponsController@destroy')->name('admin.coupons.delete');

            $route->get('account/profile', 'ProfileController@edit')->name('admin.account.profile');
            $route->put('account/profile', 'ProfileController@update')->name('admin.account.profile.update');

            $route->get('account/password', 'PasswordController@edit')->name('admin.account.password');
            $route->put('account/password', 'PasswordController@update')->name('admin.account.password.update');
        });
    });
});

Route::get('attachments/{filename}', function ($filename = null) {

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


Route::get('oauth/{provider}', 'Auth\AuthProviderController@redirectToProvider')->name('provider.redirect');
Route::get('oauth/{provider}/callback', 'Auth\AuthProviderController@handleProviderCallback')->name('provider.callback');

Auth::routes();
