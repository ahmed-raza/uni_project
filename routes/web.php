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

Route::get('/', 'PagesController@home')->name('home');
Route::get('my-ads', 'UsersController@ads')->name('user.ads');
Route::resource('ads', 'AdsController');
Route::get('ads/{id}/delete', 'AdsController@delete')->name('ads.delete');

Auth::routes();
