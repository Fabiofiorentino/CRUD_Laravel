@extends('layouts.app')

@section('content')
  <h1>Fornecedores</h1>

  <form method="GET" action="{{ route('fornecedores.index') }}" class="row g-3 mb-3">
    <div class="col-auto">
      <input type="text" class="form-control" name="busca" value="{{ request('busca') }}" placeholder="Buscar por nome">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Buscar</button>
      <a href="{{ route('fornecedores.create') }}" class="btn btn-success">Novo Fornecedor</a>
    </div>
  </form>

  <form method="POST" action="{{ route('fornecedores.destroy-multiple') }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger mb-3">Excluir Selecionados</button>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th><input type="checkbox" id="checkAll"></th>
          <th>Nome</th>
          <th>CNPJ</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($fornecedores as $fornecedor)
          <tr>
            <td><input type="checkbox" name="ids[]" value="{{ $fornecedor->id }}"></td>
            <td>{{ $fornecedor->nome }}</td>
            <td>{{ $fornecedor->cnpj }}</td>
            <td><a href="{{ route('fornecedores.edit', $fornecedor) }}" class="btn btn-sm btn-warning">Editar</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </form>

  <script>
    document.getElementById('checkAll').addEventListener('change', function () {
      document.querySelectorAll('input[name="ids[]"]').forEach(cb => cb.checked = this.checked);
    });
  </script>
@endsection
