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
Route::get('/sebaran_bansos_kecamatan', 'PetaSebaranBansosKecamatanController@index')->name('sebaran_bansos_kecamatan');
Route::get('/sebaran_bansos_kecamatan/{id}', 'PetaSebaranBansosKecamatanController@show')->name('sebaran_bansos_kecamatan.show');
Route::get('/sebaran_bansos_desa', 'PetaSebaranBansosDesaController@index')->name('sebaran_bansos_desa');
Route::get('/sebaran_bansos_desa/{id}', 'PetaSebaranBansosDesaController@show')->name('sebaran_bansos_desa.show');
Route::get('data_penerima_bansos/{penyaluran_id}', 'DataWargaPenerimaBanSosController@data_penerima_bansos')->name('warga_penerima_bansos');

Route::group(['middleware' => ['auth', 'role:dinas_sosial']], function () {
    Route::get('dinas_sosial', 'DinassosialController@index')->name('dinas_sosial');
    Route::resource('bantuan', 'BantuanController');
    Route::resource('data_kecamatan', 'DataKecamatanController');
    Route::resource('data_desa', 'DataDesaController');
    Route::resource('pengguna', 'PenggunaController');
    Route::resource('penyaluran', 'PenyaluranController');
    Route::get('/desa_list/{kecamatan_id}', 'DinassosialController@desa_list');
    Route::get('/getQuota/{bantuan_id}', 'PenyaluranController@getQuota');
    Route::get('/data_penduduk/{penyaluran_id}', 'PenyaluranController@data_penduduk')->name('penyaluran.data_penduduk');
    Route::resource('laporan_tingkat_kemensos', 'LaporanTingkatKemensosController');
});

Route::group(['middleware' => ['auth', 'role:kecamatan']], function () {
    Route::get('kecamatan', 'KecamatanController@index')->name('kecamatan');
    Route::resource('laporan_tingkat_kecamatan', 'LaporanTingkatKecamatanController');
    Route::resource('tindaklanjutbansoskecamatan', 'TindakLanjutBansosKecamatanController');
});

Route::group(['middleware' => ['auth', 'role:desa']], function () {
    Route::get('desa', 'DesaController@index')->name('desa');
    Route::resource('laporan_tingkat_desa', 'TindakLanjutPelaporanController');
    Route::get('show/{id}', 'PelaporanController@show')->name('pelaporan_desa.show');
    Route::resource('tindaklanjutbansosdesa', 'TindakLanjutBansosDesaController');
    Route::resource('penduduk', 'PendudukController');
    Route::post('/penduduk/import_excel', 'PendudukController@import_excel');
});

Route::group(['middleware' => ['auth', 'role:masyarakat']], function () {
    Route::get('masyarakat', 'MasyarakatController@index')->name('masyarakat');
    Route::resource('pelaporan', 'PelaporanController');
    Route::get('/desa/{kecamatan_id}', 'PenyaluranController@getDesa');
});