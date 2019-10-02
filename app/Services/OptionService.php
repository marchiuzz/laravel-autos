<?php


namespace App\Services;


use App\Repositories\OptionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OptionService
{
    /**
     * @var OptionRepository
     */
    private $optionRepository;

    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    public function update(int $categoryId, string $name): int
    {
        return $this->optionRepository->update([
            'option_name' => $name
        ], $categoryId);
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->optionRepository->makeQuery()->orderByDesc('created_at')->paginate();
    }

    public function createNewOption(string $name): Model
    {
        return $this->optionRepository->create([
            'option_ame' => $name
        ]);
    }

    public function findOptionById(int $id): ?Model
    {
        return $this->optionRepository->find($id);
    }

    public function delete(int $id)
    {
        return $this->optionRepository->delete($id);
    }

    public function pluck(): Collection
    {
        $categories = $this->optionRepository->makeQuery()->pluck('option_name', 'id');
        return $categories;
    }
}
