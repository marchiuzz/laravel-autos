<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionsRequest;
use App\Services\OptionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OptionsController extends Controller
{

    /**
     * @var OptionService
     */
    private $optionService;

    public function __construct(OptionService $optionService)
    {
        $this->optionService = $optionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $options = $this->optionService->paginate();

        return view('options.index', [
            'options' => $options
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionsRequest $request): RedirectResponse
    {
        $this->optionService->createNewOption($request->getName());

        return redirect()->route('admin.options.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): View
    {
        $option = $this->optionService->findOptionById($id);

        return view('options.show', [
            'option' => $option
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $option = $this->optionService->findOptionById($id);

        return view('options.edit', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionsRequest $request, int $id): RedirectResponse
    {
        $this->optionService->update($id, $request->getName());

        return redirect()->route('admin.options.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->optionService->delete($id);

        return redirect()->route('admin.options.index');
    }
}
