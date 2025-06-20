<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Jogador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Jogador: {{ $player->name }}</h1>
        <hr>

        <form action="{{ route('players.update', $player->id) }}" method="POST">
            @csrf @method('PUT') <div class="mb-3">
                <label for="name" class="form-label">Nome do Jogador</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $player->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>