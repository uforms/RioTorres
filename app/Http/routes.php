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

Route::get('tomas/Aves','AvesController@index');
Route::get('tomas/Aguas','AguasController@index');
Route::get('tomas/Suelos','SuelosController@index');


Route::get('tomas/crear/Aves' , 'AvesController@create');
Route::get('tomas/crear/Aguas' , 'AguasController@create');
Route::get('tomas/crear/Suelos' , 'SuelosController@create');

Route::post('tomas/crear/Aves','AvesController@store');
Route::post('tomas/crear/Aguas','AguasController@store');
Route::post('tomas/crear/Suelos','SuelosController@store');

Route::get('/gps','GpsController@index');

//Ajax routes (API)
Route::get('get/parcelas/{sitio_id}' , 'SuelosController@getParcelas');
Route::get('get/parcela/{parcela_id}', 'SuelosController@getParcela');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
