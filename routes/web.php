<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/name/{name?}', function($name = 'No especificado'){
    return 'Hola soy ' .$name;
});

Route::get('prueba/{name?}', 'PruebaController@prueba');

Route::resource('prueba','PruebaController');

/***Usuario***/

Route::post('/createUsuario','UsuarioController@create');

Route::get('/getUsuario/{IdUsuario?}','UsuarioController@getUsuario');

Route::get('/getUsuarioName/{NameUsuario?}','UsuarioController@getUsuarioName');

Route::get('/getUsuarioByUserContra/{NameUsuario?}/{ContraUsuario?}','UsuarioController@getUsuarioByUserContra');

Route::get('/getUsuarios','UsuarioController@allUsuarios');

Route::put('/updateUsuario/{IdUsuario?}','UsuarioController@update');

Route::delete('/deleteUsuario/{IdUsuario?}','UsuarioController@delete');

/***UsuarioHost***/

Route::post('/createHost','UsuarioHostController@create');

Route::get('/getHost/{IdUsuario?}','UsuarioHostController@getUsuario');

Route::get('/getAllHost','UsuarioHostController@allUsuarios');

Route::put('/updateHost/{IdHost?}','UsuarioHostController@update');

Route::delete('/deleteHost/{IdUsuario?}','UsuarioHostController@delete');

/***Servicio***/

Route::post('/createServicio','ServicioController@create');

Route::get('/getServicio/{IdServicios?}','ServicioController@getServicio');

Route::get('/getServicios','ServicioController@allServicios');

Route::put('/updateServicio/{IdServicios?}','ServicioController@update');

Route::delete('/deleteServicio/{IdServicios?}','ServicioController@delete');

/***Reserva***/

Route::post('/createReserva','ReservaController@create');

Route::get('/getReserva/{IdReserva?}','ReservaController@getReserva');

Route::get('/getReservas','ReservaController@allReservas');

Route::put('/updateReserva/{IdReserva?}','ReservaController@update');

Route::delete('/deleteReserva/{IdReserva?}','ReservaController@delete');

/***Reseña***/

Route::post('/createResena','ResenaController@create');

Route::get('/getResena/{IdResena?}','ResenaController@getResena');

Route::get('/getResenas','ResenaController@allResenas');

Route::put('/updateResena/{IdResena?}','ResenaController@update');

Route::delete('/deleteResena/{IdResena?}','ResernaController@delete');

/***Hospedaje***/

Route::post('/createHospedaje','HospedajeController@create');

Route::get('/getHospedaje/{IdHospedaje?}','HospedajeController@getHospedaje');

Route::get('/getHospedajes','HospedajeController@allHospedajes');

Route::put('/updateHospedaje/{IdHospedaje?}','HospedajeController@update');

Route::delete('/deleteHospedaje/{IdHospedaje?}','HospedajeController@delete');

/***Horario***/

Route::post('/createHorario','HorarioController@create');

Route::get('/getHorario/{IdHorario?}','HorarioController@getHorario');

Route::get('/getHorarios','HorarioController@allHorarios');

Route::put('/updateHorario/{IdHorario?}','HorarioController@update');

Route::delete('/deleteHorario/{IdHorario?}','HospedajeController@delete');

/***Cartera***/

Route::post('/createCartera','CarteraController@create');

Route::get('/getCartera/{IdCartera?}','CarteraController@getCartera');

Route::get('/getCarteras','CarteraController@allCarteras');

Route::put('/updateCartera/{IdCartera?}','HorarioController@update');

Route::delete('/deleteCartera/{IdUsuario?}','CarteraController@delete');

/***Actividad***/

Route::post('/createActividad','ActividadController@create');

Route::get('/getActividad/{IdActividad?}','ActividadController@getActividad');

Route::get('/getActividades','<ActividadController@allActivida></ActividadController@allActivida>des');

Route::put('/updateActividad/{IdActividad?}','ActividadController@update');

Route::delete('/deleteActividad/{IdActividad?}','ActividadController@delete');


/***EstadoReserva***/

Route::post('/createEstadoReserva','EstadoReservaController@create');

Route::get('/getEstadoReserva/{IdEstado?}','EstadoReservaController@getEstadoReserva');

Route::get('/getEstadoReserva','EstadoReservaController@allEstadoReserva');

Route::put('/updateEstadoReserva/{IdEstado?}','ActividadController@update');

Route::delete('/deleteEstadoReserva/{IdEstado?}','EstadoReservaController@delete');

/***Lugar***/

Route::post('/createLugar',' LugarController@create');

Route::delete('/deleteLugar/{IdLugar?}','LugarController@delete');

Route::get('/getLugar/{IdLugar?}','LugarController@getLugar');

Route::get('/getLugar','LugarController@allLugares');

Route::put('/updateLugar/{IdLugar?}','LugarController@update');

/***TipoServicio***/

Route::post('/createTipoServicio','TipoServicioController@create');

Route::delete('/deleteTipoServicio/{IdTipoServicio?}','TipoServicioController@delete');

Route::get('/getTipoServicio/{IdTipoServicio?}','TipoServicioController@getTipoServicio');

Route::get('/getTipoServicio','TipoServicioController@allTipoServicios');

Route::put('/updateTipoServicio/{IdTipoServicio?}','TipoServicioController@update');


