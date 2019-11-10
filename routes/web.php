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


Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::any('logout', 'LoginController@logout')->name('logout');

Route::get('test','TestController@index');
Route::get('/','AdminController@index')->middleware('auth');
Route::get('wellcome','AdminController@wellcome')->middleware('auth');
Route::get('admin/account','AdminController@account')->middleware('auth');
Route::post('admin/account','AdminController@batchDelete')->middleware('auth');
Route::get('admin/account/edit','AdminController@edit')->middleware('auth');
Route::post('admin/account/edit','AdminController@storeAccount')->middleware('auth');

Route::get('user','UserController@index');
Route::post('user','UserController@batchDelete');
Route::get('user/edit','UserController@edit');
Route::post('user/edit','UserController@store');


