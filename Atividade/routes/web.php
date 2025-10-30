<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;

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

// Essa é a rota Principal
Route::get('/', [TarefaController::class, 'index'])->name('Home');
//Crud de categorias
Route::resource('categorias', CategoriaController::class);
// Crud de Tarefas
Route::resource('Tarefas', TarefaController::class);

Route::get('/', function () {
    return view('welcome');
});

