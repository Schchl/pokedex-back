<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pokemon', [PokemonController::class, 'index']);

Route::get('/pokemon/{pokemon}', [PokemonController::class, 'show']);
