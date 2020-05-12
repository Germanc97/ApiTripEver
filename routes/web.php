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

Route::resource('prueba','PruebaController 1 2 3');