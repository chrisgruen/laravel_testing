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

Route::get('welcome', function () {return view('welcome');});
Route::get('/', 'PagesController@homepublic');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/logout', 'AdminController@logout');

Route::get('/admin_users', 'AdminController@index');
Route::get('/admin_users/create_user', 'AdminController@form_create_user');
Route::post('/create_user', 'AdminController@create_user');



Route::group(['middleware' => 'web'], function () {
	Route::auth();
	Route::get('/services', 'PagesProtectedController@services');
	//Route::get('/admin', 'AdminController@index');
	
	/*
	 Route::group(['middleware' => ['admin']], function() {
		Route::get('/admin', 'AdminController@index');
	
	 });
	 */
});



