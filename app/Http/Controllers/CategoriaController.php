<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // Lista categorias com contagem de tarefas
        return Categoria::withCount('tarefas')->orderBy('nome')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        return Categoria::create($data);
    }

    public function show(Categoria $categoria)
    {
        // Mostra categoria e suas tarefas
        return $categoria->load('tarefas');
    }

    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria->update($data);
        return $categoria;
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->noContent();
    }
}
