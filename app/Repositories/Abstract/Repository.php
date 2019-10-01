<?php
namespace App\Repositories\Abstracts;

use http\Exception\RuntimeException as RuntimeExceptionAlias;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    const DEFAULT_PER_PAGE = 15;
    const DEFAULT_ATTRIBUTE_FIELD = "id";

    abstract public function model(): string;

    final public function makeModel(): Model
    {
        $model = app($this->model());

        if (!$model instanceof Model){
            throw new RuntimeExceptionAlias("Class ". $this->model(). " not found of use Illuminate\\Database\\Eloquent\\Model");
        }

        return $model;
    }

    final public function makeQuery(): Builder
    {
        return $this->makeModel()->newQuery();
    }

    public function create(array $data): Model
    {
        return $this->makeQuery()->create($data);
    }

    public function paginate(int $perPage = self::DEFAULT_PER_PAGE, array $columns = ['*']): LengthAwarePaginator
    {
        return $this->makeQuery()->paginate($perPage, $columns);
    }

    public function update(array $data, $attributeValue, string $attributeField = self::DEFAULT_ATTRIBUTE_FIELD): int
    {
        return $this->makeQuery()->where($attributeField, $attributeValue)->update($data);
    }

    public function delete(int $id)
    {
        return $this->makeQuery()->where('id', $id)->delete();
    }

    public function find($id, array $columns = ['*'])
    {
        return $this->makeQuery()->find($id, $columns);
    }
}
