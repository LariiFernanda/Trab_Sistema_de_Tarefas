@extends('layouts.app')
@section('title', $tarefa->exists ? 'Editar Tarefa' : 'Nova Tarefa')
@section('content')
<h1 class="text-2xl font-semibold mb-4">
  {{ $tarefa->exists ? 'Editar' : 'Nova' }} Tarefa
</h1>

<form method="POST" action="{{ $tarefa->exists ? route('tarefas.update',$tarefa) : route('tarefas.store') }}" class="bg-white p-4 rounded shadow max-w-2xl">
  @csrf
  @if($tarefa->exists) @method('PUT') @endif

  <div class="mb-3">
    <label class="block mb-1 text-sm font-medium">Categoria</label>
    <select name="categoria_id" class="w-full border rounded px-3 py-2">
      <option value="" disabled {{ old('categoria_id',$tarefa->categoria_id) ? '' : 'selected' }}>Selecione...</option>
      @foreach($categorias as $cat)
        <option value="{{ $cat->id }}" @selected(old('categoria_id',$tarefa->categoria_id)==$cat->id)>{{ $cat->nome }}</option>
      @endforeach
    </select>
    @error('categoria_id') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 text-sm font-medium">Título</label>
    <input type="text" name="titulo" value="{{ old('titulo',$tarefa->titulo) }}" class="w-full border rounded px-3 py-2">
    @error('titulo') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 text-sm font-medium">Descrição</label>
    <textarea name="descricao" rows="4" class="w-full border rounded px-3 py-2">{{ old('descricao',$tarefa->descricao) }}</textarea>
    @error('descricao') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
  </div>

  <div class="mb-4">
    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="concluida" value="1" {{ old('concluida',$tarefa->concluida) ? 'checked' : '' }}>
      <span>Concluída</span>
    </label>
  </div>

  <div class="flex gap-2">
    <a href="{{ route('tarefas.index') }}" class="px-4 py-2 border rounded">Cancelar</a>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">
      {{ $tarefa->exists ? 'Salvar' : 'Criar' }}
    </button>
  </div>
</form>
@endsection
