<?php

namespace App\Http\Resources;

use App\Http\Controllers\PeopleController;
use Illuminate\Http\Resources\Json\JsonResource;

class PeopleResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'birth_year' => $this->birth_year,
            'gender' => $this->gender,
            'eye_color' => $this->eye_color,
            'hair_color' => $this->hair_color,
            'height' => $this->height,
            'mass' => $this->mass,
            'skin_color' => $this->skin_color,
            'url' => $this->url,
            $this->mergeWhen($request->route()?->getControllerClass() === PeopleController::class , [
                'species' => new SpeciesCollection($this->species),
                'planet' => new PlanetResource($this->planet)
            ]),
        ];
    }
}
