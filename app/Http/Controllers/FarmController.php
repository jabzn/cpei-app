<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFarmRequest;
use App\Http\Requests\UpdateFarmRequest;
use App\Models\Farm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FarmController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Farm/Index', [
            'farms' => Farm::getFarms($request->search),
            'can' => [
                'create_farm' => Auth()->user()->can('create', Farm::class),
                'modify_farm' => Auth()->user()->can('modify', Farm::class),
            ],
        ]);
    }

    public function create()
    {
        return Inertia::render('Farm/Create', [
            'users' => User::getTsUsers(),
        ]);
    }

    public function store(StoreFarmRequest $request)
    {
        Farm::create($request->validated());

        return Redirect::route('farms');
    }

    public function edit(Farm $farm)
    {
        return Inertia::render('Farm/Edit', [
            'farm'  => $farm,
            'users' => User::getTsUsers(),
        ]);
    }

    public function update(UpdateFarmRequest $request, Farm $farm)
    {
        $farm->update($request->validated());

        return redirect()->route('farms');
    }

    public function destroy(Farm $farm)
    {
        $farm->delete();

        return redirect()->route('farms');
    }
}
