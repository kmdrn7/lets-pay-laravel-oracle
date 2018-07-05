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
Route::group(['middleware' => 'auth:nasabah'], function(){
    Route::get('/', function(){
        return redirect('/dashboard');
    });

    Route::get('/dashboard', [
        'uses' => 'NasabahController@index',
        'as' => 'nasabah.index'
    ]);
    Route::get('/profil', [
        'uses' => 'NasabahController@profil',
        'as' => 'nasabah.profil'
    ]);
    Route::post('/profil', [
        'uses' => 'NasabahController@post_profil',
        'as' => 'nasabah.post_profil'
    ]);
    Route::get('/bayar', [
        'uses' => 'NasabahController@bayar',
        'as' => 'nasabah.bayar'
    ]);

    Route::get('/logout', [
        'uses' => 'Auth\LoginController@logout',
        'as' => 'nasabah.logout'
    ]);
});

Route::group(['middleware' => 'guest:nasabah'], function(){
    Route::get('/login', [
        'uses' => 'Auth\LoginController@showLoginForm',
        'as' => 'nasabah.login'
    ]);
    Route::post('/login', [
        'uses' => 'Auth\LoginController@login',
        'as' => 'nasabah.login.post'
    ]);
});

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
        Route::get('/transaksi', [
            'uses' => 'TransaksiBankController@index',
            'as' => 'admin.transaksi.bank'
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

        // Transaksi Bank
        Route::post('/api/v1/transaksi/nasabah', [
            'uses' => 'TransaksiBankController@get_nasabah_info',
            'as' => 'admin.api.transaksi.get_nasabah_info'
        ]);
        Route::post('/api/v1/insert/transaksi-bank', [
            'uses' => 'TransaksiBankController@transaksi',
            'as' => 'admin.api.transaksi.transaksi'
        ]);
        Route::post('/api/v1/delete/transaksi-bank', [
            'uses' => 'TransaksiBankController@hapus_transaksi',
            'as' => 'admin.api.transaksi.hapus'
        ]);

        // Laporan
        Route::get('/laporan-nasabah', [
            'uses' => 'LaporanNasabahController@index',
            'as' => 'admin.laporan-nasabah.index'
        ]);
        Route::get('/laporan-transaksi-bank', [
            'uses' => 'LaporanTransaksiBankController@index',
            'as' => 'admin.laporan-transaksi-bank.index'
        ]);
        Route::get('/api/v1/get/nasabah/dt', [
            'uses' => 'LaporanNasabahController@datatables',
            'as' => 'admin.laporan-nasabah.datatable'
        ]);
        Route::get('/api/v1/get/transaksi-bank/dt', [
            'uses' => 'LaporanTransaksiBankController@datatables',
            'as' => 'admin.laporan-transaksi-bank.datatable'
        ]);
    });
});