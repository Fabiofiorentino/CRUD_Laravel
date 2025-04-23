@extends('layouts.app')

@section('content')
<h1>Novo Produto</h1>

<form method="POST" action="{{ route('produtos.store') }}">
  @csrf
  <label>Nome:</label>
  <input type="text" name="nome" required>

  <label>Descrição:</label>
  <textarea name="descricao" required></textarea>

  <label>Preço:</label>
  <input type="number" name="preco" step="0.01" required>

  <label>Quantidade:</label>
  <input type="number" name="quantidade_estoque" required>

  <label>Fornecedor:</label>
  <select name="fornecedor_id" required>
    <option value="">Selecione</option>
    @foreach($fornecedores as $fornecedor)
    <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
    @endforeach
  </select>

  <button type="submit">Salvar</button>
</form>
@endsection