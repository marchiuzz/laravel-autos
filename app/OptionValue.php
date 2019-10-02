<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
