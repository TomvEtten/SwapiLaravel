<?php

namespace App\Http\Resources;

use App\Http\Controllers\SpeciesController;
use Illuminate\Http\Resources\Json\JsonResource;

class SpeciesResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'classification' => $this->classification,
            'designation' => $this->designation,
            'average_height' => $this->average_height,
            'average_lifespan' => $this->average_lifespan,
            'eye_colors' => $this->eye_colors,
            'height' => $this->height,
            'hair_colors' => $this->hair_colors,
            'skin_colors' => $this->skin_colors,
            'language' => $this->language,
            'url' => $this->url,
            $this->mergeWhen($request->route()?->getControllerClass() === SpeciesController::class , [
                'planet' => new PlanetResource($this->planet),
                'people' => new PeopleCollection($this->people),
            ]),
        ];
    }
}
