<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Lista todos os jogadores.
     */
    public function index()
    {
        $players = Player::latest()->get();
        return view('players.index', compact('players'));
    }

    /**
     * Exibe o formulário de criação de jogador.
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Armazena um novo jogador.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Player::create($validatedData);

        return redirect()->route('players.index')->with('success', 'Jogador criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um jogador.
     */
    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    /**
     * Exibe o formulário para editar um jogador.
     */
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    /**
     * Atualiza os dados de um jogador.
     */
    public function update(Request $request, Player $player)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $player->update($validatedData);

        return redirect()->route('players.index')->with('success', 'Jogador atualizado com sucesso!');
    }

    /**
     * Exclui um jogador.
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Jogador excluído com sucesso!');
    }
}
