<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonEvolution extends Model
{
    use HasFactory;

    protected $fillable = ['pokemon_variety_id', 'evolves_to_id', 'gender', 'held_item_id', 'item_id', 'know_move_id', 'know_move_type_id', 'location', 'min_affection', 'min_happiness', 'min_level', 'need_overworld_rain', 'party_species_id', 'party_type_id', 'relative_phisical_stats', 'time_of_day', 'trade_species_id', 'turn_upside_down', 'evolution_trigger_id'];

    public function pokemonVariety(){
        return $this->belongsTo(PokemonVariety::class);
    }

    public function pokemon(){
        return $this->belongsTo(Pokemon::class);
    }

    public function evolvesTo(){
        return $this->belongsTo(EvolutionTrigger::class);
    }

    public function items(){
        return $this->belongsTo(Item::class);
    }

    public function knowMove(){
        return $this->belongsTo(Move::class);
    }

    public function Type(){
        return $this->belongsTo(Type::class);
    }
}
