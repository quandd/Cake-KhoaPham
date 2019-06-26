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

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getCategory'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getProduct'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getContact'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getIntro'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@getLogout'
]);
;
Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

//ADMIN
Route::group(['namespace'=>'Admin'],function(){

	Route::group(['prefix'=>'admin-login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});

	Route::get('logout','HomeController@getLogout');

	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		
			Route::get('/','HomeController@getHome');

			Route::group(['prefix'=>'category'],function(){
				
				Route::get('/','CategoryController@getCate');
				Route::get('edit','CategoryController@getEditCate');
				Route::post('add','CategoryController@postCate');
			});

			Route::group(['prefix'=>'product'],function(){
				Route::get('/','ProductController@getProduct');

				Route::get('add','ProductController@getAddProduct');
				Route::get('add','ProductController@postAddProduct');

				Route::get('edit/{id}','ProductController@getEditProduct');
				Route::post('edit/{id}','ProductController@postEditProduct');

				Route::get('delete/{id}','ProductController@getDeleteProduct');
			});


		});
});



