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

    // 专题
    Route::get('topic/{topic}', 'TopicController@index');
    Route::get('topic/{topic}/submit', 'TopicController@submit');

    // 通知
    Route::get('/notices', 'NoticeController@index');
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
        Route::get('/index', '\App\Admin\Controllers\IndexController@index')->name('admin.index');
        Route::get('/logout', '\App\Admin\Controllers\IndexController@logout')->name('admin.logout');

        Route::group(['middleware' => 'can:system'], function () {
            // 用户相关
            Route::get('/users', '\App\Admin\Controllers\UserController@index')->name('admin.users.index');
            Route::get('/users/create', '\App\Admin\Controllers\UserController@create')->name('admin.users.create');
            Route::get('/users/{user}/edit', '\App\Admin\Controllers\UserController@edit')->name('admin.users.edit');
            Route::post('/users/store', '\App\Admin\Controllers\UserController@store')->name('admin.users.store');
            Route::post('/users/{user}', '\App\Admin\Controllers\UserController@update')->name('admin.users.update');
            Route::get('/users/{user}/delete', '\App\Admin\Controllers\UserController@delete')->name('admin.users.delete');
            Route::get('/users/{user}/role', '\App\Admin\Controllers\UserController@role')->name('admin.users.role');
            Route::post('/users/{user}/role', '\App\Admin\Controllers\UserController@assignRole')->name('admin.users.assign');// 给用户分配角色

            // 角色
            Route::get('/roles', '\App\Admin\Controllers\RoleController@index');
            Route::get('/roles/create', '\App\Admin\Controllers\RoleController@create');
            Route::get('/roles/{role}/edit', '\App\Admin\Controllers\RoleController@edit');
            Route::post('/roles/store', '\App\Admin\Controllers\RoleController@store');
            Route::post('/roles/{role}', '\App\Admin\Controllers\RoleController@update');
            Route::get('/roles/{role}/destroy', '\App\Admin\Controllers\RoleController@destroy');
            Route::get('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission');
            Route::post('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@assignPermission'); // 给角色分配权限

            // 权限
            Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
            Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
            Route::get('/permissions/{permission}/edit', '\App\Admin\Controllers\PermissionController@edit');
            Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
            Route::post('/permissions/{permission}', '\App\Admin\Controllers\PermissionController@update');
            Route::get('/permissions/{permission}/destroy', '\App\Admin\Controllers\PermissionController@destroy');
        });

        Route::group(['middleware' => 'can:posts'], function () {
            // 文章
            Route::get('/posts', '\App\Admin\Controllers\PostController@index');
            Route::post('/posts/{post}/status', '\App\Admin\Controllers\PostController@status');
        });

        Route::group(['middleware' => 'can:topics'], function () {
            // 专题
            Route::get('/topics', '\App\Admin\Controllers\TopicController@index');
            Route::get('/topics/create', '\App\Admin\Controllers\TopicController@create');
            Route::get('/topics/{topic}/edit', '\App\Admin\Controllers\TopicController@edit');
            Route::post('/topics/store', '\App\Admin\Controllers\TopicController@store');
            Route::post('/topics/{topic}', '\App\Admin\Controllers\TopicController@update');
            Route::get('/topics/{topic}/destroy', '\App\Admin\Controllers\TopicController@destroy');
        });
        Route::group(['middleware' => 'can:notices'], function () {
            // 通知
            Route::get('/notices', '\App\Admin\Controllers\NoticeController@index');
            Route::get('/notices/create', '\App\Admin\Controllers\NoticeController@create');
            Route::get('/notices/{notice}/edit', '\App\Admin\Controllers\NoticeController@edit');
            Route::post('/notices/store', '\App\Admin\Controllers\NoticeController@store');
            Route::post('/notices/{notice}', '\App\Admin\Controllers\NoticeController@update');
            Route::get('/notices/{notice}/destroy', '\App\Admin\Controllers\NoticeController@destroy');
        });
    });
});