<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\OptionValue
 *
 * @property int $id
 * @property string $option_value
 * @property int $option_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Option $option
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue whereOptionValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OptionValue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OptionValue extends Model
{
    protected $table = "option_values";

    protected $fillable = [
        'option_value',
        'option_id'
    ];

    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
