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
Route::post('dial', 'PruebaController@db_dial');
Route::post('listar', 'PruebaController@listarproducto');
Route::get('dial1', 'PruebaController@db_dial1');
Route::get('grafico', 'PruebaController@graficar');

Route::post('inici',function(){
	$resultado =Input::get('valor1') + Input::get('valor2');
	$data=array('valor'=>$resultado,'msg'=>'holitas....');
	return Response::json($data);
});
Route::post('inio/{id?}',function($id=null){
	return "que sera ".$id;
});
Route::post('inici1','PruebaController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::post('inicio',function(){
	echo Prueba::getMensaje('Mac');
});


Route::group(['middleware' => 'auth'], function()
{
    Route::post('incio/{id?}',function($id=null){
		return "que sera ".$id;
	});
});