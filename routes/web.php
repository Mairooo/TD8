<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuteurController;
use App\Livewire\Auteur\CreateAuteur;
use App\Livewire\Auteur\ListeAuteurs;
use App\Livewire\Categorie\CreateCategorie;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [ContactController::class, 'index']);

// Routes pour les livres (lecture seule pour le public) - DÉSACTIVÉES
// Route::get('/livres', [LivreController::class, 'index']);
Route::get('/livres/categories', [LivreController::class, 'categories']);
Route::get('/livres/{id}', [LivreController::class, 'show'])->where('id', '[0-9]+');

// Routes pour les catégories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('/', [CategorieController::class, 'store'])->name('categories.store');
});

// Route pour le formulaire Livewire de création de catégorie
Route::get('/categorie/create', CreateCategorie::class)->name('categorie.create');

// Routes pour les auteurs (lecture seule pour le public)
Route::get('/auteurs/Continent', [AuteurController::class, 'parcontinent']);
Route::get('/auteurs', ListeAuteurs::class)->name('auteurs.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Catalogue accessible à tous les utilisateurs authentifiés
    Route::get('/catalogue', App\Livewire\CatalogueLivres::class)->name('catalogue.livres');
});

// Routes protégées par le middleware role:libraire
Route::middleware(['auth', 'role:libraire'])->group(function () {
    Route::get('/livres/create', App\Livewire\LivreCreate::class)->name('livres.create');
    Route::get('/livres/edit/{id}', App\Livewire\LivreEdit::class)->name('livres.edit');
    Route::get('/auteur/create', App\Livewire\Auteur\CreateAuteur::class)->name('auteur.create');
});

// Routes protégées par le middleware role:admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', App\Livewire\AdminUsers::class)->name('admin.users');
});
