<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('tarefas', TarefaController::class);

// Extra: endpoint para marcar tarefa como concluída
Route::patch('tarefas/{tarefa}/concluir', [TarefaController::class, 'concluir']);
