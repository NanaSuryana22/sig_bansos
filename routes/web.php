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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'MainController@index')->name('index');
Route::resource('user', 'UserController');
Route::resource('penduduk', 'PendudukController');

Route::group(['middleware' => ['auth', 'role:dinas_sosial']], function () {
    Route::get('dinas_sosial', 'DinassosialController@index')->name('dinas_sosial');
    Route::resource('bantuan', 'BantuanController');
    Route::resource('data_kecamatan', 'DataKecamatanController');
    Route::resource('data_desa', 'DataDesaController');
    Route::resource('pengguna', 'PenggunaController');
    Route::resource('penyaluran', 'PenyaluranController');
});

Route::group(['middleware' => ['auth', 'role:kecamatan']], function () {
    Route::get('kecamatan', 'KecamatanController@index')->name('kecamatan');
});

Route::group(['middleware' => ['auth', 'role:desa']], function () {
    Route::get('desa', 'DesaController@index')->name('desa');
});

Route::group(['middleware' => ['auth', 'role:masyarakat']], function () {
    Route::get('masyarakat', 'MasyarakatController@index')->name('masyarakat');
});