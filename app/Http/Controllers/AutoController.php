<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AutoController extends Controller
{
    public function index(): View
    {
        return view('autos.index');
    }

    public function create(): View
    {
        return view('autos.create');
    }

    public function store(Request $request)
    {

    }
}
