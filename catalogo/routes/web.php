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

Route::redirect('/', '/inicio');

Route::get('/inicio', function () {
    return view('inicio');
});


###############################################
#### CRUD de marcas
use App\Http\Controllers\MarcaController;

Route::get('/adminMarcas', [MarcaController::class, 'index'] );

Route::get('/agregarMarca', [MarcaController::class, 'create'] );
Route::post('/agregarMarca', [MarcaController::class, 'store'] );

Route::get('/modificarMarca/{idMarca}', [MarcaController::class, 'edit']);
Route::put('/modificarMarca', [MarcaController::class, 'update']);

Route::get('/eliminarMarca/{idMarca}', [MarcaController::class, 'confirm']);
Route::delete('/eliminarMarca', [MarcaController::class, 'destroy']);

###############################################
#### CRUD de categorias
use App\Http\Controllers\CategoriaController;

Route::get('/adminCategorias', [CategoriaController::class, 'index']);

Route::get('/agregarCategoria', [CategoriaController::class,'create']);
Route::post('/agregarCategoria', [CategoriaController::class,'store']);

Route::get('/modificarCategoria/{idCategoria}', [CategoriaController::class, 'edit']);
Route::put('/modificarCategoria', [CategoriaController::class, 'update']);

route::get('/eliminarCategoria/{idCategoria}', [CategoriaController::class,'confirm']);
route::delete('/eliminarCategoria', [CategoriaController::class,'destroy']);

###############################################
#### CRUD de productos
use App\Http\Controllers\ProductoController;

Route::get('/adminProductos',[ProductoController::class, 'index']);

Route::get('/agregarProducto',[ProductoController::class, 'create']);
Route::put('/agregarProducto',[ProductoController::class, 'store']);

route::get('/modificarProducto/{idProducto}', [ProductoController::class,'edit']);
route::put('/modificarProducto', [ProductoController::class,'update']);

route::get('/eliminarProducto/{idProducto}', [ProductoController::class,'confirm']);
route::delete('/eliminarProducto', [ProductoController::class,'destroy']);
