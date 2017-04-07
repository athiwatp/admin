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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/', 'AdminController')->middleware('auth');

Route::get('user/paginate', 'UserController@paginate');
Route::get('user/count', 'UserController@count');
Route::post('user/store', 'UserController@store');
Route::get('user/{id}', 'UserController@show');
Route::delete('user/{id}', 'UserController@destroy');
