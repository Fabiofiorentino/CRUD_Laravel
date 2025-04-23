@extends('layouts.app')

@section('content')
<h1>Novo Fornecedor</h1>

<form method="POST" action="{{ route('fornecedores.store') }}">
  @csrf
  <label>Nome:</label>
  <input type="text" name="nome" required>
  <br>
  <label>CNPJ:</label>
  <input type="text" name="cnpj" required>
  <br>
  <button type="submit">Salvar</button>
</form>
@endsection