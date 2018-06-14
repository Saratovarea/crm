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

Route::get('/', 'MainController@index')->name('home');

/** LK **/
Route::get('/lk', 'LkController@lk')->name('lk');
Route::post('/lk/user/update', 'LkController@update')->name('lk/user/update');

/** TASK **/
Route::get('/task', 'TaskController@view')->name('task/new');
Route::get('/task/{id}', 'TaskController@view')->name('task');
Route::post('/task/iud', 'TaskController@iud')->name('task/iud');

/** ADMINISTRATION **/
Route::get('/administration', 'AdministrationController@view')->name('administration');
Route::get('/administration/statuses', 'AdministrationController@statuses')->name('administration/statuses');
Route::post('/administration/statuses/add', 'AdministrationController@statusAdd')->name('administration/statuses/add');
Route::post('/administration/statuses/edit/{id}', 'AdministrationController@statusUpdate')->name('administration/statuses/edit');
Route::post('/administration/statuses/delete/{id}', 'AdministrationController@statusDelete')->name('administration/statuses/delete');
Route::get('/administration/categories', 'AdministrationController@categories')->name('administration/categories');
Route::post('/administration/categories/add', 'AdministrationController@categoryAdd')->name('administration/categories/add');
Route::post('/administration/categories/edit/{id}', 'AdministrationController@categoryUpdate')->name('administration/categories/edit');
Route::post('/administration/categories/delete/{id}', 'AdministrationController@categoryDelete')->name('administration/categories/delete');
