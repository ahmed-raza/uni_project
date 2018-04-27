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

// Ads Routes
Route::resource('ads', 'AdsController');
Route::get('ads/{id}/delete', 'AdsController@delete')->name('ads.delete');

// Categories Routes
Route::resource('categories', 'CategoriesController');
Route::get('categories/{id}/delete', 'CategoriesController@delete')->name('categories.delete');

// User Routes
Route::get('user/{id}/edit', 'UsersController@edit')->name('user.edit');
Route::patch('user/{id}', 'UsersController@update')->name('user.update');
Route::get('user/profile', 'UsersController@profile')->name('user.profile');

// Admin Routes
Route::group(['prefix'=>'admin', 'middleware'=>['admin']], function(){
  Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('users', 'AdminController@users')->name('admin.users');
  Route::get('ads', 'AdminController@ads')->name('admin.ads');
});

Route::group(['prefix'=>'api', 'middleware'=>['admin']], function(){
  Route::post('dashboard/data', 'AdminController@dashboardData')->name('dashboard.data.json');
});

Auth::routes();
