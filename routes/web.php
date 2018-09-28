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

Route::get('/', 'PageController@index');

Route::prefix('admin')->group(function(){
	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('user','UserController');
	Route::resource('category','CategoryController');
	Route::resource('post','PostController');
	
});

Route::get('Category/{id}/{NameCategory}.html','PageController@Category');
Route::get('Detail/{id}/{NameDetail}.html','PageController@Detail');
Route::get('search','PageController@search');
