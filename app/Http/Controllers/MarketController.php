<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $markets = Market::orderBy('name', 'asc')->paginate(9);
        return view('markets.index', ['markets' => $markets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('markets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:markets|max:255',
            'website' => 'bail|required',
            'city' => 'bail|required',
        ]);
        Market::create($request->all());
        return redirect('markets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Market $market): View
    {
        return view('markets.show', ['market' => $market]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Market $market)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Market $market)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Market $market)
    {
    }
}
