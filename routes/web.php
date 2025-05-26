<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CitizenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('citizens', CitizenController::class);
    Route::resource('cities', CityController::class);
});

// Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
// Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
// Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
// Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');
// Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
// Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
// Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');



require __DIR__.'/auth.php';
