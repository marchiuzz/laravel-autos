<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Auto
 *
 * @property int $id
 * @property string $make
 * @property string $model
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Auto newModelQuery()
 * @method static Builder|Auto newQuery()
 * @method static Builder|Auto query()
 * @method static Builder|Auto whereCreatedAt($value)
 * @method static Builder|Auto whereId($value)
 * @method static Builder|Auto whereMake($value)
 * @method static Builder|Auto whereModel($value)
 * @method static Builder|Auto whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string $image
 * @method static Builder|Auto whereImage($value)
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\OptionValue[] $option_value
 * @property-read int|null $option_value_count
 */
class Auto extends Model
{
    protected $fillable = [
        'make',
        'model',
        'image'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function option_value(): BelongsToMany
    {
        return $this->belongsToMany(OptionValue::class, 'auto_option_values');
    }
}
