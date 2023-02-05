<?php

namespace App\Http\Resources;

use App\Http\Controllers\PlanetController;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanetResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'diameter' => $this->diameter,
            'rotation_period' => $this->rotation_period,
            'orbital_period' => $this->orbital_period,
            'gravity' => $this->gravity,
            'population' => $this->population,
            'climate' => $this->climate,
            'terrain' => $this->terrain,
            'surface_water' => $this->surface_water,
            'url' => $this->url,
            $this->mergeWhen($request->route()?->getControllerClass() === PlanetController::class , [
                'species' => new SpeciesResource($this->species),
                'people' => new PeopleCollection($this->people),
            ]),
        ];
    }
}
