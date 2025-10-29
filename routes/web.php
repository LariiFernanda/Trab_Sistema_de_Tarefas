<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CategoriaWebController;
use App\Http\Controllers\Web\TarefaWebController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui você registra as rotas web da aplicação.
|
*/

Route::get('/', fn () => redirect()->route('categorias.index'));

Route::resource('categorias', CategoriaWebController::class);
Route::resource('tarefas', TarefaWebController::class);

Route::patch('tarefas/{tarefa}/concluir', [TarefaWebController::class, 'concluir'])
    ->name('tarefas.concluir');
