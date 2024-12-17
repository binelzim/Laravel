@extends('layouts.app')

@section('title', 'Adicionar Produto')

@section('content')
<h1>Adicionar Produto</h1>
<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ old('descricao') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="{{ old('preco') }}" required>
    </div>
    <div class="mb-3">
        <label for="estoque" class="form-label">Estoque</label>
        <input type="number" class="form-control" id="estoque" name="estoque" value="{{ old('estoque') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
