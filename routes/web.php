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

    // Dashboard
    Route::get('/dashboard', [
        'uses' => 'NasabahController@index',
        'as' => 'nasabah.index'
    ]);

    // Profil
    Route::get('/profil', [
        'uses' => 'NasabahController@profil',
        'as' => 'nasabah.profil'
    ]);
    Route::post('/profil', [
        'uses' => 'NasabahController@post_profil',
        'as' => 'nasabah.post_profil'
    ]);

    // Histori Transaksi
    Route::get('/histori-transaksi', [
        'uses' => 'NasabahController@histori_transaksi',
        'as' => 'nasabah.histori-transaksi'
    ]);
    Route::get('/api/v1/get/transaksi-bank/dt', [
        'uses' => 'NasabahController@dt_bank',
        'as' => 'nasabah.histori-transaksi.dt-bank'
    ]);
    Route::get('/api/v1/get/transaksi-lpc/dt', [
        'uses' => 'NasabahController@dt_lpc',
        'as' => 'nasabah.histori-transaksi.dt-lpc'
    ]);

    // Buat Pembayaran
    Route::get('/buat-pembayaran', [
        'uses' => 'NasabahController@buat_pembayaran',
        'as' => 'nasabah.buat-pembayaran'
    ]);
    Route::get('/api/v1/datatable/pembayaran', [
        'uses' => 'PembayaranController@get_datatables',
        'as' => 'admin.api.datatable.pembayaran'
    ]);
    Route::post('/api/v1/insert/pembayaran', [
        'uses' => 'PembayaranController@insert_ajax',
        'as' => 'admin.api.insert_ajax.pembayaran'
    ]);
    Route::post('/api/v1/delete/pembayaran', [
        'uses' => 'PembayaranController@delete_ajax',
        'as' => 'admin.api.delete_ajax.pembayaran'
    ]);
    Route::get('/api/v1/get/pembayaran', [
        'uses' => 'PembayaranController@get_ajax',
        'as' => 'admin.api.get_ajax.pembayaran'
    ]);
    Route::post('/api/v1/update/pembayaran', [
        'uses' => 'PembayaranController@update_ajax',
        'as' => 'admin.api.update_ajax.pembayaran'
    ]);

    // Bayar
    Route::get('/bayar', [
        'uses' => 'PembayaranController@index',
        'as' => 'nasabah.bayar'
    ]);
    Route::post('/api/v1/bayar/cek-kode', [
        'uses' => 'PembayaranController@cek_kode',
        'as' => 'nasabah.bayar.cek-kode'
    ]);
    Route::post('/api/v1/bayar/bayar', [
        'uses' => 'PembayaranController@bayar',
        'as' => 'nasabah.bayar.bayar'
    ]);

    // Transfer
    Route::get('/transfer', [
        'uses' => 'TransferController@index',
        'as' => 'nasabah.transfer'
    ]);
    Route::post('/api/v1/transfer/transfer', [
        'uses' => 'TransferController@transfer',
        'as' => 'nasabah.transfer.transfer'
    ]);

    // Logout
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

// ===============================================================================
//
// Admin Route
//
// ===============================================================================
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
        Route::get('/administrator', [
            'uses' => 'AdminController@index',
            'as' => 'admin.admin'
        ]);
        Route::get('/logout', [
            'uses' => 'Auth\LoginController@logout',
            'as' => 'admin.logout'
        ]);

        // Nasabah
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

        // Admin
        Route::get('/api/v1/datatable/administrator', [
            'uses' => 'AdminController@get_datatables',
            'as' => 'admin.api.datatable.admin'
        ]);
        Route::post('/api/v1/insert/administrator', [
            'uses' => 'AdminController@insert_ajax',
            'as' => 'admin.api.insert_ajax.admin'
        ]);
        Route::post('/api/v1/delete/administrator', [
            'uses' => 'AdminController@delete_ajax',
            'as' => 'admin.api.delete_ajax.admin'
        ]);
        Route::get('/api/v1/get/administrator', [
            'uses' => 'AdminController@get_ajax',
            'as' => 'admin.api.get_ajax.admin'
        ]);
        Route::post('/api/v1/update/administrator', [
            'uses' => 'AdminController@update_ajax',
            'as' => 'admin.api.update_ajax.admin'
        ]);

        // Transaksi Bank
        Route::get('/transaksi', [
            'uses' => 'TransaksiBankController@index',
            'as' => 'admin.transaksi.bank'
        ]);
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

        // Transaksi Letspay Coin
        Route::get('/transfer-lpc', [
            'uses' => 'TransaksiLPCController@index',
            'as' => 'admin.transaksi.lpc'
        ]);
        Route::post('/api/v1/transaksi-lpc/nasabah', [
            'uses' => 'TransaksiLPCController@get_nasabah_info',
            'as' => 'admin.api.transaksi-lpc.get_nasabah_info'
        ]);
        Route::post('/api/v1/lpc/cek-saldo', [
            'uses' => 'TransaksiLPCController@cek_saldo',
            'as' => 'admin.api.transaksi-lpc.cek_saldo'
        ]);
        Route::post('/api/v1/insert/transaksi-lpc', [
            'uses' => 'TransaksiLPCController@transaksi',
            'as' => 'admin.api.transaksi-lpc.transaksi'
        ]);
        Route::post('/api/v1/delete/transaksi-lpc', [
            'uses' => 'TransaksiLPCController@hapus_transaksi',
            'as' => 'admin.api.transaksi-lpc.hapus'
        ]);

        // Laporan
        Route::get('/laporan-nasabah', [
            'uses' => 'LaporanNasabahController@index',
            'as' => 'admin.laporan-nasabah.index'
        ]);
        Route::get('/laporan-administrator', [
            'uses' => 'LaporanAdminController@index',
            'as' => 'admin.laporan-administrator.index'
        ]);
        Route::get('/laporan-transaksi-bank', [
            'uses' => 'LaporanTransaksiBankController@index',
            'as' => 'admin.laporan-transaksi-bank.index'
        ]);
        Route::get('/laporan-transaksi-lpc', [
            'uses' => 'LaporanTransaksiLPCController@index',
            'as' => 'admin.laporan-transaksi-lpc.index'
        ]);

        Route::get('/api/v1/get/nasabah/dt', [
            'uses' => 'LaporanNasabahController@datatables',
            'as' => 'admin.laporan-nasabah.datatable'
        ]);
        Route::get('/api/v1/get/admin/dt', [
            'uses' => 'LaporanAdminController@datatables',
            'as' => 'admin.laporan-admin.datatable'
        ]);
        Route::get('/api/v1/get/transaksi-bank/dt', [
            'uses' => 'LaporanTransaksiBankController@datatables',
            'as' => 'admin.laporan-transaksi-bank.datatable'
        ]);
        Route::get('/api/v1/get/transaksi-lpc/dt', [
            'uses' => 'LaporanTransaksiLPCController@datatables',
            'as' => 'admin.laporan-transaksi-lpc.datatable'
        ]);
    });
});