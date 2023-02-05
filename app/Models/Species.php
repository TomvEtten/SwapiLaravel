<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Species
 *
 * @property string $id
 * @property int $original_id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property string $classification
 * @property string $designation
 * @property float $average_height
 * @property int $average_lifespan
 * @property string $eye_colors
 * @property string $height
 * @property string $hair_colors
 * @property string $skin_colors
 * @property string $language
 * @property string $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\People[] $people
 * @property-read int|null $people_count
 * @property-read \App\Models\Planet|null $planet
 * @method static \Database\Factories\SpeciesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Species newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Species newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Species query()
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereAverageHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereAverageLifespan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereEyeColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereHairColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereOriginalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereSkinColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Species whereUrl($value)
 * @mixin \Eloquent
 */
class Species extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(People::class);
    }

    public function planet(): BelongsTo
    {
        return $this->belongsTo(Planet::class);
    }
}
