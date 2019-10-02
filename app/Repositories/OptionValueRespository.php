<?php


namespace App\Repositories;


use App\OptionValue;
use App\Repositories\Abstracts\Repository;

class OptionValueRespository extends Repository
{
    public function model(): string
    {
        return OptionValue::class;
    }
}
