<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Chambre; // Assure-toi que le nom du modèle est correct (Chambre ou Room)
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // On récupère les compteurs
        $nbHotels = Hotel::count();
        $nbChambres = Chambre::count();

        // On peut aussi récupérer le nombre d'utilisateurs si tu veux
        $nbUsers = \App\Models\User::count();

        // On envoie ces variables à la vue
        return view('admin.dashboard', compact('nbHotels', 'nbChambres', 'nbUsers'));
    }
}