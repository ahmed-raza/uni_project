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
Route::get('user/profile', 'UsersController@profile')->name('user.profile');
Route::resource('ads', 'AdsController');
Route::get('ads/{id}/delete', 'AdsController@delete')->name('ads.delete');

Route::group(['prefix'=>'admin', 'middleware'=>['admin']], function(){
  Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  Route::resource('category', 'CategoriesController');
  Route::get('users', 'AdminController@users')->name('admin.users');
  Route::get('ads', 'AdminController@ads')->name('admin.ads');
});

Auth::routes();
