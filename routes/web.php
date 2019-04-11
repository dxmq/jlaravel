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

Route::get('/', 'IndexController@index');
Route::get('/posts/{post}/show', 'PostController@show');
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/posts/{post}/delete', 'PostController@delete');
    Route::post('/posts/image/upload', 'PostController@image');
    Route::post('/posts', 'PostController@store');
    Route::post('/posts/comment', 'PostController@comment');
    Route::post('/posts/{post}', 'PostController@update');

});


Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');