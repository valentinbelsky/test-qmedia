<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonStoreRequest;
use App\Services\PokemonService;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    protected PokemonService $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('pokemons.index');
    }

    public function store(PokemonStoreRequest $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        [$idealPokemons, $mediumPokemons] = $this->pokemonService->getPokemonFilteredCollection($request);

        return view('pokemons.index', compact('idealPokemons', 'mediumPokemons'));
    }
}


