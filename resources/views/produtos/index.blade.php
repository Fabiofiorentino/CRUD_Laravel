@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h1 class="mb-4">Produtos</h1>

  <form method="GET" action="{{ route('produtos.index') }}" class="row g-3 mb-4">
    <div class="col-md-5">
      <input type="text" name="busca" class="form-control" value="{{ request('busca') }}" placeholder="Buscar por nome">
    </div>
    <div class="col-md-5">
      <select name="fornecedor_id" class="form-select">
        <option value="">Todos os fornecedores</option>
        @foreach($fornecedores as $f)
          <option value="{{ $f->id }}" {{ request('fornecedor_id') == $f->id ? 'selected' : '' }}>{{ $f->nome }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100">Buscar</button>
    </div>
  </form>

  <form method="POST" action="{{ route('produtos.destroy-multiple') }}">
    @csrf
    @method('DELETE')
    <div class="d-flex justify-content-between mb-2">
      <a href="{{ route('produtos.create') }}" class="btn btn-success">Novo Produto</a>
      <button type="submit" class="btn btn-danger">Excluir Selecionados</button>
    </div>

    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th><input type="checkbox" id="checkAllProdutos"></th>
          <th>Nome</th>
          <th>Fornecedores</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($produtos as $produto)
        <tr>
          <td><input type="checkbox" name="ids[]" value="{{ $produto->id }}"></td>
          <td>{{ $produto->nome }}</td>
          <td>
            @foreach($produto->fornecedores as $fornecedor)
              {{ $fornecedor->nome }}@if(!$loop->last), @endif
            @endforeach
          </td>
          <td>
            <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-primary">Editar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </form>
</div>

<script>
  document.getElementById('checkAllProdutos').addEventListener('change', function () {
    document.querySelectorAll('input[name="ids[]"]').forEach(cb => cb.checked = this.checked);
  });
</script>
@endsection
