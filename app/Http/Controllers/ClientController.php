<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Affiche le tableau de bord du client avec ses réservations
     */
    public function index()
    {
        // 1. Récupérer l'utilisateur actuellement connecté
        $user = Auth::user();

        // 2. Récupérer les réservations de cet utilisateur
        // On utilise "with" pour charger les relations et éviter les ralentissements (Eager Loading)
        // 'chambre.hotel' permet d'avoir les détails de la chambre et du nom de l'hôtel en une fois
        $reservations = $user->reservations()
            ->with(['chambres.hotels', 'chambres.images']) 
            ->latest() // Les plus récentes en premier
            ->get();

        // 3. Envoyer les données à la vue
        return view('client.dashboard', compact('user', 'reservations'));
    }

    /**
     * Permet au client d'annuler une réservation (Optionnel)
     */
    public function cancelReservation(Reservation $reservation)
    {
        // Vérifier que la réservation appartient bien à l'utilisateur connecté
        if ($reservation->user_id !== Auth::id()) {
            return back()->with('error', 'Action non autorisée.');
        }

        // On change le statut au lieu de supprimer (mieux pour l'historique)
        $reservation->update(['status' => 'annulée']);

        return back()->with('success', 'Votre réservation a été annulée.');
    }
}