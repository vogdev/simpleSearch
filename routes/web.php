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
Route::get('/', 'UsersController@index');
Route::get('/getusers', 'UsersController@getusers');
Route::get('/search/{query}', 'UsersController@search');

Route::get('/finduser', 'UsersController@finduser');
Route::get('/find/{query}', 'UsersController@find');
