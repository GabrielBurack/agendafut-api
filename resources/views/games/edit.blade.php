<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Partida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Partida: {{ $game->nome }}</h1>
        <hr>

        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @csrf @method('PUT') <div class="mb-3">
                <label for="name" class="form-label">Nome da Partida</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $game->name }}" required>
            </div>

            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Data da Partida</label>
                <input type="date" class="form-control" id="scheduled_at" name="scheduled_at" value="{{ $game->scheduled_at }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('games.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>