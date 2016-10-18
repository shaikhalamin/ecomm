<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/admin/category', [
	'uses' => 'CategoryController@getCategory',
	'as'   => 'admin.category'

]);


Route::post('/admin/category', [
	'uses' => 'CategoryController@postCreate',
	'as'   => 'admin.category'
]);
Route::get('/admin/managecategory', [
	'uses' => 'CategoryController@getManageCategory',
	'as'   => 'admin.managecategory'
]);
Route::get('/admin/editcategory/{id}', [
	'uses' => 'CategoryController@getEditCategory',
	'as'   => 'admin.editcategory'
]);
Route::post('/admin/editcategory/{id}', [
	'uses' => 'CategoryController@postEditCategory',
	'as'   => 'admin.editcategory'
]);

Route::post('/admin/deletecategory/{id}', [
	'uses' => 'CategoryController@postDeleteCategory',
	'as'   => 'admin.deletecategory'
]);

Route::get('/admin/product', [
	'uses' => 'AdminController@getProductCreate',
	'as'   => 'admin.createProduct'
]);
Route::post('/admin/product', [
	'uses' => 'AdminController@postCreate',
	'as'   => 'admin.createProduct'
]);
Route::get('/admin/manageproduct', [
	'uses' => 'AdminController@getAllProducts',
	'as'   => 'admin.manageProduct'
]);
Route::get('/admin/editproduct/{id}', [
	'uses' => 'AdminController@getEditProduct',
	'as'   => 'admin.editProduct'
]);
Route::post('/admin/editproduct/{id}', [
	'uses' => 'AdminController@postEditProduct',
	'as'   => 'admin.editProduct'
]);

Route::post('/admin/deleteproduct/{id}', [
	'uses' => 'AdminController@postDeleteProduct',
	'as'   => 'admin.deleteProduct'
]);


Route::post('/admin/feedback', [
	'uses' => 'AdminController@postProductFeedBack',
	'as'   => 'admin.productFeedback'
]);
Route::get('/search', [
	'uses' => 'ProductController@getProductSearch',
	'as'   => 'product.searchProduct'

]);



Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as'   => 'product.index'
]);

Route::get('/product/{id}', [
	'uses' => 'ProductController@getProductByCategory',
	'as'   => 'product.getProduct'

]);


Route::get('/add-to-cart/{id}',[
	'uses' => 'ProductController@getAddToCart',
	'as'   => 'product.addtocart'
	]);
Route::get('/reduce/{id}',[
	'uses' => 'ProductController@getReduceByOne',
	'as'   => 'product.reduceByOne'
	]);

Route::get('/remove/{id}',[
	'uses' => 'ProductController@getRemoveItem',
	'as'   => 'product.remove'
	]);
Route::get('/shoppingcart',[
	'uses' => 'ProductController@getCart',
	'as'   => 'product.shoppingCart'
	]);
Route::get('/checkout',[
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'

	]);
Route::post('/checkout',[
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout',
	'middleware' => 'auth'

]);


Route::group(['prefix' => 'user'],function(){

	Route::group(['middleware' => 'guest'],function(){
		Route::get('/signup',[
			'uses' => 'UserController@getSignup',
			'as'   =>  'user.signup'
		]);
		Route::post('/signup',[
			'uses' => 'UserController@postSignup',
			'as'   => 'user.signup'
		]);

		Route::get('/signin',[
			'uses' => 'UserController@getSignin',
			'as'   => 'user.signin'
		]);
		Route::post('/signin',[
			'uses' => 'UserController@postSignin',
			'as'   => 'user.signin'
		]);

	});

	Route::group(['middleware' => 'auth'],function(){
		Route::get('/profile',[
			'uses' => 'UserController@getProfile',
			'as'   => 'user.profile'
		]);
		Route::post('/profile',[
			'uses' => 'UserController@postProfile',
			'as'   => 'user.profile'
		]);

		Route::get('/profile/imageupload',[
			'uses' => 'UserController@getUpload',
			'as'   => 'user.imageupload'
		]);
		Route::get('/profile/userOrders',[
			'uses' => 'UserController@getUserOrders',
			'as'   => 'user.userOrders'
		]);

		Route::get('/signout',[
			'uses' => 'UserController@getSignout',
			'as'   => 'user.signout'
		]);

	});

});


