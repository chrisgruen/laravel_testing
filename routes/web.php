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

Route::group(['middleware' => 'web'], function () {
	Route::auth();
	Route::get('/services', 'PagesProtectedController@services');
	
	Route::get('/admin_users', 'AdminController@index');
	Route::get('/admin_users/show/{user_id}', 'AdminController@show_user');
	Route::get('/admin_users/create', 'AdminController@form_create_user');
	Route::get('/admin_users/edit/{user_id}', 'AdminController@form_edit_user');
	Route::get('/admin_users/delete/{user_id}', 'AdminController@delete_user');
	Route::post('/admin_users', 'AdminController@index');
	Route::post('/admin_users/create_user', 'AdminController@create_user');
	Route::post('/admin_users/edit_user/{user_id}', 'AdminController@edit_user');
	
	/* Ajax call */
	Route::post('activate_user', 'AdminController@activate_user');
	Route::post('deactivate_user', 'AdminController@deactivate_user');
		
	/*
	 Route::group(['middleware' => ['admin']], function() {
		Route::get('/admin', 'AdminController@index');
	
	 });
	 */
});



