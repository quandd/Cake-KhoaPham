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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [
    'as' => 'trang-chu',
    'uses' => 'PageController@index'
]);

Route::get('loai-san-pham/{type}', [
    'as' => 'loaisanpham',
    'uses' => 'PageController@getCategory'
]);

Route::get('chi-tiet-san-pham/{id}', [
    'as' => 'chitietsanpham',
    'uses' => 'PageController@getProduct'
]);

Route::get('lien-he', [
    'as' => 'lienhe',
    'uses' => 'PageController@getContact'
]);

Route::get('gioi-thieu', [
    'as' => 'gioithieu',
    'uses' => 'PageController@getIntro'
]);

Route::get('add-to-cart/{id}', [
    'as' => 'themgiohang',
    'uses' => 'CartController@store'
]);

Route::get('del-cart/{id}', [
    'as' => 'xoagiohang',
    'uses' => 'CartController@destroy'
]);

Route::get('dat-hang', [
    'as' => 'dathang',
    'uses' => 'OrderController@index'
]);

Route::post('dat-hang', [
    'as' => 'dathang',
    'uses' => 'OrderController@store'
]);

Route::get('dang-nhap', [
    'as' => 'login',
    'uses' => 'LoginController@index'
]);

Route::post('dang-nhap', [
    'as' => 'login',
    'uses' => 'LoginController@checkLogin'
]);


Route::get('dang-ki', [
    'as' => 'signin',
    'uses' => 'SigninController@index'
]);

Route::post('dang-ki', [
    'as' => 'signin',
    'uses' => 'SigninController@store'
]);

Route::get('dang-xuat', [
    'as' => 'logout',
    'uses' => 'LogoutController@show'
]);;
Route::get('search', [
    'as' => 'search',
    'uses' => 'SearchController@show'
])->middleware('CheckSearch');

//ADMIN
Route::group(['namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'admin-login', 'middleware' => 'CheckLogedIn'], function () {
        Route::get('/', 'LoginController@index');
        Route::post('/', 'LoginController@store');
    });

    Route::get('logout', 'HomeController@getLogout');

    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'], function () {

        Route::get('/', 'HomeController@index');

        Route::group(['prefix' => 'category'], function () {

            Route::get('/', 'CategoryController@index');
            Route::post('add', 'CategoryController@store')->middleware('CheckAdmin');

            Route::get('edit/{id}', 'CategoryController@edit');
            Route::post('edit/{id}', 'CategoryController@update')->middleware('CheckAdmin');

            Route::get('delete/{id}', 'CategoryController@destroy')->middleware('CheckAdmin');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index');

            Route::get('add', 'ProductController@create');
            Route::post('add', 'ProductController@store')->middleware('CheckAdmin');

            Route::get('edit/{id}', 'ProductController@edit');
            Route::post('edit/{id}', 'ProductController@update')->middleware('CheckAdmin');

            Route::get('delete/{id}', 'ProductController@destroy')->middleware('CheckAdmin');
        });
    });
});



