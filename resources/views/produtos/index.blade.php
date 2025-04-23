@extends('layouts.app')

@section('content')
<h1>Produtos</h1>

<form method="GET" action="{{ route('produtos.index') }}">
  <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Buscar por nome">
  <select name="fornecedor_id">
    <option value="">Todos os fornecedores</option>
    @foreach($fornecedores as $f)
      <option value="{{ $f->id }}" {{ request('fornecedor_id') == $f->id ? 'selected' : '' }}>{{ $f->nome }}</option>
    @endforeach
  </select>
  <button type="submit">Buscar</button>
</form>

<form method="POST" action="{{ route('produtos.destroy-multiple') }}">
  @csrf
  @method('DELETE')
  <button type="submit">Excluir Selecionados</button>
  <table border="1">
    <thead>
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
          {{ $fornecedores->firstWhere('id', $produto->fornecedor_id)->nome ?? 'Fornecedor não encontrado' }}
        </td>
        <td>
          <a href="{{ route('produtos.edit', $produto) }}">Editar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</form>
<a href="{{ route('produtos.create') }}">Novo Produto</a>

<script>
  document.getElementById('checkAllProdutos').addEventListener('change', function () {
    document.querySelectorAll('input[name="ids[]"]').forEach(cb => cb.checked = this.checked);
  });
</script>
@endsection