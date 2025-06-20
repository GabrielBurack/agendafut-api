<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Jogador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Detalhes do Jogador</h1>
            <a href="{{ route('players.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>{{ $player->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $player->id }}</p>
                <p><strong>Nome:</strong> {{ $player->name }}</p>
                <p><strong>Cadastrado em:</strong> {{ $player->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>