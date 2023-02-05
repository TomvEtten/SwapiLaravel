<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Planet
 *
 * @property string $id
 * @property int $original_id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property string $name
 * @property int $diameter
 * @property int $rotation_period
 * @property int $orbital_period
 * @property float $gravity
 * @property int $population
 * @property string $climate
 * @property string $terrain
 * @property string $surface_water
 * @property string $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\People[] $people
 * @property-read int|null $people_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Species[] $species
 * @property-read int|null $species_count
 * @method static \Database\Factories\PlanetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Planet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Planet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereClimate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereDiameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereGravity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereOrbitalPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereOriginalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet wherePopulation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereRotationPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereSurfaceWater($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereTerrain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Planet whereUrl($value)
 * @mixin \Eloquent
 */
class Planet extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function people(): HasMany
    {
        return $this->hasMany(People::class);
    }

    public function species(): HasOne
    {
        return $this->hasOne(Species::class);
    }
}
