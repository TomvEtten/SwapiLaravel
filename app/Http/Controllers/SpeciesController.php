<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\SpeciesCollection;
use App\Models\Species;
use Illuminate\Routing\Controller as BaseController;

class SpeciesController extends BaseController
{

    public function __invoke()
    {
        return new SpeciesCollection(Species::paginate());
    }
}
