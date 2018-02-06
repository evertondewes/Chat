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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('message.report',[
    'as' => 'message.report',
    'uses' => 'MessageController@report'
]);

Route::resource('message', 'MessageController');

Route::get('user',[
    'as' => 'user',
    'uses' => 'UserController@index'
]);

Route::put('/user/update/{user}',[
    'as' => 'user.update',
    'uses' => 'UserController@update'
]);