<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\PeopleCollection;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class PeopleController extends BaseController
{

    public function __invoke(Request $request)
    {
        $cache = Cache::get($request->fullUrl());
        if ($cache) {
            return $cache;
        }

        $collection = new PeopleCollection(People::paginate());
        Cache::set($request->fullUrl(), $collection, 3600);
        return $collection;
    }
}
