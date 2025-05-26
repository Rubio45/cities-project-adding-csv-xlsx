<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Citizen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener métricas
        $totalCities = City::count();
        $totalCitizens = Citizen::count();
        $citiesWithCitizens = City::withCount('citizens')->get();

        // Pasar variables a la vista
        return view('dashboard', [
            'totalCities' => $totalCities,
            'totalCitizens' => $totalCitizens,
            'citiesWithCitizens' => $citiesWithCitizens
        ]);
    }
}
