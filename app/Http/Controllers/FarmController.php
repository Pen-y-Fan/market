<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Farm;
use App\Market;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::orderBy('name', 'asc')->paginate(9);
        return view('farms.index', ['farms' => $farms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('farms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $farm = $this->validate($request, [
            'name' => 'bail|required|unique:markets|max:255',
            'website' => 'bail|required',
            'city' => 'bail|required',
        ]);
        Farm::create($farm);
        return redirect('farms');
    }

    /**
     * Display the specified resource.
     */
    public function show(Farm $farm)
    {
        return view('farms.show', ['farm' => $farm]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farm)
    {
        $markets = Market::select('name', 'id')->sortBy('name');

        return view('farms.edit', compact('farm', 'markets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farm $farm)
    {
        $farm->update($request->all());
        $farm->markets()->sync($request->markets);
        return redirect('farms');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farm $farm): void
    {
    }
}
