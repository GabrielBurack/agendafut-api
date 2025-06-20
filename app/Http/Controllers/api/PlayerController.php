<?php

namespace App\Http\Controllers\api;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     * Retorna uma lista de todos os jogadores.
     */
    public function index(): JsonResponse
    {
        $players = Player::latest()->get();

        return response()->json($players);
    }

    /**
     * Store a newly created resource in storage.
     * Cria um novo jogador.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $player = Player::create($validatedData);

        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     * Mostra os detalhes de um jogador específico.
     */
    public function show(Player $player): JsonResponse
    {
        return response()->json($player);
    }

    /**
     * Update the specified resource in storage.
     * Atualiza um jogador existente.
     */
    public function update(Request $request, Player $player): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $player->update($validatedData);

        return response()->json($player);
    }

    /**
     * Remove the specified resource from storage.
     * Exclui um jogador.
     */
    public function destroy(Player $player): JsonResponse
    {
        $player->delete();

        return response()->json(null, 204);
    }
}