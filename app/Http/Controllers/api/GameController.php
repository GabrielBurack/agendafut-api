<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $games = Game::with('players')->latest()->get();

        return response()->json($games);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'scheduled_at' => 'required|date',
        ]);

        $game = Game::create($validatedData);

        return response()->json($game, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): JsonResponse
    {
        $game->load('players');

        $playersNoJogoIds = $game->players->pluck('id');
        $playersDisponiveis = Player::whereNotIn('id', $playersNoJogoIds)->get();

        $data = [
            'game' => $game,
            'available_players' => $playersDisponiveis,
        ];

        return response()->json($data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'scheduled_at' => 'required|date',
        ]);

        $game->update($validatedData);

        return response()->json($game);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): JsonResponse
    {
        $game->delete();

        return response()->json(null, 204);
    }

    /**
     * Adiciona (anexa) um player a uma partida específica.
     */
    public function addPlayer(Request $request, Game $game): JsonResponse
    {
        $request->validate([
            'player_id' => 'required|exists:players,id'
        ]);

        $game->players()->syncWithoutDetaching($request->player_id);

        return response()->json([
            'message' => 'Jogador adicionado com sucesso!',
            'game' => $game->load('players') 
        ]);
    }

    /**
     * Remove (desanexa) um player de uma partida específica.
     */
    public function removePlayer(Game $game, Player $player)
    {
        $game->players()->detach($player->id);

         return response()->json(['message' => 'Jogador removido com sucesso!']);
    }
}
