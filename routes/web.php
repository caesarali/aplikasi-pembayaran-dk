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

Route::group(['middleware' => ['auth', 'notAdmin']], function() {
	Route::get('/home', 'HomeController@index')->name('home');

	// Teller Routing
	Route::post('/bayar-dk', 'DKController@bayarDK')->middleware('level:teller')->name('bayar.dk');
	// Route::get('history', 'DKController@history')->middleware('level:teller')->name('history');

	// BEM Routing
	Route::get('cek-pembayaran-dk', 'DKController@cekPembayaran')->middleware('level:bendum')->name('cek.pembayaran');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'level:admin']], function () {
	Route::get('/', 'HomeController@index')->name('admin.home');
	Route::resource('mahasiswa', 'MahasiswaController');

	Route::get('/users/{level}', 'UserController@index')->name('user.index');
	Route::get('user/create', 'UserController@create')->name('user.create');
	Route::post('/user', 'UserController@store')->name('user.store');
	Route::get('/user/{user}', 'UserController@edit')->name('user.edit');
	Route::patch('/user/{user}', 'UserController@update')->name('user.update');
	Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');
});
