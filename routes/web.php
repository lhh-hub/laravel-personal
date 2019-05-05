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

//Route::post('index','IndexController@index');

Auth::routes();

Route::get('/index', 'IndexController@index') ;


/*
Route::prefix('admin')->namespace('Admin')->group(function () {
    //后台首页
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');

    Route::middleware('auth.admin:admin')->name('admin.')->group(function () {
        Route::get('/', 'HomeController@index');
    });
});*/