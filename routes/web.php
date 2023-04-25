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

Route::view('/inicio', 'inicio');

Route::get('/prueba', function(){
    return view('prueba');
});

Route::get('/formulario', function(){
    return view('formulario');
});

Route::post('/proceso', function() {

    // Se captura un dato desde el form
    $frase = $_POST['frase'];

    // Se pasa el dato a la vista como array asociativo (array con [clave,valor]
    return view('proceso',[ 'frase' => $frase ]);
});

// Trayendo datos desde base de datos
Route::get('/regiones', function() {
    // Se toman los datos desde la DB
    $regiones = \Illuminate\Support\Facades\DB::table('regiones') ->get();

    // Se pasan datos a la vista
    return view('regiones', ['regiones' => $regiones]);
});

