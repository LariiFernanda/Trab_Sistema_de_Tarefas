<?php
namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        // Filtro opcional por categoria_id: /api/tarefas?categoria_id=1
        $query = Tarefa::with('categoria')->orderByDesc('id');

        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->integer('categoria_id'));
        }

        return $query->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'titulo'       => 'required|string|max:255',
            'descricao'    => 'nullable|string',
            'concluida'    => 'boolean',
        ]);

        return Tarefa::create($data);
    }

    public function show(Tarefa $tarefa)
    {
        return $tarefa->load('categoria');
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $data = $request->validate([
            'categoria_id' => 'sometimes|exists:categorias,id',
            'titulo'       => 'sometimes|required|string|max:255',
            'descricao'    => 'nullable|string',
            'concluida'    => 'boolean',
        ]);

        $tarefa->update($data);
        return $tarefa->load('categoria');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return response()->noContent();
    }

    public function concluir(Tarefa $tarefa)
    {
        $tarefa->update(['concluida' => true]);
        return $tarefa->refresh();
    }
}
