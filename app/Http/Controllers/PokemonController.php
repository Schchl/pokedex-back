<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        return Pokemon::with(['defaultVariety', 'defaultVariety.sprites'])
            ->paginate(20);
    }

    public function search(Request $request){
        return Pokemon::search($request->input('query'))
            ->get()
            ->load(['defaultVariety', 'defaultVariety.sprites', 'defaultVariety.types']);
    }

    public function show(Pokemon $pokemon)
    {
        return $pokemon->load(['defaultVariety', 'defaultVariety.sprites', 'defaultVariety.types']);
    }

    public function showVarieties(Pokemon $pokemon)
    {
        return $pokemon->varieties()->with(['sprites', 'types'])->get();
    }

    public function showEvolutions(Pokemon $pokemon)
    {
        return $pokemon->evolutions()->with('evolvesTo.sprites')->get();
    }

    public function showMoves(Pokemon $pokemon)
    {
        return $pokemon->varieties()
            ->with(['learnMoves.move', 'learnMoves.moveLearnMethod', 'learnMoves.gameVersion'])
            ->get()
            ->map(function ($variety) {
                return [
                    'variety_id' => $variety->id,
                    'moves' => $variety->learnMoves->map(function ($learnMove) {
                        return [
                            'move' => $learnMove->move,
                            'move_learn_method' => $learnMove->moveLearnMethod,
                            'game_version' => $learnMove->gameVersion,
                            'level' => $learnMove->level,
                        ];
                    }),
                ];
            });
    }
}
