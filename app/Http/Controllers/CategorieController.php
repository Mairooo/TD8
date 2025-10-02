<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Affiche la liste de toutes les catégories
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer toutes les catégories triées par intitulé
        $categories = Categorie::orderBy('intitule')->get();
        
        return view('categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle catégorie
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Enregistre une nouvelle catégorie
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required|string|max:255|unique:categories,intitule',
            'description' => 'nullable|string|max:1000'
        ]);

        // Récupère les données du formulaire
        $intitule = $request->input('intitule');
        $description = $request->input('description');

        // Crée la nouvelle catégorie dans la base
        Categorie::create([
            'intitule' => $intitule,
            'description' => $description
        ]);

        // Redirige vers GET /categories avec la fonction redirect()->route()
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès !');
    }
}
