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

Route::get('/categories/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
Route::get('/categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
Route::get('/categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::get('/categories/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
Route::put('/categories/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
Route::post('/categories', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);

