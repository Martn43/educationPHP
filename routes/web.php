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

Route::view('/inicioTemplate', 'inicioTemplate');

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

    // Se pasa el dato a la vista como array asociativo (array con [clave,valor])
    return view('proceso',[ 'frase' => $frase ]);
});

// Trayendo datos desde base de datos
Route::get('/regiones', function() {
    // Se toman los datos desde la DB
    $regiones_array = \Illuminate\Support\Facades\DB::table('regiones') -> get();

    // Se pasan datos a la vista (la clave se pasa como variable en la view)
    return view('regiones', ['regiones' => $regiones_array]);
});


### ABM regiones (DB agencia)
Route::get('/adminRegiones', function () {

    $regiones = DB::select('SELECT regID, regNombre FROM regiones'); //Raw SQL
    //$regiones = DB::table('regiones') -> select('regID','regNombre') -> get(); //Fluent Query Builder

    //dd($regiones); // Para ver variables

    return view('adminRegiones', ['regiones' => $regiones]);
});

Route::get('/agregarRegion', function() {
    return view('agregarRegion');
});

Route::post('/agregarRegion', function() {

    $regNombre = $_POST['regNombre'];

    DB::insert('INSERT INTO regiones (regNombre)
                    VALUES ( :regNombre )', [$regNombre]);

    return redirect('/adminRegiones')
        ->with('status', 'Región '.$regNombre.' agregada correctamente');
});


Route::get('/modificarRegion/{regID}', function($regID) {
    $region = DB::select(
    'SELECT regID, regNombre
        FROM regiones
        WHERE regID = ?', [$regID]
    );

    return view('modificarRegion', ['region'=>$region[0]]);

});

Route::post('/modificarRegion', function() {

    $regNombre = $_POST['regNombre'];
    $regID = $_POST['regID'];

    DB::update(
      'UPDATE regiones
        SET regNombre = ?
        WHERE regID = ?', [$regNombre, $regID]
    );

    return redirect('/adminRegiones')
        ->with('status', 'Región '.$regNombre.' modificada correctamente');
});

Route::get('/eliminarRegion/{regID}', function($regID) {
    // Tomar los datos de la región para mostrarla
    $region = DB::select(
        'SELECT regID, regNombre
        FROM regiones
        WHERE regID = ?', [$regID]
    );




    return view('eliminarRegion', ['region'=>$region[0]]);

});

Route::post('/eliminarRegion', function() {

    $regID = $_POST['regID'];
    $regNombre = $_POST['regNombre'];

    DB::delete(
        'DELETE FROM regiones
            WHERE regID = ?', [$regID]

);


    return redirect('/adminRegiones')
        ->with('status', 'Región '.$regNombre.' eliminada correctamente');
});



### ABM destinos (DB agencia)

Route::get('/adminDestinos', function () {

    $destinos = DB::select('SELECT destID, destNombre, regNombre, destPrecio
	                            FROM destinos
	                            INNER JOIN regiones ON destinos.regID=regiones.regID;
    '); //Raw SQL
    //$regiones = DB::table('regiones') -> select('regID','regNombre') -> get(); //Fluent Query Builder

    //dd($destinos); // Para ver variables

    return view('adminDestinos', ['destinos' => $destinos]);
});

Route::get('/agregarDestino', function() {

    $regiones = DB::select(
        'SELECT * FROM regiones;'
    );

    return view('agregarDestino', ['regiones'=>$regiones]);
});

Route::post('/agregarDestino', function () {

    $destNombre = $_POST['destNombre'];
    $regID = $_POST['regID'];
    $destPrecio = $_POST['destPrecio'];
    $destAsientos = $_POST['destAsientos'];
    $destDisponibles = $_POST['destDisponibles'];
    $destActivo = 1;

    DB::insert(
        'INSERT INTO destinos (destNombre, regID, destPrecio, destAsientos, destDisponibles, destActivo)
            VALUES ( :destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles, :destActivo )', [
                'destNombre'=>$destNombre,
                'regID'=>$regID,
                'destPrecio'=>$destPrecio,
                'destAsientos'=>$destAsientos,
                'destDisponibles'=>$destDisponibles,
                'destActivo'=>$destActivo
            ]
    );

    return redirect('/adminDestinos')
        ->with('status', 'Destino '.$destNombre.' agregado correctamente');
});




















