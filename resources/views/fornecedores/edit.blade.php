@extends('layouts.app')

@section('content')
  <h1>Editar Fornecedor</h1>

  <form method="POST" action="{{ route('fornecedores.update', $fornecedor) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nome:</label>
      <input type="text" name="nome" value="{{ $fornecedor->nome }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">CNPJ:</label>
      <input type="text" name="cnpj" value="{{ $fornecedor->cnpj }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
