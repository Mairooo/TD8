<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Affiche la page "À propos" de l'application
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('about');
    }
}
