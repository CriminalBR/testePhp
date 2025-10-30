<h1>Criar Nova Tarefa</h1>

@if ($errors->any()) <!-- Verifica se tem algum erro de validação -->

    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error) <!-- retorna todos os erros em um array -->

                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tarefas.store') }}" method="POST">
    @csrf <div><!-- Necessario para evitar Ataques CSRF, ele gera um token de segurança unico e é incluido no envio do formulario -->

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
    </div>

    <div>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao">{{ old('descricao') }}</textarea>
    </div>

    <div>
        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id" id="categoria_id">
            <option value="">Selecione uma categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Salvar Tarefa</button>
</form>