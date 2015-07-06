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

Route::get('/', function () {
    return view('app');
});

Route::controllers(
	[
    	'auth' => 'Auth\AuthController',
    	'password' => 'Auth\PasswordController',
	]);

Route::pattern('id', '[0-9+]');	
		
		Route::get('categories/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
		Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
		Route::get('categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
		Route::get('categories/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
		Route::put('categories/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
		Route::post('categories/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
		
		Route::get('products/',	['as' => 'products', 'uses' => 'ProductsController@index']);
		Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
		Route::get('products/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
		Route::get('products/{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
		Route::put('products/{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
		Route::post('products/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);

		Route::get('products/{id}/images', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
		Route::get('products/{id}/create_image', ['as' => 'products.images.create', 'uses' => 'ProductsController@create_image']);
		Route::post('products/{id}/store_image', ['as' => 'products.images.store', 'uses' => 'ProductsController@store_image']);
		Route::get('products/{id}/destroy_image', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroy_image']);