<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([

	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//pendaftaran PB Rayon
Route::get('pendaftaranPB','PasangBaruController@create');
Route::post('pendaftaranPB','PasangBaruController@store');

Route::get('monitoringPB','PasangBaruController@show');

Route::get('uploadrencana','MonitoringController@rencana');
Route::post('uploadrencanastore/{id}','MonitoringController@rencanastore');


Route::get('kajiankelayakan/{id}',['uses'=> 'MonitoringController@kajiankelayakan']);
Route::post('kajiankelayakan/{id}',['uses'=> 'MonitoringController@kajiankelayakanstore']);

Route::get('bayarbp/{id}',['uses'=> 'MonitoringController@bayarbp']);
Route::post('bayarbp/{id}',['uses'=> 'MonitoringController@bayarbpstore']);

Route::get('perintahkerja/{id}',['uses'=> 'MonitoringController@perintahkerja']);
Route::post('perintahkerja/{id}',['uses'=> 'MonitoringController@perintahkerjastore']);

Route::get('pjbtl/{id}',['uses'=> 'MonitoringController@pjbtl']);
Route::post('pjbtl/{id}',['uses'=> 'MonitoringController@pjbtlstore']);

Route::get('updatePB/{id}',['uses'=> 'PasangBaruController@edit']);
Route::post('updatePB/{id}',['uses'=> 'PasangBaruController@update']);

Route::get('updatePD/{id}',['uses'=> 'PerubahanDayaController@edit']);
Route::post('updatePD/{id}',['uses'=> 'PerubahanDayaController@update']);

Route::get('pemasanganapp/{id}',['uses'=> 'MonitoringController@pemasanganapp']);
Route::post('pemasanganapp/{id}',['uses'=> 'MonitoringController@pemasanganappstore']);

Route::get('deletePB/{id}',['uses'=> 'PasangBaruController@destroy']);

//pendaftaran PD Rayon
Route::get('pendaftaranPD','PerubahanDayaController@create');
Route::post('pendaftaranPD',['uses'=> 'PerubahanDayaController@store']);

Route::get('formPD/{id}',['uses'=> 'PerubahanDayaController@createform']);

Route::get('monitoringPD','PerubahanDayaController@show');

Route::get('daftarpelanggan','MonitoringController@daftarpelanggan');

Route::get('downloadberkas','MonitoringController@downloadberkas');


Route::get('logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/home');
});

