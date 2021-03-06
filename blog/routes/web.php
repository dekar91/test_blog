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

/** TODO:
 * Separate API and site to different routes posts -> api/posts.
 * Make APi REST-looking: post, post/update, post/delete
 * Create resource for Auth
 */

Auth::routes();

Route::resource('post', 'Api\PostController')->only(['index', 'view', 'create', 'delete']);

Route::get('/', 'PostController@index')->name('home');

Route::get('/post/view/{slug}', 'PostController@view')->name('post-view');
Route::get('/post/delete/{slug}', 'PostController@delete')->name('post-delete')->middleware('auth');
Route::match(['get', 'post'],'/post/create', 'PostController@create')->name('post-create')->middleware('auth');
