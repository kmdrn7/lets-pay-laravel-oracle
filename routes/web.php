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

// User Route
Route::get('/', [
    'uses' => 'NasabahController@index',
    'as' => 'nasabah.index'
]);

// Admin Route
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

    Route::group(['middleware' => 'guest:admin'], function(){
        Route::get('/login', [
            'uses' => 'Auth\LoginController@showLoginForm',
            'as' => 'admin.login'
        ]);

        Route::post('/login', [
            'uses' => 'Auth\LoginController@login',
            'as' => 'admin.login.post'
        ]);
    });

    Route::group(['middleware' => 'auth:admin'], function(){
        Route::get('/', function(){
            return redirect('/admin/dashboard');
        });
        Route::get('/dashboard', [
            'uses' => 'DashboardController@index',
            'as' => 'admin.dashboard'
        ]);
        Route::get('/nasabah', [
            'uses' => 'NasabahController@index',
            'as' => 'admin.nasabah'
        ]);
        Route::get('/logout', [
            'uses' => 'Auth\LoginController@logout',
            'as' => 'admin.logout'
        ]);
    });
});