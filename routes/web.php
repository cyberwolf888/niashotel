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



Auth::routes();

Route::get('/', function () {
    //return view('frontend.home');
})->name('home');

Route::get('/local', 'HomeController@local')->name('frontend.local');
Route::get('/impor', 'HomeController@impor')->name('frontend.impor');
Route::get('/best-seller', 'HomeController@best_seller')->name('frontend.best_seller');
Route::get('/product-detail/{id}', 'HomeController@detail_product')->name('frontend.detail_product');
Route::post('/cart/insert', 'HomeController@cart_insert')->name('frontend.cart.insert');
Route::post('/cart/delete', 'HomeController@cart_delete')->name('frontend.cart.delete');
Route::post('/cart/update', 'HomeController@cart_update')->name('frontend.cart.update');
Route::get('/cart', 'HomeController@cart_manage')->name('frontend.cart.manage');
Route::post('/subscribe', 'HomeController@subscribe')->name('frontend.subscribe');
Route::post('/search', 'HomeController@search')->name('frontend.search');




//Backend
Route::group(['prefix' => 'backend', 'middleware' => ['auth','role:admin-access|karyawan-access'], 'as'=>'backend'], function() {

    //Dashboard
    Route::get('/', 'Backend\DashboardController@index')->name('.dashboard');

    //Type
    Route::group(['prefix' => 'type', 'as'=>'.type'], function() {
        Route::get('/', 'Backend\TypeController@index')->name('.manage');
        Route::get('/create', 'Backend\TypeController@create')->name('.create');
        Route::post('/create', 'Backend\TypeController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\TypeController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\TypeController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\TypeController@show')->name('.show');
        Route::get('/gallery/manage/{id}', 'Backend\TypeController@manage_gallery')->name('.gallery.manage');
        Route::get('/gallery/create/{id}', 'Backend\TypeController@create_gallery')->name('.gallery.create');
        Route::post('/gallery/create/{id}', 'Backend\TypeController@store_gallery')->name('.gallery.store');
        Route::get('/gallery/delete/{id}', 'Backend\TypeController@destroy_gallery')->name('.gallery.destroy');
    });

    //Kamar
    Route::group(['prefix' => 'kamar', 'as'=>'.kamar'], function() {
        Route::get('/', 'Backend\KamarController@index')->name('.manage');
        Route::get('/create', 'Backend\KamarController@create')->name('.create');
        Route::post('/create', 'Backend\KamarController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\KamarController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\KamarController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\KamarController@show')->name('.show');
    });

    //Tamu
    Route::group(['prefix' => 'tamu', 'as'=>'.tamu'], function() {
        Route::get('/', 'Backend\TamuController@index')->name('.manage');
        Route::get('/create', 'Backend\TamuController@create')->name('.create');
        Route::post('/create', 'Backend\TamuController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\TamuController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\TamuController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\TamuController@show')->name('.show');
    });

    //Check-in
    Route::group(['prefix' => 'checkin', 'as'=>'.checkin'], function() {
        Route::get('/', 'Backend\CheckinController@index')->name('.manage');
        Route::get('/create', 'Backend\CheckinController@create')->name('.create');
        Route::post('/create', 'Backend\CheckinController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\CheckinController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\CheckinController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\CheckinController@show')->name('.show');
        Route::post('/check-harga', 'Backend\CheckinController@check_harga')->name('.check_harga');
    });

    //Check-out
    Route::group(['prefix' => 'checkout', 'as'=>'.checkout'], function() {
        Route::get('/', 'Backend\CheckoutController@index')->name('.manage');
        Route::get('/create', 'Backend\CheckoutController@create')->name('.create');
        Route::get('/create/{id}', 'Backend\CheckoutController@create')->name('.create_from_checkin');
        Route::post('/create', 'Backend\CheckoutController@store')->name('.store');
        Route::get('/edit/{id}', 'Backend\CheckoutController@edit')->name('.edit');
        Route::post('/edit/{id}', 'Backend\CheckoutController@update')->name('.update');
        Route::get('/detail/{id}', 'Backend\CheckoutController@show')->name('.show');
        Route::post('/get-total', 'Backend\CheckoutController@get_total')->name('.get_total');
    });

    //User
    Route::group(['prefix' => 'user', 'as'=>'.user'], function() {

        //Admin
        Route::group(['prefix' => 'admin', 'as'=>'.admin'], function() {
            Route::get('/', 'Backend\UserController@admin')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_admin')->name('.create');
            Route::post('/create', 'Backend\UserController@store_admin')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_admin')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_admin')->name('.update');
        });

        //Member
        Route::group(['prefix' => 'karyawan', 'as'=>'.karyawan'], function() {
            Route::get('/', 'Backend\UserController@karyawan')->name('.manage');
            Route::get('/create', 'Backend\UserController@create_karyawan')->name('.create');
            Route::post('/create', 'Backend\UserController@store_karyawan')->name('.store');
            Route::get('/edit/{id}', 'Backend\UserController@edit_karyawan')->name('.edit');
            Route::post('/edit/{id}', 'Backend\UserController@update_karyawan')->name('.update');
        });

    });

    //Report
    Route::group(['prefix' => 'report', 'as'=>'.report'], function() {
        Route::get('/', 'Backend\ReportController@index')->name('.index');
        Route::post('/transaction', 'Backend\ReportController@transaction')->name('.transaction');
    });


    //Profile
    Route::group(['prefix' => 'profile', 'as'=>'.profile'], function() {
        Route::get('/', 'Backend\ProfileController@index')->name('.index');
        Route::post('/edit/{id}', 'Backend\ProfileController@update')->name('.update');
    });

});

