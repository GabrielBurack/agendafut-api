<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Partida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Criar Nova Partida</h1>
            <a href="{{ route('games.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
        </div>
        <hr>

        <form action="{{ route('games.store') }}" method="POST">
            
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome da Partida</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="scheduled_at" class="form-label">Data da Partida</label>
                <input type="datetime-local" class="form-control @error('scheduled_at') is-invalid @enderror" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}" required>

                @error('scheduled_at')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar Partida</button>
        </form>
    </div>
</body>
</html>