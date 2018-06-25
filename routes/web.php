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

        Route::get('/api/v1/datatable/nasabah', [
            'uses' => 'NasabahController@get_datatables',
            'as' => 'admin.api.datatable.nasabah'
        ]);
        Route::post('/api/v1/insert/nasabah', [
            'uses' => 'NasabahController@insert_ajax',
            'as' => 'admin.api.insert_ajax.nasabah'
        ]);
        Route::post('/api/v1/delete/nasabah', [
            'uses' => 'NasabahController@delete_ajax',
            'as' => 'admin.api.delete_ajax.nasabah'
        ]);
        Route::get('/api/v1/get/nasabah', [
            'uses' => 'NasabahController@get_ajax',
            'as' => 'admin.api.get_ajax.nasabah'
        ]);
        Route::post('/api/v1/update/nasabah', [
            'uses' => 'NasabahController@update_ajax',
            'as' => 'admin.api.update_ajax.nasabah'
        ]);
    });
});