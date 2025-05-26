<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cities = City::orderBy('name')->paginate(6);
            $count = $cities->total();
            return view('cities.index', compact('cities', 'count'));
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Error fetching cities: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('cities.create');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Error creating city: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            City::create($request->all());

            return redirect()->route('cities.index')->with('success', 'City created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.create')->with('error', 'Error creating city: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $city = City::findOrFail($id);
            return view('cities.show', compact('city'));
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Error fetching city: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            $city = City::findOrFail($id);
            return view('cities.edit', compact('city'));
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Error fetching city: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $city = City::findOrFail($id);
            $city->update($request->all());
            return redirect()->route('cities.index')->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.edit', $id)->with('error', 'Error updating city: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $city = City::findOrFail($id);
            $city->delete();
            return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')->with('error', 'Error deleting city: ' . $e->getMessage());
        }
    }
}
