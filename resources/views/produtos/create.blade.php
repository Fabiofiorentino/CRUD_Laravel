@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-4">Novo Produto</h1>

  <form method="POST" action="{{ route('produtos.store') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Nome:</label>
      <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Descrição:</label>
      <textarea name="descricao" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Preço:</label>
      <input type="number" name="preco" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Quantidade:</label>
      <input type="number" name="quantidade_estoque" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Fornecedores:</label>
      <select name="fornecedores[]" class="form-select" multiple>
        @foreach($fornecedores as $f)
          <option value="{{ $f->id }}">{{ $f->nome }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>
@endsection
