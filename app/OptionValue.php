<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    protected $table = "option_values";

    protected $fillable = [
        'option_value'
    ];
}
