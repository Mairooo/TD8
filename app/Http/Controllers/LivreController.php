<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class LivreController extends Controller
{
    /**
     * Affiche la liste de tous les livres avec leurs auteurs (avec pagination)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer les livres avec leurs auteurs et pagination (10 par page)
        $livres = Livre::with('auteur')->orderBy('titre')->paginate(10);
        
        return view('livres.index', compact('livres'));
    }

    /**
     * Affiche les livres d'une catégorie spécifique
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function categories(Request $request)
    {
        $categorieId = $request->query('categorie');
        
        // Récupérer la catégorie
        $categorie = \App\Models\Categorie::findOrFail($categorieId);
        
        // Récupérer les livres de cette catégorie avec pagination
        $livres = Livre::with(['auteur', 'categories'])
                      ->whereHas('categories', function($query) use ($categorieId) {
                          $query->where('categories.id', $categorieId);
                      })
                      ->orderBy('titre')
                      ->paginate(10);
        
        return view('livres.categories', compact('livres', 'categorie'));
    }

    /**
     * Affiche un livre spécifique
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Récupérer le livre avec seulement l'auteur pour éviter les erreurs
        $livre = Livre::with('auteur')->findOrFail($id);
        
        return view('livres.show', compact('livre'));
    }
}
