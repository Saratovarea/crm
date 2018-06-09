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

