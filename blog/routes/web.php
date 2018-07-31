<?php

use Illuminate\Support\Facades\Route, Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PostController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/post/view/{slug}', 'PostController@view')->name('post-view');
Route::match(['get', 'post'],'/post/create', 'PostController@create')->name('post-create');

//Route::get('add','PostController@create');
//Route::post('add','PostController@store');
//Route::get('car','PostController@index');
//Route::get('edit/{id}','PostController@edit');
//Route::post('edit/{id}','PostController@update');
//Route::delete('{id}','PostController@destroy');
