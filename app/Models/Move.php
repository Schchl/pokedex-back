<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Move extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = ['accuracy', 'move_damage_class_id', 'power', 'pp', 'priority', 'type_id'];

    public function damageClass(){
        return $this->belongsTo(Movedamageclass::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function pokemonLearnMoves(){
        return $this->hasMany(Pokemonlearnmove::class);
    }

    public function pokemonevolutions(){
        return $this->hasMany(Pokemonevolution::class);
    }
}
