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
//return view('dashboard.auth.login');
Route::get('/dashboards-login', 'DashboardController@get_login')->name('dashboards-login');
Route::post('/dashboards-login', 'DashboardController@post_login')->name('dashboards-login');
Route::get('/dashboards-logout', 'DashboardController@get_logout')->name('dashboards-logout');
Route::get('/my-wish', 'PageController@index')->name('my-wish');
Route::get('/my-cart', 'PageController@index')->name('my-cart');


Route::group(['prefix' => 'dashboards', 'middleware' => 'dashboards'], function () {
    Route::get('/', function () {
        return view('dashboards.dashboard');
    })->name('dashboards');

    Route::group(['prefix' => 'session'], function () {
        Route::post('/add-pagginate', 'SessionController@add_pagginate')->name('add-session-pagginate');
        Route::post('/add-sort', 'SessionController@add_sort')->name('add-session-sort');
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('/', 'Dashboard\SlideController@index')->name('slide');
        Route::post('/add', 'Dashboard\SlideController@post_add')->name('add-slide');
        Route::post('/change', 'Dashboard\SlideController@post_change')->name('change-slide');
        Route::post('/delete', 'Dashboard\SlideController@post_delete')->name('delete-slide');
        Route::post('/deletes', 'Dashboard\SlideController@post_deletes')->name('delete-slides');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Dashboard\CategoryController@index')->name('category');
        Route::post('/add', 'Dashboard\CategoryController@post_add')->name('add-category');
        Route::post('/view', 'Dashboard\CategoryController@post_view')->name('view-category');
        Route::post('/edit', 'Dashboard\CategoryController@post_edit')->name('edit-category');
        Route::get('/edit/{id?}', 'Dashboard\CategoryController@get_edit')->name('edit-category');
        Route::post('/delete', 'Dashboard\CategoryController@post_delete')->name('delete-category');
        Route::post('/deletes', 'Dashboard\CategoryController@post_deletes')->name('delete-categories');
        Route::post('/change', 'Dashboard\CategoryController@post_change')->name('change-category');
        Route::post('/seach', 'Dashboard\CategoryController@seach')->name('search-category');
        Route::get('/category-products/{id?}', 'Dashboard\CategoryController@get_view_products')->name('view-category-products');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'Dashboard\ProductController@index')->name('product');
        Route::post('/add', 'Dashboard\ProductController@post_add')->name('add-product');
        Route::post('/view', 'Dashboard\ProductController@post_view')->name('view-product');
        Route::post('/edit', 'Dashboard\ProductController@post_edit')->name('edit-product');
        Route::get('/edit/{id?}', 'Dashboard\ProductController@get_edit')->name('edit-product');
        Route::post('/delete', 'Dashboard\ProductController@post_delete')->name('delete-product');
        Route::post('/deletes', 'Dashboard\ProductController@post_deletes')->name('delete-products');
        Route::post('/add-image-product', 'Dashboard\ProductController@add_image_product')->name('add-image-product');
        Route::post('/ajax-image-product', 'Dashboard\ProductController@ajax_image_product')->name('ajax-image-product');
        Route::post('/delete-image-product', 'Dashboard\ProductController@delete_image_product')->name('delete-image-product');
        Route::post('/edit-image-product', 'Dashboard\ProductController@edit_image_product')->name('edit-image-product');
        Route::post('/ajax-image-product-main', 'Dashboard\ProductController@ajax_image_product_main')->name('ajax-image-product-main');
        Route::post('/change', 'Dashboard\ProductController@post_change')->name('change-product');
        Route::post('/seach', 'Dashboard\ProductController@seach')->name('search-product');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'Dashboard\OrderController@index')->name('order');
//        Route::post('/add', 'Dashboard\ProductController@post_add')->name('add-product');
//        Route::post('/view', 'Dashboard\ProductController@post_view')->name('view-product');
//        Route::post('/edit', 'Dashboard\ProductController@post_edit')->name('edit-product');
//        Route::get('/edit/{id?}', 'Dashboard\ProductController@get_edit')->name('edit-product');
//        Route::post('/delete', 'Dashboard\ProductController@post_delete')->name('delete-product');
//        Route::post('/deletes', 'Dashboard\ProductController@post_deletes')->name('delete-products');
//        Route::post('/add-image-product', 'Dashboard\ProductController@add_image_product')->name('add-image-product');
//        Route::post('/ajax-image-product', 'Dashboard\ProductController@ajax_image_product')->name('ajax-image-product');
//        Route::post('/delete-image-product', 'Dashboard\ProductController@delete_image_product')->name('delete-image-product');
//        Route::post('/edit-image-product', 'Dashboard\ProductController@edit_image_product')->name('edit-image-product');
//        Route::post('/ajax-image-product-main', 'Dashboard\ProductController@ajax_image_product_main')->name('ajax-image-product-main');
//        Route::post('/change', 'Dashboard\ProductController@post_change')->name('change-product');
//        Route::post('/seach', 'Dashboard\ProductController@seach')->name('search-product');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Dashboard\ProductController@index')->name('user');
//        Route::post('/add', 'Dashboard\ProductController@post_add')->name('add-product');
//        Route::post('/view', 'Dashboard\ProductController@post_view')->name('view-product');
//        Route::post('/edit', 'Dashboard\ProductController@post_edit')->name('edit-product');
//        Route::get('/edit/{id?}', 'Dashboard\ProductController@get_edit')->name('edit-product');
//        Route::post('/delete', 'Dashboard\ProductController@post_delete')->name('delete-product');
//        Route::post('/deletes', 'Dashboard\ProductController@post_deletes')->name('delete-products');
//        Route::post('/add-image-product', 'Dashboard\ProductController@add_image_product')->name('add-image-product');
//        Route::post('/ajax-image-product', 'Dashboard\ProductController@ajax_image_product')->name('ajax-image-product');
//        Route::post('/delete-image-product', 'Dashboard\ProductController@delete_image_product')->name('delete-image-product');
//        Route::post('/edit-image-product', 'Dashboard\ProductController@edit_image_product')->name('edit-image-product');
//        Route::post('/ajax-image-product-main', 'Dashboard\ProductController@ajax_image_product_main')->name('ajax-image-product-main');
//        Route::post('/change', 'Dashboard\ProductController@post_change')->name('change-product');
//        Route::post('/seach', 'Dashboard\ProductController@seach')->name('search-product');
    });
    Route::group(['prefix' => 'payment'], function () {
        Route::get('/', 'Dashboard\ProductController@index')->name('payment');
//        Route::post('/add', 'Dashboard\ProductController@post_add')->name('add-product');
//        Route::post('/view', 'Dashboard\ProductController@post_view')->name('view-product');
//        Route::post('/edit', 'Dashboard\ProductController@post_edit')->name('edit-product');
//        Route::get('/edit/{id?}', 'Dashboard\ProductController@get_edit')->name('edit-product');
//        Route::post('/delete', 'Dashboard\ProductController@post_delete')->name('delete-product');
//        Route::post('/deletes', 'Dashboard\ProductController@post_deletes')->name('delete-products');
//        Route::post('/add-image-product', 'Dashboard\ProductController@add_image_product')->name('add-image-product');
//        Route::post('/ajax-image-product', 'Dashboard\ProductController@ajax_image_product')->name('ajax-image-product');
//        Route::post('/delete-image-product', 'Dashboard\ProductController@delete_image_product')->name('delete-image-product');
//        Route::post('/edit-image-product', 'Dashboard\ProductController@edit_image_product')->name('edit-image-product');
//        Route::post('/ajax-image-product-main', 'Dashboard\ProductController@ajax_image_product_main')->name('ajax-image-product-main');
//        Route::post('/change', 'Dashboard\ProductController@post_change')->name('change-product');
//        Route::post('/seach', 'Dashboard\ProductController@seach')->name('search-product');
    });
    Route::group(['prefix' => 'config'], function () {
        Route::get('/', 'Dashboard\ProductController@index')->name('config');
//        Route::post('/add', 'Dashboard\ProductController@post_add')->name('add-product');
//        Route::post('/view', 'Dashboard\ProductController@post_view')->name('view-product');
//        Route::post('/edit', 'Dashboard\ProductController@post_edit')->name('edit-product');
//        Route::get('/edit/{id?}', 'Dashboard\ProductController@get_edit')->name('edit-product');
//        Route::post('/delete', 'Dashboard\ProductController@post_delete')->name('delete-product');
//        Route::post('/deletes', 'Dashboard\ProductController@post_deletes')->name('delete-products');
//        Route::post('/add-image-product', 'Dashboard\ProductController@add_image_product')->name('add-image-product');
//        Route::post('/ajax-image-product', 'Dashboard\ProductController@ajax_image_product')->name('ajax-image-product');
//        Route::post('/delete-image-product', 'Dashboard\ProductController@delete_image_product')->name('delete-image-product');
//        Route::post('/edit-image-product', 'Dashboard\ProductController@edit_image_product')->name('edit-image-product');
//        Route::post('/ajax-image-product-main', 'Dashboard\ProductController@ajax_image_product_main')->name('ajax-image-product-main');
//        Route::post('/change', 'Dashboard\ProductController@post_change')->name('change-product');
//        Route::post('/seach', 'Dashboard\ProductController@seach')->name('search-product');
    });
});
Route::group(['prefix' => 'ajax'], function () {
    Route::get('/', function () {
        return 0;
    })->name('ajax');
    Route::post('/add-wish', 'AjaxController@post_add_wish')->name('add-wish');
    Route::post('/remove-wish', 'AjaxController@post_remove_wish')->name('remove-wish');
    Route::post('/add-cart', 'AjaxController@post_add_cart')->name('add-cart');
//    Route::post('/remove-cart', 'AjaxController@post_remove_cart')->name('remove-cart');
    Route::post('/get-cart', 'AjaxController@post_get_cart')->name('get-cart');
    Route::post('/remove-product-cart', 'AjaxController@post_remove_product_cart')->name('remove-product-cart');
    Route::post('/dec-quantity', 'AjaxController@dec_quantity')->name('dec-quantity');
    Route::post('/inc-quantity', 'AjaxController@inc_quantity')->name('inc-quantity');
    Route::get('/get-cart', 'AjaxController@post_get_cart')->name('get-cart');
});
Route::get('/', 'PageController@index')->name('home');
Route::get('/shop', 'PageController@index')->name('shop');
Route::get('/blog', 'PageController@index')->name('blog');
Route::get('/contact', 'PageController@index')->name('contact');
Route::get('/product/{slug?}', 'PageController@product_detail')->name('product-detail');
Route::get('/category/{slug?}', 'PageController@category_detail')->name('category-detail');
Route::get('/search', 'PageController@category_detail')->name('search');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('auth/facebook', 'SocialController@facebookRedirect');

Route::get('auth/facebook/callback', 'SocialController@loginWithFacebook');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function (){
    Route::get('/check-out', 'OrderController@check_out')->name('check-out');
    Route::get('/proccess-check-out', 'OrderController@proccess_check_out')->name('proccess-check-out');
    Route::post('/payment-check-out', 'OrderController@payment_check_out')->name('payment-check-out');
    Route::get('/vnp', 'VNPay@create')->name('vnpay');
    Route::get('/payment-return', 'VNPay@return')->name('payment-return');



    Route::group(['prefix'=>'order'], function (){
        Route::get('/show-order/{id?}', 'OrderController@show_order')->name('show-order');
        Route::post('/cancel-order', 'OrderController@cancel_order')->name('cancel-order');
    });
    Route::group(['prefix'=>'address'], function (){
        Route::post('/add', 'AddressController@post_add_address')->name('add-address');
        Route::post('/delete', 'AddressController@delete_address')->name('delete-address');
    });
    Route::group(['prefix'=>'user'], function (){
        Route::get('/order', 'UserController@my_order')->name('my-order');
        Route::get('/address', 'UserController@my_address')->name('my-address');
    });
});
