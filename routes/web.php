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
Route::get('/search', 'IndexController@search');
Route::get('/posts/{post}/show', 'PostController@show');
Route::group(['middleware' => 'auth:web'], function () {
    // 文章相关
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/posts/{post}/delete', 'PostController@delete');
    Route::post('/posts/image/upload', 'PostController@image');
    Route::post('/posts', 'PostController@store');
    Route::post('/posts/comment', 'PostController@comment');
    Route::post('/posts/{post}', 'PostController@update');
    Route::get('/posts/{post}/zan', 'PostController@zan');
    Route::get('/posts/{post}/unzan', 'PostController@unzan');

    // 个人中心
    Route::get('/user/{user}', 'UserController@index');
    Route::post('user/{user}/fan', 'UserController@fan');
    Route::post('user/{user}/unfan', 'UserController@unfan');

    // 主题
    Route::get('topic/{topic}', 'TopicController@index');
    Route::get('topic/{topic}/submit', 'TopicController@submit');
});


Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');

// 后台
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', '\App\Admin\Controllers\LoginController@index')->name('admin.login');
    Route::post('/login', '\App\Admin\Controllers\LoginController@login');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/index', '\App\Admin\Controllers\IndexController@index');
        Route::get('/logout', '\App\Admin\Controllers\IndexController@logout');

        // 用户相关
        Route::get('/users', '\App\Admin\Controllers\UserController@index');
        Route::get('/users/create', '\App\Admin\Controllers\UserController@create');
        Route::get('/users/{user}/edit', '\App\Admin\Controllers\UserController@edit');
        Route::post('/users/store', '\App\Admin\Controllers\UserController@store');
        Route::post('/users/{user}', '\App\Admin\Controllers\UserController@update');
        Route::get('/users/{user}/delete', '\App\Admin\Controllers\UserController@delete');

        // 角色
        Route::get('/roles', '\App\Admin\Controllers\RoleController@index');
        Route::get('/roles/create', '\App\Admin\Controllers\RoleController@create');
        Route::get('/roles/{role}/edit', '\App\Admin\Controllers\RoleController@edit');
        Route::post('/roles/store', '\App\Admin\Controllers\RoleController@store');
        Route::post('/roles/{role}', '\App\Admin\Controllers\RoleController@update');
        Route::get('/roles/{role}/destroy', '\App\Admin\Controllers\RoleController@destroy');
        Route::get('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission');
        Route::post('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@assignPermission'); // 分配权限

        // 权限
        Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
        Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
        Route::get('/permissions/{permission}/edit', '\App\Admin\Controllers\PermissionController@edit');
        Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
        Route::post('/permissions/{permission}', '\App\Admin\Controllers\PermissionController@update');
        Route::get('/permissions/{permission}/destroy', '\App\Admin\Controllers\PermissionController@destroy');
    });
});