<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Partida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>{{ $game->name }}</h2>
                <a href="{{ route('games.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
            </div>
            <div class="card-body">
                <p><strong>Data e Hora:</strong> {{ $game->scheduled_at->format('d/m/Y H:i') }}h</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Jogadores Escalados ({{ $game->players->count() }})</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse ($game->players as $player)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $player->name }}
                                <form action="{{ route('games.players.destroy', ['game' => $game->id, 'player' => $player->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desconvocar</button>
                                </form>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">Nenhum player escalado.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Adicionar player à Partida</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('games.players.store', $game->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="player_id" class="form-label">Selecione um player</label>
                                <select name="player_id" id="player_id" class="form-select" required>
                                    <option value="">-- players Disponíveis --</option>
                                    @foreach ($available_players as $player)
                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" {{ $available_players->isEmpty() ? 'disabled' : '' }}>
                                Adicionar player
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>