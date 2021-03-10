<?php

use Illuminate\Support\Facades\Route;

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

//User
Route::group(['prefix' => '/'], function () {
    Route::get('/', 'UserController@list');
    Route::post('/create', 'UserController@store')->name('user.store');
    Route::get('/create', 'UserController@create');
    Route::get('data', 'UserController@listData')->name('user.data');
    Route::get('delete', 'UserController@destroy');
    Route::get('{user}', 'UserController@edit')->name('user');
    Route::patch('{user}', 'UserController@update');
});