<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>

    <!-- Importa o Bootstrap 5 via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary"> Minha Lista de Tarefas</h1>
        <a href="{{ route('tarefas.create') }}" class="btn btn-success">
             Criar Nova Tarefa
        </a>
    </div>

    <!-- Mensagem de sucesso -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabela de tarefas -->
    <div class="card shadow-sm">
        <div class="card-body">
            @if ($tarefas->isEmpty())
                <p class="text-muted">Nenhuma tarefa encontrada.</p>
            @else
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarefas as $tarefa)
                            <tr>
                                <td>{{ $tarefa->id }}</td>
                                <td><strong>{{ $tarefa->titulo }}</strong></td>
                                <td>{{ $tarefa->categoria->nome }}</td>
                                <td>{{ $tarefa->descricao ?? 'Sem descrição' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning btn-sm">
                                         Editar
                                    </a>

                                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<!-- JS do Bootstrap (opcional, apenas para componentes dinâmicos) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
