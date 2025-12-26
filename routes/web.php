<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/membres', [MembreController::class, 'index'])->name('membres.index');
Route::get('/membres/create', [MembreController::class, 'create'])->name('membres.create');
Route::get('/membres/{id}', [MembreController::class, 'show'])->name('membres.show');
// interface Dashboard de gestion de membre
Route::get('/backoffice/gestion-membre/dashboard', function () {
    return view('backoffice.gestion-membre.dashboard');
})->name('backoffice.dashboard');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__ . '/auth.php';
