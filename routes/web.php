<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/membres', [MembreController::class, 'index'])->name('membres.index');
Route::get('/membres/create', [MembreController::class, 'create'])->name('membres.create');
