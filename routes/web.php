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

Route::get('profile', 'UserController@profile')->name('user.profile');
Route::post('profile', 'UserController@update')->name('user.update');
Route::delete('profile', 'UserController@AvatarDelete')->name('user.avatar.delete');

Route::get('/s3', 'HomeController@s3')->name('s3');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
