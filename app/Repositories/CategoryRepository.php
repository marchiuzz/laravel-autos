<?php
namespace App\Repositories;

use App\Category;
use App\Repositories\Abstracts\Repository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends Repository
{
    public function model(): string
    {
        return Category::class;
    }
}
