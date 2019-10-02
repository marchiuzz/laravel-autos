<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionValuesRequest;
use App\Services\OptionService;
use App\Services\OptionValueService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OptionsValuesController extends Controller
{
    /**
     * @var OptionValueService
     */
    private $optionValueService;
    /**
     * @var OptionService
     */
    private $optionService;

    public function __construct(OptionValueService $optionValueService, OptionService $optionService)
    {
        $this->optionValueService = $optionValueService;
        $this->optionService = $optionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $values = $this->optionValueService->paginate();
        return view('options_values.index', [
            'values' => $values
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $options = $this->optionService->pluck();

        return view('options_values.create', [
            'options' => $options
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionValuesRequest $request): RedirectResponse
    {
        $this->optionValueService->createNewOption($request->getValue(), $request->getSelectedOption());

        return redirect()->route('admin.options_values.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): View
    {
        $value = $this->optionValueService->findOptionValueById($id);

        return view('options_values.show', [
            'value' => $value
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): View
    {
        $options = $this->optionService->pluck();
        $value = $this->optionValueService->findOptionValueById($id);

        return view('options_values.edit', [
            'value' => $value,
            'options' => $options
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionValuesRequest $request, int $id): RedirectResponse
    {
        $this->optionValueService->update($id, $request->getValue(), $request->getSelectedOption());

        return redirect()->route('admin.options_values.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $this->optionValueService->delete($id);

        return redirect()->route('admin.options_values.index');
    }
}
