@extends('layouts.app')
@section('title','Tarefas')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold">Tarefas</h1>
  <a href="{{ route('tarefas.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Nova Tarefa</a>
</div>

<form method="GET" class="mb-4">
  <div class="bg-white p-3 rounded shadow flex gap-3 items-center">
    <label class="text-sm">Filtrar por categoria</label>
    <select name="categoria_id" class="border rounded px-3 py-2">
      <option value="">Todas</option>
      @foreach($categorias as $cat)
        <option value="{{ $cat->id }}" @selected(request('categoria_id')==$cat->id)>{{ $cat->nome }}</option>
      @endforeach
    </select>
    <button class="px-4 py-2 border rounded">Aplicar</button>
  </div>
</form>

<div class="bg-white rounded shadow">
  <table class="min-w-full divide-y divide-slate-200">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-2 text-left">Título</th>
        <th class="px-4 py-2 text-left">Categoria</th>
        <th class="px-4 py-2 text-left">Concluída</th>
        <th class="px-4 py-2"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-200">
      @forelse($tarefas as $t)
        <tr>
          <td class="px-4 py-2">{{ $t->titulo }}</td>
          <td class="px-4 py-2">{{ $t->categoria?->nome }}</td>
          <td class="px-4 py-2">
            @if($t->concluida)
              <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Sim</span>
            @else
              <span class="px-2 py-1 text-xs bg-slate-100 text-slate-700 rounded">Não</span>
            @endif
          </td>
          <td class="px-4 py-2 text-right space-x-2">
            @unless($t->concluida)
              <form action="{{ route('tarefas.concluir',$t) }}" method="POST" class="inline">
                @csrf @method('PATCH')
                <button class="px-3 py-1 border rounded">Concluir</button>
              </form>
            @endunless
            <a href="{{ route('tarefas.edit',$t) }}" class="px-3 py-1 border rounded">Editar</a>
            <form action="{{ route('tarefas.destroy',$t) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button class="px-3 py-1 border rounded text-red-700">Excluir</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td class="px-4 py-4" colspan="4">Sem registros.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-4">{{ $tarefas->withQueryString()->links() }}</div>
@endsection
