<?php


namespace App\Services;


use App\Repositories\Abstracts\Repository;
use App\Repositories\OptionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
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

    public function update(int $optionId, string $name): int
    {
        return $this->optionRepository->update([
            'option_name' => $name
        ], $optionId);
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->optionRepository->makeQuery()->with('values')->orderByDesc('created_at')->paginate(Repository::DEFAULT_PER_PAGE);
    }

    public function createNewOption(string $name): Model
    {
        return $this->optionRepository->create([
            'option_name' => $name
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
        $options = $this->optionRepository->makeQuery()->pluck('option_name', 'id');
        return $options;
    }

    public function with(): Collection
    {
        $options = $this->optionRepository->with(['values'])->get();

        return $options;
    }
}
