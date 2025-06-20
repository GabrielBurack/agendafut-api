<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Jogadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Jogadores</h1>
            <a href="{{ route('players.create') }}" class="btn btn-success">Criar Novo Jogador</a>
            <a href="{{ route('games.index') }}" class="btn btn-primary"> Voltar para a Tela Principal</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Posição</th>
                    <th scope="col" width="250px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($players as $jogador)
                    <tr>
                        <th scope="row">{{ $jogador->id }}</th>
                        <td>{{ $jogador->name }}</td>
                        <td>{{ $jogador->posicao }}</td>
                        <td>
                            <form action="{{ route('players.destroy', $jogador->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este jogador?');">
                                <a href="{{ route('players.show', $jogador->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('players.edit', $jogador->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum jogador cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>