<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Category;
use App\Http\Requests\AutoRequest;

use App\Services\AutoService;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class AutoController
 * @package App\Http\Controllers
 */
class AutoController extends Controller
{
    /**
     * @var AutoService
     */
    protected $autoService;
    protected $categoryService;

    /**
     * AutoController constructor.
     * @param AutoService $autoService
     * @param CategoryService $categoryService
     */
    public function __construct(AutoService $autoService, CategoryService $categoryService)
    {
        $this->autoService = $autoService;
        $this->categoryService = $categoryService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $autos = $this->autoService->paginate();

        return view('autos.index', [
            'autos' => $autos
        ]);
    }

    public function create(): View
    {
        $categories = $this->categoryService->pluck();


        return view('autos.create', [
            'categories' => $categories
        ]);
    }

    public function store(AutoRequest $request): RedirectResponse
    {
        $this->autoService->createNewCar($request->getMake(), $request->getModel(), $request->getSelectedCategories());

        return redirect()->route('admin.autos.index');
    }

    public function edit(Auto $auto): View
    {
        $categories = $this->categoryService->pluck();
        $selectedCategories = $auto->categories->pluck('id')->toArray();

        return view('autos.edit', [
            'auto' => $auto,
            'categories' => $categories,
            'selectedCategories' => $selectedCategories
        ]);
    }

    public function update(AutoRequest $autoRequest, Auto $auto): RedirectResponse
    {
        $this->autoService->update($auto, $auto->id, $autoRequest->getMake(), $autoRequest->getModel(), $autoRequest->getSelectedCategories());

        return redirect()->route('admin.autos.index');
    }

    public function show(int $id): View
    {
        $auto = $this->autoService->findAutoById($id);
        return view('autos.show', [
            'auto' => $auto
        ]);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->autoService->delete($id);
        return redirect()->route('admin.autos.index');
    }
}
