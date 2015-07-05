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

Route::group(['prefix' => 'admin'], function()
	{	
		Route::group(['prefix' => 'categories'], function()
			{
				Route::get('', 				['as' => 'categories', 			'uses' => 'CategoriesController@index']);
				Route::get('create', 		['as' => 'categories.create', 	'uses' => 'CategoriesController@create']);
				Route::get('{id}/edit', 	['as' => 'categories.edit', 	'uses' => 'CategoriesController@edit']);
				Route::get('{id}/destroy', 	['as' => 'categories.destroy', 	'uses' => 'CategoriesController@destroy']);
				Route::put('{id}/update', 	['as' => 'categories.update', 	'uses' => 'CategoriesController@update']);
				Route::post('', 			['as' => 'categories.store', 	'uses' => 'CategoriesController@store']);
			});

		Route::group(['prefix' => 'products'], function()
			{
				Route::get('', 				['as' => 'products', 			'uses' => 'ProductsController@index']);
				Route::get('create', 		['as' => 'products.create', 	'uses' => 'ProductsController@create']);
				Route::get('{id}/edit',		['as' => 'products.edit', 		'uses' => 'ProductsController@edit']);
				Route::get('{id}/destroy', 	['as' => 'products.destroy', 	'uses' => 'ProductsController@destroy']);
				Route::put('{id}/update', 	['as' => 'products.update', 	'uses' => 'ProductsController@update']);
				Route::post('', 			['as' => 'products.store', 		'uses' => 'ProductsController@store']);
			});
	});