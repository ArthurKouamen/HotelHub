<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Chambre; // Assure-toi que le nom du modèle est correct (Chambre ou Room)
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {  
        Reservation::where('status','reserve')
                    ->  where('departure_date','<' ,now())
                    -> update([
                        'status' => 'termine',
                    ]);
        // On récupère les compteurs
        $nbHotels = Hotel::count();
        $nbChambres = Chambre::count();
        $hotels = Hotel::select([ 
            'name',
            'city',
            'status',
            'id',
         ]) ->get();

        // On peut aussi récupérer le nombre d'utilisateurs si tu veux
        $nbUsers = User::count();


        // On envoie ces variables à la vue
        return view('admin.dashboard', compact('nbHotels', 'nbChambres', 'nbUsers','hotels'));
    }
}