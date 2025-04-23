@extends('layouts.app')

@section('content')
<h1>Editar Fornecedor</h1>

<form method="POST" action="{{ route('fornecedores.update', $fornecedor) }}">
  @csrf
  @method('PUT')
  <label>Nome:</label>
  <input type="text" name="nome" value="{{ $fornecedor->nome }}" required>
  <br>
  <label>CNPJ:</label>
  <input type="text" name="cnpj" value="{{ $fornecedor->cnpj }}" required>
  <br>
  <button type="submit">Salvar</button>
</form>
@endsection