<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\City;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $citizens = Citizen::orderBy('first_name', 'asc')->paginate(10);
            return view('citizens.index', compact('citizens'));
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', __('Failed to fetch citizens.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $cities = City::orderBy('name', 'asc')->get();
            return view('citizens.create', compact('cities'));
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', __('Failed to fetch cities.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        try {
            Citizen::create($request->all());
            return redirect()->route('citizens.index')->with('success', __('Citizen created successfully.'));
        } catch (\Exception $e) {
            return redirect()->route('citizens.create')->with('error', __('Failed to create citizen.'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $citizen = Citizen::findOrFail($id);
            return view('citizens.show', compact('citizen'));
        } catch (\Exception $e) {
            return redirect()->route('citizens.index')->with('error', __('Failed to fetch citizen.'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $citizen = Citizen::findOrFail($id);
            $cities = City::orderBy('name', 'asc')->get();
            return view('citizens.edit', compact('citizen', 'cities'));
        } catch (\Exception $e) {
            return redirect()->route('citizens.index')->with('error', __('Failed to fetch citizen.'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        try {
            $citizen = Citizen::findOrFail($id);
            $citizen->update($request->all());
            return redirect()->route('citizens.index')->with('success', __('Citizen updated successfully.'));
        } catch (\Exception $e) {
            return redirect()->route('citizens.edit', $id)->with('error', __('Failed to update citizen.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $citizen = Citizen::findOrFail($id);
            $citizen->delete();
            return redirect()->route('citizens.index')->with('success', __('Citizen deleted successfully.'));
        } catch (\Exception $e) {
            return redirect()->route('citizens.index')->with('error', __('Failed to delete citizen.'));
        }
    }
}
