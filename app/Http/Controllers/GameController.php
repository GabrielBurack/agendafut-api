<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Exibe a lista de partidas.
     */
    public function index()
    {
        $games = Game::with('players')->latest()->get();
        return view('games.index', compact('games'));
    }

    /**
     * Exibe o formulário de criação de nova partida.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Armazena uma nova partida.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'scheduled_at' => 'required|date',
        ]);

        Game::create($validatedData);

        return redirect()->route('games.index')->with('success', 'Partida criada com sucesso!');
    }

    /**
     * Exibe detalhes de uma partida específica.
     */
    public function show(Game $game)
    {
        $game->load('players');
        $playersNoJogoIds = $game->players->pluck('id');
        $available_players = Player::whereNotIn('id', $playersNoJogoIds)->get();

        return view('games.show', compact('game', 'available_players'));
    }

    /**
     * Exibe o formulário de edição de uma partida.
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Atualiza uma partida existente.
     */
    public function update(Request $request, Game $game)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'scheduled_at' => 'required|date',
        ]);

        $game->update($validatedData);

        return redirect()->route('games.index')->with('success', 'Partida atualizada com sucesso!');
    }

    /**
     * Remove uma partida.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Partida removida com sucesso!');
    }

    /**
     * Adiciona um player à partida.
     */
    public function addPlayer(Request $request, Game $game)
    {
        $request->validate([
            'player_id' => 'required|exists:players,id'
        ]);

        $game->players()->syncWithoutDetaching($request->player_id);

        return redirect()->route('games.show', $game)->with('success', 'Jogador adicionado com sucesso!');
    }

    /**
     * Remove um player da partida.
     */
    public function removePlayer(Game $game, Player $player)
    {
        $game->players()->detach($player->id);

        return redirect()->route('games.show', $game)->with('success', 'Jogador removido com sucesso!');
    }
}
