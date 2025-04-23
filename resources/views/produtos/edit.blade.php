@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>

<form method="POST" action="{{ route('produtos.update', $produto) }}">
  @csrf
  @method('PUT')
  <label>Nome:</label>
  <input type="text" name="nome" value="{{ $produto->nome }}" required>

  <label>Descrição:</label>
  <textarea name="descricao" required>{{ $produto->descricao }}</textarea>

  <label>Preço:</label>
  <input type="number" name="preco" value="{{ $produto->preco }}" step="0.01" required>

  <label>Quantidade:</label>
  <input type="number" name="quantidade_estoque" value="{{ $produto->quantidade_estoque }}" required>

  <label>Fornecedor:</label>
  <select name="fornecedor_id" required>
    <option value="">Selecione</option>
    @foreach($fornecedores as $fornecedor)
      <option value="{{ $fornecedor->id }}" {{ $produto->fornecedor_id == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
    @endforeach
  </select>

  <button type="submit">Salvar</button>
</form>
@endsection