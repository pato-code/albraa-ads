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

Route::get('/', 'GuestController@index');

Route::get('/admin', 'AdminController@index')->name('admin');

Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');

Route::get('/admin/add' , 'AdminController@create');
Route::post('/admin/add' , 'AdminController@store');
Route::get('/admin/{id}/edit' , 'AdminController@edit');
Route::post('/admin/{id}/edit' , 'AdminController@update');
Route::get('/admin/{id}/delete' , 'AdminController@destroy');


