@extends('layouts.app')
@section('title','Categorias')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold">Categorias</h1>
  <a href="{{ route('categorias.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Nova Categoria</a>
</div>

<div class="bg-white rounded shadow">
  <table class="min-w-full divide-y divide-slate-200">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-2 text-left">Nome</th>
        <th class="px-4 py-2 text-left">Tarefas</th>
        <th class="px-4 py-2"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-200">
      @forelse($categorias as $c)
        <tr>
          <td class="px-4 py-2">{{ $c->nome }}</td>
          <td class="px-4 py-2">{{ $c->tarefas_count }}</td>
          <td class="px-4 py-2 text-right space-x-2">
            <a href="{{ route('categorias.edit',$c) }}" class="px-3 py-1 border rounded">Editar</a>
            <form action="{{ route('categorias.destroy',$c) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button class="px-3 py-1 border rounded text-red-700">Excluir</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td class="px-4 py-4" colspan="3">Sem registros.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-4">{{ $categorias->links() }}</div>
@endsection
