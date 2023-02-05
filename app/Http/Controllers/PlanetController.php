<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\PlanetCollection;
use App\Models\Planet;
use Illuminate\Routing\Controller as BaseController;

class PlanetController extends BaseController
{

    public function __invoke()
    {
        return new PlanetCollection(Planet::paginate());
    }
}
