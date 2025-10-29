<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaWebController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('tarefas')->orderBy('nome')->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.form', ['categoria' => new Categoria()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['nome' => 'required|string|max:255']);
        Categoria::create($data);
        return redirect()->route('categorias.index')->with('ok','Categoria criada.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.form', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate(['nome' => 'required|string|max:255']);
        $categoria->update($data);
        return redirect()->route('categorias.index')->with('ok','Categoria atualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('ok','Categoria removida.');
    }
}
