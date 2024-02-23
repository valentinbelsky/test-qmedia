<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use JetBrains\PhpStorm\ArrayShape;
use PokePHP\PokeApi;

class PokemonService
{
    private const POKEMON_CACHE_KEY = 'pokemons';
    private const DEFAULT_OFFSET = 0;
    private const DEFAULT_LIMIT = 1302;
    protected PokeApi $api;

    public function __construct(PokeApi $api)
    {
        $this->api = $api;
    }

    public function getPokemonFilteredCollection($request): array
    {
        // Получение и валидация входных данных
        $gender = $request->input('gender', null);
        $growthRate = $request->input('growth_rate', null);
        $nature = $request->input('nature', null);
        $color = $request->input('color', null);

        // Извлеките покемонов из кэша или загрузите их и кэшируйте
        $pokemons = Cache::rememberForever(self::POKEMON_CACHE_KEY, function () {
            return $this->getPokemonCollection(self::DEFAULT_OFFSET, self::DEFAULT_LIMIT);
        });

        // Фильтруем покемонов
        [$idealPokemons, $mediumPokemons] = $this->filterAndSortPokemons($pokemons, $gender, $growthRate, $nature, $color);

        // Сортируем покемонов
        usort($mediumPokemons, function ($a, $b) {
            return $b['base_experience'] <=> $a['base_experience'];
        });

        return [$idealPokemons, $mediumPokemons];
    }

    public function getPokemonCollection($offset, $limit): array
    {
        $pokemons = [];

        for ($i = $offset + 1; $i <= $offset + $limit; $i++) {
            $rawPokemonData = $this->api->pokemon($i);
            $rawSpeciesData = $this->api->pokemonSpecies($i);

            $pokemonData = json_decode($rawPokemonData, true);
            $speciesData = json_decode($rawSpeciesData, true);

            $pokemons[] = $this->transformPokemonData($pokemonData, $speciesData);
        }

        return $pokemons;
    }

    #[ArrayShape(['name' => "string", 'img' => "mixed", 'gender' => "string", 'growth_rate' => "mixed", 'color' => "mixed", 'nature' => "string", 'base_experience' => "mixed"])] protected function transformPokemonData($pokemonData, $speciesData)
    {
        $genderProbabilities = $this->calculateGenderProbability($speciesData['gender_rate']);

        return [
            'name' => ucfirst($pokemonData['name']),
            'img' => $pokemonData['sprites']['front_default'],
            'gender' => $genderProbabilities,
            'growth_rate' => $speciesData['growth_rate']['name'],
            'color' => $speciesData['color']['name'],
            'nature' => $this->getRandomNature(),
            'base_experience' => $pokemonData['base_experience'],
        ];
    }

    protected function calculateGenderProbability($genderRate): string
    {
        if ($genderRate == "-1") {
            return "genderless";
        } else {
            $probability = ($genderRate / 8) * 100;
            return $this->randomGender($probability);
        }
    }

    protected function randomGender($probability): string
    {
        $randomNumber = mt_rand(1, 100);
        return $randomNumber <= $probability ? 'female' : 'male';
    }

    protected function getRandomNature(): string
    {
        return $this->getNatureOptions()[array_rand($this->getNatureOptions())];
    }

    protected function getNatureOptions(): array
    {
        $client = new Client();

        $response = $client->request('GET', 'https://pokeapi.co/api/v2/nature/?limit=25&offset=0"');
        $data = json_decode($response->getBody(), true);


        $natureOptions = [];
        foreach ($data['results'] as $key => $item) {
            $natureOptions[$key] = $item['name'];
        }
        return $natureOptions;
    }

    public function filterAndSortPokemons($pokemons, $gender, $growthRate, $nature, $color): array
    {
        $idealPokemons = [];
        $mediumPokemons = [];

        foreach ($pokemons as $pokemon) {
            $matches = 0;

            if ($pokemon['gender'] === $gender) {
                $matches++;
            }

            if ($growthRate == "medium") {
                if (in_array($pokemon['growth_rate'], ['medium', 'medium-slow', 'slow-then-very-fast', 'fast-then-very-slow'])) {
                    $matches++;
                }
            } else {
                if ($pokemon['growth_rate'] === $growthRate) {
                    $matches++;
                }
            }

            if ($pokemon['nature'] === $nature && $color != null) {
                $matches++;
            }

            if ($pokemon['color'] === $color && $color != null) {
                $matches++;
            }


            if ($matches == 4) {
                $idealPokemons[] = $pokemon;
            } elseif ($matches == 3) {
                $mediumPokemons[] = $pokemon;
            }
        }
        return [$idealPokemons, $mediumPokemons];
    }
}
