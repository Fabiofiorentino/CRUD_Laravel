@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-4">Editar Produto</h1>

  <form method="POST" action="{{ route('produtos.update', $produto) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nome:</label>
      <input type="text" name="nome" value="{{ $produto->nome }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Descrição:</label>
      <textarea name="descricao" class="form-control" required>{{ $produto->descricao }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Preço:</label>
      <input type="number" name="preco" value="{{ $produto->preco }}" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Quantidade:</label>
      <input type="number" name="quantidade_estoque" value="{{ $produto->quantidade_estoque }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Fornecedores:</label>
      <select name="fornecedores[]" class="form-select" multiple>
        @foreach($fornecedores as $f)
          <option value="{{ $f->id }}" {{ in_array($f->id, $produto->fornecedores->pluck('id')->toArray()) ? 'selected' : '' }}>
            {{ $f->nome }}
          </option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>
@endsection
