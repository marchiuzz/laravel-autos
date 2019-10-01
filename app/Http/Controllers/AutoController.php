<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Http\Requests\AutoRequest;

use App\Services\AutoService;
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

    /**
     * AutoController constructor.
     * @param AutoService $autoService
     */
    public function __construct(AutoService $autoService)
    {
        $this->autoService = $autoService;
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
        return view('autos.create');
    }

    public function store(AutoRequest $request): RedirectResponse
    {
        $this->autoService->createNewCar($request->getMake(), $request->getModel());

        return redirect()->route('admin.autos.index');
    }

    public function edit(Auto $auto): View
    {
        return view('autos.edit', [
            'auto' => $auto
        ]);
    }

    public function update(AutoRequest $autoRequest, Auto $auto): RedirectResponse
    {
        $this->autoService->update($auto->id, $autoRequest->getMake(), $autoRequest->getModel());

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
