@extends('layouts.app')

@section('content')
  <h1>Novo Fornecedor</h1>

  <form method="POST" action="{{ route('fornecedores.store') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nome:</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">CNPJ:</label>
      <input type="text" name="cnpj" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
  </form>
@endsection
