<?php


namespace App\Repositories;


use App\Option;
use App\Repositories\Abstracts\Repository;

class OptionRepository extends Repository
{

    public function model(): string
    {
        return Option::class;
    }
}
