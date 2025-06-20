<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Partidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Partidas Agendadas</h1>
            <a href="{{ route('games.create') }}" class="btn btn-success">Criar Nova Partida</a>
            <a href="{{ route('players.index') }}" class="btn btn-primary">Ver Jogadores</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="list-group">
            @forelse ($games as $game)
                <div class="list-group-item list-group-item-action flex-column align-items-start mb-3 shadow-sm">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $game->name }}</h5>
                        <small>{{ $game->scheduled_at->format('d/m/Y \à\s H:i') }}h</small>
                    </div>
                    <p class="mb-1">
                        <strong>Jogadores Envolvidos:</strong>
                    </p>
                    
                    <div>
                        @forelse ($game->players as $player)
                            <span class="badge bg-primary rounded-pill me-1">{{ $player->name }}</span>
                        @empty
                            <span class="badge bg-secondary rounded-pill">Nenhum jogador escalado</span>
                        @endforelse
                    </div>
                    <div class="mt-3">
                         <a href="{{ route('games.show', $game->id) }}" class="btn btn-info btn-sm">Gerenciar Jogadores</a>
                         <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Editar Partida</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Nenhuma partida agendada no momento.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>