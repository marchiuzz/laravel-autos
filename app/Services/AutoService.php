<?php

namespace App\Services;

use App\Auto;
use App\Repositories\Abstracts\Repository;
use App\Repositories\AutoRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class AutoService
{
    protected $autoRepository;

    /**
     * AutoService constructor.
     * @param AutoRepository $autoRepository
     */
    public function __construct(AutoRepository $autoRepository)
    {
        $this->autoRepository = $autoRepository;
    }

    public function update(Auto $auto, int $autoId, string $make, string $model, array $categories, array $selectedOptionsValues): int
    {
        /** @var Auto $auto */
        $updatedAuto = $this->autoRepository->update([
            'make' => $make,
            'model' => $model,
        ], $autoId);

        $auto->categories()->sync($categories);
        $auto->option_value()->sync($selectedOptionsValues);

        return $updatedAuto;
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->autoRepository->with(['categories', 'option_value.option'])->orderByDesc('id')->paginate(Repository::DEFAULT_PER_PAGE);
    }

    public function createNewCar(string $make, string $model, array $categories, array $selectedOptionsValues): Model
    {
        /** @var Auto $auto */
        $auto = $this->autoRepository->create([
            'make' => $make,
            'model' => $model,
        ]);

        $auto->categories()->attach($categories);

        $auto->option_value()->attach($selectedOptionsValues);

        return $auto;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function findAutoById(int $id): Auto
    {
        return $this->autoRepository->makeQuery()->with(['option_value.option'])->findOrFail($id);
    }

    public function delete(int $id)
    {
        return $this->autoRepository->delete($id);
    }
}
