<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'CustomerController@index')->name('home');

Route::get('/login', 'GuestUserController@login')->name('customer.login');
Route::post('/login', 'GuestUserController@postLogin')->name('customer.postLogin');
Route::get('/register', 'GuestUserController@register')->name('customer.register');
Route::post('/register', 'GuestUserController@postRegister')->name('customer.postRegister');

Route::get('/admin/login', 'AdminController@login')->name('loginAdmin');
Route::post('/admin/login', 'AdminController@postLogin')->name('postLogin');
Route::get('/admin/register', 'AdminController@register')->name('register');
Route::post('/admin/register', 'AdminController@postRegister')->name('postRegister');

Route::group(['middleware' => ['auth:guest_user']], function () {
    Route::get('/dashboard', 'CustomerController@dashboard')->name('customerHome');
    Route::get('/information', 'CustomerController@information')->name('information');
    Route::post('/information', 'CustomerController@postInformation')->name('post.information');
    Route::get('/password', 'CustomerController@password')->name('password');
    Route::post('/password', 'CustomerController@postPassword')->name('customer.password');
    Route::get('/logout', 'GuestUserController@logout')->name('customer.logout');

    Route::get('/category/{slug}/{id}', [
        'as' => 'category.product',
        'uses' => 'CustomerController@category'
    ]);
    // Route::get('/cart', 'OrderController@cart')->name('cart');
    Route::get('/sale/{id}', 'CustomerController@saleDetails')->name('sale.details');
    Route::get('/product/{id}', 'CustomerController@productDetails')->name('product.details');
    Route::prefix('wishlist')->group(function () {
        Route::get('/', 'WishlistController@postWishlist')->name('customer.wishlist');
        Route::get('/{id}','WishlistController@destroyWishlist')->name('customer.wishlist.delete');
        Route::get('/{name}/{id}', 'WishlistController@wishlist')->name('wishlist');
    });
    Route::prefix('cart')->group(function () {
        Route::get('/', 'OrderController@cart')->name('cart');
        // Route::get('/{id}','WishlistController@destroyWishlist')->name('customer.wishlist.delete');
        Route::post('/{name}/{id}', 'OrderController@createCart')->name('customer.cart');
        Route::put('/confirm-order', 'OrderController@confirmCart')->name('customer.confirm.cart');
    });
});

Route::get('/chart', [
    'as' => 'product.chart',
    'uses' => 'AdminProductController@chart'
]);
Route::get('/barchart', [
    'as' => 'product.barchart',
    'uses' => 'AdminProductController@barChart'
]);


Route::group(['middleware' => ['auth:web']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('/logout', 'AdminController@logout')->name('admin.logout');

        Route::prefix('user')->group(function () {
            Route::get('/', [
                'as' => 'user.index',
                'uses' => 'UserController@index'
            ]);
            Route::get('/create', [
                'as' => 'user.create',
                'uses' => 'UserController@create'
            ]);
            Route::post('/store', [
                'as' => 'user.store',
                'uses' => 'UserController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'user.edit',
                'uses' => 'UserController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'user.update',
                'uses' => 'UserController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'user.delete',
                'uses' => 'UserController@destroy'
            ]);
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [
                'as' => 'categories.index',
                'uses' => 'CategoryController@index',
                // 'middleware' => 'can:category-list'
            ]);
            Route::get('/create', [
                'as' => 'categories.create',
                'uses' => 'CategoryController@create'
            ]);
            Route::post('/store', [
                'as' => 'categories.store',
                'uses' => 'CategoryController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'categories.edit',
                'uses' => 'CategoryController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'categories.update',
                'uses' => 'CategoryController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'categories.delete',
                'uses' => 'CategoryController@delete'
            ]);
        });

        Route::prefix('menus')->group(function () {
            Route::get('/', [
                'as' => 'menus.index',
                'uses' => 'MenuController@index',
                // 'middleware' => 'can:menu-list'
            ]);
            Route::get('/create', [
                'as' => 'menus.create',
                'uses' => 'MenuController@create'
            ]);
            Route::post('/store', [
                'as' => 'menus.store',
                'uses' => 'MenuController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'menus.edit',
                'uses' => 'MenuController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'menus.update',
                'uses' => 'MenuController@update'
            ]);
            Route::get('/delete', [
                'as' => 'menus.delete',
                'uses' => 'MenuController@delete'
            ]);
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [
                'as' => 'product.index',
                'uses' => 'AdminProductController@index'
            ]);
            Route::get('/create', [
                'as' => 'product.create',
                'uses' => 'AdminProductController@create'
            ]);
            Route::post('/store', [
                'as' => 'product.store',
                'uses' => 'AdminProductController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'AdminProductController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'product.update',
                'uses' => 'AdminProductController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'product.delete',
                'uses' => 'AdminProductController@destroy'
            ]);
        });

        Route::prefix('slider')->group(function () {
            Route::get('/', [
                'as' => 'slider.index',
                'uses' => 'SliderAdminController@index'
            ]);
            Route::get('/create', [
                'as' => 'slider.create',
                'uses' => 'SliderAdminController@create'
            ]);
            Route::post('/store', [
                'as' => 'slider.store',
                'uses' => 'SliderAdminController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'slider.edit',
                'uses' => 'SliderAdminController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'slider.update',
                'uses' => 'SliderAdminController@update'
            ]);
            Route::get('/delete', [
                'as' => 'slider.delete',
                'uses' => 'SliderAdminController@destroy'
            ]);
        });

        Route::prefix('setting')->group(function () {
            Route::get('/', [
                'as' => 'setting.index',
                'uses' => 'AdminSettingController@index'
            ]);
            Route::get('/create', [
                'as' => 'setting.create',
                'uses' => 'AdminSettingController@create'
            ]);
            Route::post('/store', [
                'as' => 'setting.store',
                'uses' => 'AdminSettingController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'setting.edit',
                'uses' => 'AdminSettingController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'setting.update',
                'uses' => 'AdminSettingController@update'
            ]);
            Route::get('/delete', [
                'as' => 'setting.delete',
                'uses' => 'AdminSettingController@destroy'
            ]);
        });

        Route::prefix('roles')->group(function () {
            Route::get('/', [
                'as' => 'roles.index',
                'uses' => 'AdminRoleController@index'
            ]);
            Route::get('/create', [
                'as' => 'roles.create',
                'uses' => 'AdminRoleController@create'
            ]);
            Route::post('/store', [
                'as' => 'roles.store',
                'uses' => 'AdminRoleController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'roles.edit',
                'uses' => 'AdminRoleController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'roles.update',
                'uses' => 'AdminRoleController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'roles.delete',
                'uses' => 'AdminRoleController@destroy'
            ]);
        });

        Route::prefix('permissions')->group(function () {
            Route::get('/create', [
                'as' => 'permissions.create',
                'uses' => 'PermissionController@create'
            ]);
            Route::post('/store', [
                'as' => 'permissions.store',
                'uses' => 'PermissionController@store'
            ]);
        });

        Route::prefix('sales')->group(function () {
            Route::get('/', [
                'as' => 'sales.index',
                'uses' => 'SaleController@index'
            ]);
            Route::get('/create/{id}', [
                'as' => 'sales.create',
                'uses' => 'SaleController@create'
            ]);
            Route::post('/store/{id}', [
                'as' => 'sales.store',
                'uses' => 'SaleController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'sales.edit',
                'uses' => 'SaleController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'sales.update',
                'uses' => 'SaleController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'sales.delete',
                'uses' => 'SaleController@destroy'
            ]);
        });
    });
});
