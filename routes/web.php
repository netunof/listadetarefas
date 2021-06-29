<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboardf', [DashboardController::class, 'filtros'])->middleware(['auth'])->name('filtros');

//Rotas dos usuários
Route::get('/user', [UserController::class, 'painel'])->middleware(['auth'])->name('painelUser');
Route::delete('user', [UserController::class, 'apagar'])->middleware(['auth']);

//Rotas dos tarefas
Route::resource('tarefas', TarefaController::class)->middleware(['auth']);

//Rotas da lixeira
Route::delete('apagados/{id}', [LixeiraController::class, 'eliminar'])->name('tarefas.eliminar');
Route::post('apagados/{id}', [LixeiraController::class, 'restaurar'])->name('tarefas.restaurar');

//Rotas das tags
Route::resource('tags', TagController::class)->except(['index', 'show', 'create', 'edit']);

require __DIR__.'/auth.php';
