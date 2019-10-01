<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function update(int $categoryId, string $name): int
    {
        return $this->categoryRepository->update([
            'name' => $name
        ], $categoryId);
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->categoryRepository->makeQuery()->orderByDesc('created_at')->paginate();
    }

    public function createNewCategory(string $name): Model
    {
        return $this->categoryRepository->create([
            'name' => $name
        ]);
    }

    public function findCategoryById(int $id): ?Model
    {
        return $this->categoryRepository->find($id);
    }

    public function delete(int $id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function pluck(): Collection
    {
        $categories = $this->categoryRepository->makeQuery()->pluck('name', 'id');
        return $categories;
    }
}
