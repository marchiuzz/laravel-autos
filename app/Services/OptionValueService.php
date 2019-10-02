<?php


namespace App\Services;


use App\Repositories\OptionValueRespository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OptionValueService
{
    /**
     * @var OptionValueRespository
     */
    private $optionValueRespository;

    public function __construct(OptionValueRespository $optionValueRespository)
    {
        $this->optionValueRespository = $optionValueRespository;
    }

    public function update(int $optionId, string $value): int
    {
        return $this->optionValueRespository->update([
            'option_value' => $value
        ], $optionId);
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->optionValueRespository->makeQuery()->orderByDesc('created_at')->paginate();
    }

    public function createNewOption(string $value): Model
    {
        return $this->optionValueRespository->create([
            'option_value' => $value
        ]);
    }

    public function findOptionValueById(int $id): ?Model
    {
        return $this->optionValueRespository->find($id);
    }

    public function delete(int $id)
    {
        return $this->optionValueRespository->delete($id);
    }

    public function pluck(): Collection
    {
        $categories = $this->optionValueRespository->makeQuery()->pluck('option_value', 'id');
        return $categories;
    }

}
