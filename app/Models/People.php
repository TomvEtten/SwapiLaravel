<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\People
 *
 * @property string $id
 * @property int $original_id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property string $name
 * @property string $birth_year
 * @property string $eye_color
 * @property string $gender
 * @property string $hair_color
 * @property string $height
 * @property string $mass
 * @property string $skin_color
 * @property string $url
 * @property string $planet_id
 * @property-read \App\Models\Planet|null $planet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Species[] $species
 * @property-read int|null $species_count
 * @method static \Database\Factories\PeopleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|People newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|People newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|People query()
 * @method static \Illuminate\Database\Eloquent\Builder|People whereBirthYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereEyeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereHairColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereMass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereOriginalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People wherePlanetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereSkinColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereUrl($value)
 * @mixin \Eloquent
 */
class People extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function planet(): BelongsTo
    {
        return $this->belongsTo(Planet::class);
    }
    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Species::class);
    }
}
