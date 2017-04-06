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

Auth::routes();

Route::get('/', 'AdminController');

Route::get('user/paginate', 'UserController@paginate');
Route::get('user/count', 'UserController@count');
Route::get('user/{id}', 'UserController@show');
