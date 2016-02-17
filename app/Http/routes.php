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

Route::get('/', 'HomeController@index');
Route::get('/c', 'CController@index');
Route::get('home', 'HomeController@index');

	//llamados a las distintas vistas 	
Route::group(['middleware' => ['auth','nocache']], function () {
	Route::post('almacenar', 'HorariosController@almacenar');
	//---------------------------------------------------
	Route::group(['middleware'=>'rol'], function(){
			Route::resource('rol', 'RolController');
			Route::resource('pais', 'PaistController');
			Route::resource('departamento', 'DepartController');
			Route::resource('sede', 'Sede1Controller');
			//Route::resource('statuss', 'StatussController');
			Route::resource('carreras', 'CarrerasController');
			Route::resource('user', 'UserController');
			Route::resource('cargos', 'CargoController');
			Route::resource('edificios', 'EdificiosController');
			Route::resource('salones', 'SalonesController');
			Route::resource('laboratorios', 'LaboratoriosController');
			Route::resource('grupos', 'GruposController');
			Route::resource('materias', 'MateriasController');
			Route::resource('materiaqpdud', 'MateriaqpdudController');
			//Route::resource('materiaqpdud1', 'MateriaqpdudController');
			Route::resource('cpm', 'CpmController');
			Route::resource('planes', 'PlanesController');
			Route::resource('cargospd', 'CargospdController');
			Route::resource('horarios', 'HorariosController');
			
			
			
			
			
		});
			
	//---------------------------------------------------------
	
	//**********************************************************
	Route::resource('atender', 'AtenderController');
	Route::resource('versol', 'VersolController');
	Route::resource('solicitud', 'SolicitudController');
	Route::resource('rgral', 'RgralController');
	//Route::resource('opatendido', 'OpatendidoController');
	Route::resource('mostrar', 'MateriaqpdudController');
	Route::resource('mostrar1', 'CargospdController');
	Route::resource('useredit', 'UsereditController');
	Route::resource('passedit', 'PasseditController');
	Route::resource('verhorarios', 'VerController');
	Route::resource('verp', 'VerpController');
	Route::resource('welcome', 'WelcomeController');
	//***********************************************************
	//Route::post('getatendidos', 'OpatendidoController@getAtendidos');
	//Route::post('getpendientes', 'OpatendidoController@getPendientes');
	//Route::post('getatendidas', 'OpatendidoController@getAtendidas');
	Route::controller('buscar','BuscarController');
	
	
	
	Route::get('getmateriaqpdud', 'MateriaqpdudController@getMateriaqpdud');
	Route::get('getcargospd', 'CargospdController@getCargospd');
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
