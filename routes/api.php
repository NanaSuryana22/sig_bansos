<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    Route::get('sebaranbansoskecamatan', 'SebaranBansosKecamatanController@index')->name('sebaranbansoskecamatan.index');
    Route::get('sebaranbansosdesa', 'SebaranBansosDesaController@index')->name('sebaranbansosdesa.index');
    Route::get('petasebaranlaporan', 'SebaranLaporanController@index')->name('petasebaranlaporan.index');
});
