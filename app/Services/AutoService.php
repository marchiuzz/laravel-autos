<?php
namespace App\Services;

use App\Auto;
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

    public function update(int $autoId, string $make, string $model): int
    {
        return $this->autoRepository->update([
            'make' => $make,
            'model' => $model
        ], $autoId);
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->autoRepository->paginate();
    }

    public function createNewCar(string $make, string $model)
    {
        $this->autoRepository->create([
            'make' => $make,
            'model' => $model
        ]);
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function findAutoById(int $id): ?Model
    {
        return $this->autoRepository->find($id);
    }

    public function delete(int $id)
    {
        return $this->autoRepository->delete($id);
    }
}
