<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TarefaWebController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::orderBy('nome')->get();
        $tarefas = Tarefa::with('categoria')
            ->when($request->filled('categoria_id'), fn($q) => $q->where('categoria_id', $request->integer('categoria_id')))
            ->orderByDesc('id')->paginate(10);

        return view('tarefas.index', compact('tarefas','categorias'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('tarefas.form', ['tarefa' => new Tarefa(), 'categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'titulo'       => 'required|string|max:255',
            'descricao'    => 'nullable|string',
            'concluida'    => 'boolean',
        ]);
        Tarefa::create($data);
        return redirect()->route('tarefas.index')->with('ok','Tarefa criada.');
    }

    public function edit(Tarefa $tarefa)
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('tarefas.form', compact('tarefa','categorias'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $data = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'titulo'       => 'required|string|max:255',
            'descricao'    => 'nullable|string',
            'concluida'    => 'boolean',
        ]);
        $tarefa->update($data);
        return redirect()->route('tarefas.index')->with('ok','Tarefa atualizada.');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('ok','Tarefa removida.');
    }

    public function concluir(Tarefa $tarefa)
    {
        $tarefa->update(['concluida' => true]);
        return redirect()->route('tarefas.index')->with('ok','Tarefa concluída.');
    }
}
