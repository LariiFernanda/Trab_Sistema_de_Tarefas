@extends('layouts.app')
@section('title', $categoria->exists ? 'Editar Categoria' : 'Nova Categoria')
@section('content')
<h1 class="text-2xl font-semibold mb-4">
  {{ $categoria->exists ? 'Editar' : 'Nova' }} Categoria
</h1>

<form method="POST" action="{{ $categoria->exists ? route('categorias.update',$categoria) : route('categorias.store') }}" class="bg-white p-4 rounded shadow max-w-lg">
  @csrf
  @if($categoria->exists) @method('PUT') @endif

  <label class="block mb-2 text-sm font-medium">Nome</label>
  <input type="text" name="nome" value="{{ old('nome',$categoria->nome) }}" class="w-full border rounded px-3 py-2 mb-3">
  @error('nome') <div class="text-red-600 text-sm mb-2">{{ $message }}</div> @enderror

  <div class="flex gap-2">
    <a href="{{ route('categorias.index') }}" class="px-4 py-2 border rounded">Cancelar</a>
    <button class="px-4 py-2 bg-blue-600 text-white rounded">
      {{ $categoria->exists ? 'Salvar' : 'Criar' }}
    </button>
  </div>
</form>
@endsection
