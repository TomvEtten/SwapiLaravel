<?php

namespace App\Console\Commands;

use App\Models\People;
use App\Models\Planet;
use App\Models\Species;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Str;

class ImportSwapiData extends Command
{

    protected $signature = 'swapi:import';

    protected $description = 'Imports data from the Star wars API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->createPlanets($this->getAllDataLoadedFromUrl('https://swapi.dev/api/planets/'));
        $this->createSpecies($this->getAllDataLoadedFromUrl('https://swapi.dev/api/species/'));
        $this->createPeople($this->getAllDataLoadedFromUrl('https://swapi.dev/api/people/'));
        return Command::SUCCESS;
    }

    protected function getAllDataLoadedFromUrl(string $url): Collection
    {
        $planets = collect();
        while ($url) {
            $request = Http::get($url)->json();
            $planets->push(...$request['results']);
            if (!$request['next']) {
                break;
            }
            $url = $request['next'];
        }
        return $planets;
    }

    protected function createPlanets(Collection $collection): void
    {
        $collection->map(static function (array $planet) {
            Planet::firstOrCreate(
                [
                    'original_id' => trim(Str::after($planet['url'], '/planets'), '/')
                ],
                [
                    'name' => $planet['name'],
                    'climate' => $planet['climate'],
                    'created_at' => CarbonImmutable::parse($planet['created']),
                    'diameter' => $planet['diameter'],
                    'updated_at' => CarbonImmutable::parse($planet['edited']),
                    'gravity' => (float)$planet['gravity'],
                    'orbital_period' => (int)$planet['orbital_period'],
                    'population' => (int)$planet['population'],
                    'rotation_period' => (int)$planet['population'],
                    'surface_water' => $planet['population'],
                    'terrain' => $planet['terrain'],
                    'url' => $planet['url'],
                ]
            )->saveOrFail();
        });
    }

    private function createSpecies(Collection $collection): void
    {
        $collection->map(static function (array $swapiSpecies) {
            $species = Species::firstOrCreate(
                [
                    'original_id' => trim(Str::after($swapiSpecies['url'], '/species'), '/')
                ],
                [
                    'name' => $swapiSpecies['name'],
                    'classification' => $swapiSpecies['classification'],
                    'created_at' => CarbonImmutable::parse($swapiSpecies['created']),
                    'updated_at' => CarbonImmutable::parse($swapiSpecies['edited']),
                    'average_height' => $swapiSpecies['average_height'],
                    'average_lifespan' => $swapiSpecies['average_lifespan'],
                    'eye_colors' => $swapiSpecies['eye_colors'],
                    'hair_colors' => $swapiSpecies['hair_colors'],
                    'skin_colors' => $swapiSpecies['skin_colors'],
                    'language' => $swapiSpecies['language'],
                    'designation' => $swapiSpecies['designation'],
                    'url' => $swapiSpecies['url'],
                ]
            );
            $planet = Planet::firstWhere('original_id', trim(Str::after($swapiSpecies['homeworld'], '/planets'), '/'));
            if ($planet) {
                $species->planet()->associate($planet->id);
            }
            $species->saveOrFail();
        });
    }

    private function createPeople(Collection $collection): void
    {
        $collection->map(static function (array $swapiPeople) {
            $people = People::firstOrCreate(
                [
                    'original_id' => trim(Str::after($swapiPeople['url'], '/people'), '/')
                ],
                [
                    'birth_year' => $swapiPeople['birth_year'],
                    'eye_color' => $swapiPeople['eye_color'],
                    'gender' => $swapiPeople['gender'],
                    'hair_color' => $swapiPeople['hair_color'],
                    'height' => $swapiPeople['height'],
                    'mass' => $swapiPeople['mass'],
                    'name' => $swapiPeople['name'],
                    'skin_color' => $swapiPeople['skin_color'],
                    'url' => $swapiPeople['url'],
                    'created_at' => CarbonImmutable::parse($swapiPeople['created']),
                    'updated_at' => CarbonImmutable::parse($swapiPeople['edited']),
                ]
            );

            $species = array_map(static function ($specie) {
                return (int) trim(Str::after($specie, '/species'), '/');
            }, $swapiPeople['species']);
            $loadedSpecies = Species::whereIn('original_id', $species)->get();
            $people->species()->detach();
            $people->species()->attach($loadedSpecies);

            $planet = Planet::firstWhere('original_id', trim(Str::after($swapiPeople['homeworld'], '/planets'), '/'));
            if($planet) {
                $people->planet()->associate($planet->id);
            }
            $people->saveOrFail();;
        });
    }
}
