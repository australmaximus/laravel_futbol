<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\EstadiosController;
use App\Http\Controllers\FechasController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EstadisticasController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/login', [HomeController::class, 'login'])->name('home.login');

Route::get('/equipos', [EquiposController::class, 'index'])->name('equipos.index');
Route::post('/equipos', [EquiposController::class, 'store'])->name('equipos.store');
Route::delete('/equipos/{equipo}', [EquiposController::class, 'destroy'])->name('equipos.destroy');
Route::put('/equipos/{equipo}',[EquiposController::class, 'update'])->name('equipos.update');
Route::get('/equipos/{equipo}', [EquiposController::class, 'show'])->name('equipos.show');

Route::get('/jugadores', [JugadoresController::class, 'index'])->name('jugadores.index');
Route::post('/jugadores', [JugadoresController::class, 'store'])->name('jugadores.store');
Route::delete('/jugadores/{jugador}', [JugadoresController::class, 'destroy'])->name('jugadores.destroy');
Route::get('/jugadores/{jugador}/edit', [JugadoresController::class, 'edit'])->name('jugadores.edit');
Route::put('/jugadores/{jugador}', [JugadoresController::class, 'update'])->name('jugadores.update');

Route::resource('/estadios', EstadiosController::class);

Route::resource('/fechas', FechasController::class);

Route::resource('/partidos', PartidosController::class);

Route::post('/partidos/{partido}/goles', [PartidosController::class, 'goles'])->name('partidos.goles');

Route::post('/usuarios/login', [UsuariosController::class, 'login'])->name('usuarios.login');
Route::get('/usuarios/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::post('usuarios/{usuario}/activar', [UsuariosController::class, 'activar'])->name('usuarios.activar');

Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
Route::delete('/roles/{rol}', [RolesController::class, 'destroy'])->name('roles.destroy');

Route::resource('/usuarios', UsuariosController::class);

Route::get('/estadisticas/tabla-posiciones', [EstadisticasController::class, 'tablaPosiciones'])->name('estadisticas.tabla-posiciones');
Route::get('/estadisticas/descargar-tabla-posiciones', [EstadisticasController::class, 'descargarTablaPosiciones'])->name('estadisticas.descargar-tabla-posiciones');