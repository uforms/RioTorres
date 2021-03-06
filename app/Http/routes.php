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

Route::get('tomas/Aguas','AguasController@index');
Route::get('tomas/Aves','AvesController@index');
Route::get('tomas/Suelos','SuelosController@index');

Route::get('tomas/crear/Aguas' , 'AguasController@create');
Route::get('tomas/crear/Aves' , 'AvesController@create');
Route::get('tomas/crear/Suelos' , 'SuelosController@create');

Route::post('tomas/crear/Aguas','AguasController@store');
Route::post('tomas/crear/Aves','AvesController@store');
Route::post('tomas/crear/Suelos','SuelosController@store');

Route::get('tomas/editar/Aguas/{tomaId}' , 'AguasController@edit');
Route::get('tomas/editar/Aves/{tomaId}'	 , 'AvesController@edit');

Route::post('tomas/editar/Aguas' , 'AguasController@update');
Route::post('tomas/editar/Aves' , 'AvesController@update');

Route::get('tomas/eliminar/Aguas/{tomaId}' , 'AguasController@destroy');
Route::get('tomas/eliminar/Aves/{tomaId}' , 'AvesController@destroy');

Route::get('/gps','GpsController@index');

//Reports
Route::post('/reporteAguas','AguasReporteController@generarReporte');
Route::post('/reporteAves' ,'AvesReporteController@generarReporte');

Route::get('/remuestreo/{numeroAnillo}' , 'AvesController@Remuestra');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
