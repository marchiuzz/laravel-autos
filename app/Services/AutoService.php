<?php
namespace App\Services;

use App\Repositories\AutoRepository;

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

    public function createNewCar(string $make, string $model)
    {
        $this->autoRepository->create([
            'make' => $make,
            'model' => $model
        ]);
    }
}
