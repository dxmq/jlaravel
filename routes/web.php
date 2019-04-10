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

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');

Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::get('/posts/{post}/delete', 'PostController@delete');
Route::post('/posts/image/upload', 'PostController@image');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}', 'PostController@update');

