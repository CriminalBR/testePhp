<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">Editar Tarefa: {{ $tarefa->titulo }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ops!</strong> Havia alguns problemas com seus dados:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
                @csrf @method('PUT') <div class="mb-3">
                    <label for="titulo" class="form-label">Título:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" 
                           value="{{ old('titulo', $tarefa->titulo) }}">
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="3">{{ old('descricao', $tarefa->descricao) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoria:</label>
                    <select name="categoria_id" id="categoria_id" class="form-select">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" 
                                    @if($categoria->id == old('categoria_id', $tarefa->categoria_id)) selected @endif>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="concluida" id="concluida" class="form-check-input" 
                           value="1" @if(old('concluida', $tarefa->concluida)) checked @endif>
                    <label for="concluida" class="form-check-label">Concluída</label>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
                <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>