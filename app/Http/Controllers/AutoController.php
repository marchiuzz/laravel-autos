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
    protected $autoService;
    public function __construct(AutoService $autoService)
    {
        $this->autoService = $autoService;
    }

    public function index(): View
    {
        $autos = Auto::orderByDesc('created_at')->paginate(5);
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
}
