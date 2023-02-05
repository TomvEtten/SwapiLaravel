<?php

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\SpeciesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/people', PeopleController::class);
Route::get('/species', SpeciesController::class);
Route::get('/planets', PlanetController::class);

