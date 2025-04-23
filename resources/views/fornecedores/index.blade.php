@extends('layouts.app')

@section('content')
<h1>Fornecedores</h1>

<form method="GET" action="{{ route('fornecedores.index') }}">
  <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Buscar por nome">
  <button type="submit">Buscar</button>
</form>
<a href="{{ route('fornecedores.create') }}">Novo Fornecedor</a>

<form method="POST" >
  @csrf
  <table border="1">
    <thead>
      <tr>
        <th><input type="checkbox" id="checkAll"></th>
        <th>Nome</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fornecedores as $fornecedor)
      <tr>
        <td><input type="checkbox" name="ids[]" value="{{ $fornecedor->id }}"></td>
        <td>{{ $fornecedor->nome }}</td>
        <td>{{ $fornecedor->cnpj }}</td>

        <td><a href="{{ route('fornecedores.edit', $fornecedor) }}">Editar</a></td>
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