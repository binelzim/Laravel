@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
<h1 class="mb-4">Produtos</h1>
<a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>{{ $produto->estoque }}</td>
            <td>
                <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Nenhum produto cadastrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
