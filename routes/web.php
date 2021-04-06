<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});





// login dan logout
Route::get('/login', function () {
    return view('login.login');
})->name('login');


Route::get('/data', function () {
    return view('templatetable');
});


Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');


Route::get('/template', function () {
    return view('template2');
});



Route::group(['middleware'=>['auth:user','cekLevel:admin']],function(){

    Route::get('/beranda', 'BerandaController@index' );



    // outlet
    Route::get('/outlet','OutletController@index')->name('dataoutlet');
    Route::get('/tambahoutlet','OutletController@create')->name('tambah-outlet');
    Route::post('/store/outlet','OutletController@store')->name('store-outlet');
    Route::post('/update/outlet/{id}','OutletController@update')->name('update-outlet');
    Route::get('/editoutlet/{id}','OutletController@edit')->name('edit-outlet');
    Route::get('/hapusoutlet/{id}','OutletController@destroy')->name('hapus-outlet');


    // paket
    Route::get('/paket','@PaketController@index')->name('datapaket');







    // transaksi
    Route::get('/transaksi','TransaksiController@index')->name('data-transaksi');
    Route::get('/tambah-transaksi','TransaksiController@create')->name('tambah-transaksi');
    Route::post('/store-transaki','TransaksiController@store')->name('store-transaksi');
    Route::get('/update-status-proses{id}','TransaksiController@status')->name('update-status');
    Route::get('/update-status-selesai{id}','TransaksiController@selesai')->name('update-selesai');
    Route::get('/update-status-pickup{id}','TransaksiController@pick')->name('update-pick');
    Route::get('/hapus-transaksi/{id}','TransaksiController@destroy')->name('hapus-transaksi');
    Route::get('/detail-transaksi/{id}','TransaksiController@detail')->name('detail-transaksi');
    Route::get('/cetak-transaksi/{id}','TransaksiController@cetak')->name('cetak-invoice');
    Route::post('/store-detail/{id}','TransaksiController@storedetail')->name('store-detail');
    Route::match(['get', 'post'], '/update-detail/{id}','TransaksiController@updatedetail')->name('update-detail');


    // paket
    Route::get('/paket','PaketController@index')->name('data-paket');












});


Route::group(['middleware'=>['auth:member,user','cekLevel:admin,member']],function(){
    Route::get('/beranda', 'BerandaController@index' );


    Route::get('/cek-transaksi','TransaksiController@cekpesan')->name('cek-pesanan');

});





Route::get('/home', 'HomeController@index')->name('home');
