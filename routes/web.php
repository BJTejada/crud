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
/*
Route::get('/', function () {
    return view('empleado');
});
*/
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [EmpleadoController::class, 'index']);

Route::get('/empleados/listar', [EmpleadoController::class, 'listarEmp']);
Route::post('/empleados/agregarEmp', [EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/empleados/usuario/{idUsuario}', [UsuarioController::class, 'obtUsuario']);
Route::put('/empleados/editEmp', [EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/eliminar/{id}', [EmpleadoController::class, 'delete']);




