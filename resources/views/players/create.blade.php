<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Novo Jogador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Adicionar Novo Jogador</h1>
        <hr>

        <form action="{{ route('players.store') }}" method="POST">
            @csrf <div class="mb-3">
                <label for="name" class="form-label">Nome do Jogador</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar Jogador</button>
            <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>