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

Route::get('login', 'Auth\AuthController@getLogin')->name('login');
Route::post('auth/login', 'Auth\AuthController@postLogin')->name('login');
Route::post('/logout', 'Auth\AuthController@getLogout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('get_package',  'PackagesController@get_package');
Route::post('update_package',  'PackagesController@update_package');
Route::get('get_package_detail',  'PackagesController@get_package_detail');
Route::post('update_package_detail',  'PackagesController@update_package_detail');
Route::get('package_get_details/{id}',  'PackagesController@package_get_details')->name('detalle_paquete');


Route::get('get_destination',  'DestinationsController@get_destination');
Route::post('update_destination',  'DestinationsController@update_destination');

Route::get('get_service',  'ServicesController@get_service');
Route::post('update_service',  'ServicesController@update_service');

Route::get('get_section',  'SectionsController@get_section');
Route::post('update_title_section',  'SectionsController@update_title_section');

Route::get('/', 'HomeController@index')->name('home');
