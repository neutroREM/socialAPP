<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function (){
    return redirect()->route('inicio');
});

Route::get('/inicio', [UsuarioController::class, 'inicio'])->name('inicio');
Route::post('/registro', [UsuarioController::class, 'registro'])->name('registro.form');
Route::post('/logiin', [UsuarioController::class, 'ingreso'])->name('ingreso.form');


Route::prefix('/usuario')->middleware('VerificarUsuario')->group(function (){
    Route::get('/menu', [UsuarioController::class, 'menu'])->name('usuario.menu');
});


/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
