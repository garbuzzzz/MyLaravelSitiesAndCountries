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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/countries', 'TestController@countries')->name('countries');
Route::get('/countries/{country}', 'TestController@cities')->name('country');
Route::get('/countries/{country}/{city}', 'TestController@sights')->name('city');
Route::get('/countries/{country}/{city}/{sight}', 'TestController@descriptions')->name('sight');

Route::match(['get', 'post'], '/admin/countries', 'AdminController@countries')->name('admin_countries');
Route::match(['get', 'post'], '/admin/countries/{country}', 'AdminController@cities')->name('admin_country');
Route::match(['get', 'post'], '/admin/countries/{country}/{city}', 'AdminController@sights')->name('admin_city');
Route::match(['get', 'post'], '/admin/countries/{country}/{city}', 'AdminController@sights')->name('admin_city');
Route::match(['get', 'post'], '/admin/countries/{country}/{city}/{sight}', 'AdminController@descriptions')->name('admin_sight');

