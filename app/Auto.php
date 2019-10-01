<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Auto
 *
 * @property int $id
 * @property string $make
 * @property string $model
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Auto whereImage($value)
 */
class Auto extends Model
{
    protected $fillable = [
        'make',
        'model',
        'image'
    ];
}
