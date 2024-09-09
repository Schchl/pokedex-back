<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Type extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name'];

    protected $fillable = ['sprite_url'];

    public function typeInteractions()
    {
        return $this->belongsToMany(Type::class, 'type_interactions', 'from_type_id', 'to_type_id')
                    ->withPivot('type_interaction_state_id');
    }

    public function PokemonVarieties(){
        return $this->belongsToMany(PokemonVariety::class)
                    ->withPivot('slot');
    }

    public function moves(){
        return $this->hasMany(Move::class);
    }
}
