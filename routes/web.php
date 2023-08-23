<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminDashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EventController::class,'home']);

Route::get('/chiaperini', [EventController::class,'ramaisPage']);

Route::get('/dashboard', [EventController::class,'dashboard']);

Route::get('/login', [EventController::class,'login']);

Route::get('/techto', [EventController::class,'ramaisPage']);

Route::get('/techtopel', [EventController::class,'ramaisPage']);

Route::get('/portal-colaborador', [EventController::class,'portalColaborador']);

Route::get('/novo-post', [EventController::class,'novoPostPage']);

Route::get('/geral', [EventController::class, 'ramaisPage'])->name('ramaisPage'); 

Route::get('/chiaperini-pro', [EventController::class,'ramaisPage']);

Route::get('/mercadao-lojista', [EventController::class,'ramaisPage']);

Route::get('/fnc', [EventController::class,'ramaisPage']);

Route::get('/colaborador/{id}', [EventController::class,'colaboradorPage'])->middleware('auth');

Route::get('/editar-colaborador/{id}', [EventController::class,'editarColaboradorPage'])->middleware('auth');

Route::get('/registrar-colaborador', [EventController::class,'novoColaboradorPage'])->middleware('auth');

Route::get('/administrador', [AdminDashboardController::class,'adminPage'])->middleware('auth','admin');


/** Rotas de execução*/

Route::post('registrar-colaborador', [EventController::class,'novoColaborador']);

Route::post('novo-post', [EventController::class,'novoPost']);

Route::post('/chiaperini', [EventController::class,'ramaisPage']);

Route::put('/colaborador/{id}', [EventController::class,'editarColaborador']);

Route::delete('excluir-colaborador/{id}', [EventController::class,'excluirColaborador']);

