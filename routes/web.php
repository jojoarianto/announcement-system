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
    return view('region');
});

Route::get('pengumuman', 'PengumumanController@index');

Route::get('get-data', [
	'as' => 'get-data',
	'uses' => 'PengumumanController@getData',
]);
