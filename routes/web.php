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

//Route::view('/chat','chat');

Route::get('/chat','ChatController@index')->name('chat.index');
Route::get('/send','ChatController@send')->name('chat.send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
