<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuteurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [ContactController::class, 'index']);

// Routes pour les livres
Route::get('/livres', [LivreController::class, 'index']);
Route::get('/livres/categories', [LivreController::class, 'categories']);
Route::get('/livres/{id}', [LivreController::class, 'show'])->where('id', '[0-9]+');

// Routes pour les catégories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('/', [CategorieController::class, 'store'])->name('categories.store');
});

// Routes pour les auteurs
Route::get('/auteurs', function () {
    return view('auteurs.index');
});
Route::get('/auteurs/Continent', [AuteurController::class, 'parcontinent']);
