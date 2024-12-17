<form action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" method="POST">
    @csrf
    @if(isset($produto))
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $produto->nome ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" required>{{ old('descricao', $produto->descricao ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ old('preco', $produto->preco ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="estoque" class="form-label">Estoque</label>
        <input type="number" class="form-control" id="estoque" name="estoque" value="{{ old('estoque', $produto->estoque ?? '') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">
        {{ isset($produto) ? 'Atualizar Produto' : 'Adicionar Produto' }}
    </button>
</form>
