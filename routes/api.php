<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'pokemon'], function (){
    Route::get('/', [PokemonController::class, 'index']);
    Route::get('/search', [PokemonController::class, 'search']);
    Route::get('/{pokemon}', [PokemonController::class, 'show']);
    Route::get('/{pokemon}/varieties', [PokemonController::class, 'showVarieties']);
    Route::get('/{pokemon}/evolutions', [PokemonController::class, 'showEvolutions']);
    Route::get('/{pokemon}/moves', [PokemonController::class, 'showMoves']);
});
