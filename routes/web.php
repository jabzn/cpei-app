<?php

use App\Http\Controllers\FarmController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/farms', [FarmController::class, 'index'])
        ->name('farms');
    Route::middleware('can:create,App\Models\Farm')->group(function () {
        Route::get('/farm/create', [FarmController::class, 'create'])->name('farm.create');
        Route::post('/farm', [FarmController::class, 'store'])->name('farm.store');
    });
    Route::middleware('can:modify,farm')->group(function () {
        Route::get('farm/{farm}/edit', [FarmController::class, 'edit'])->name('farm.edit');
        Route::patch('farm/{farm}', [FarmController::class, 'update'])->name('farm.update');
        Route::delete('farm/{farm}', [FarmController::class, 'destroy'])->name('farm.destroy');
    });
});

require __DIR__.'/auth.php';
