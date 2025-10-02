<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;

class AuteurController extends Controller
{
    /**
     * Affiche la liste de tous les auteurs
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $auteurs = Auteur::orderBy('name')->get();
        return view('auteurs.index', compact('auteurs'));
    }

    /**
     * Filtre les auteurs par continent
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function parcontinent(Request $request)
    {
        $intitule = $request->query('intitule');
        $continent = 'Continent';
        
        // Filtrer les auteurs par continent
        $auteurs = Auteur::where('continent', $intitule)
                         ->orderBy('name')
                         ->get();
        
        return view('auteurs.continent', compact('auteurs', 'continent', 'intitule'));
    }
}
