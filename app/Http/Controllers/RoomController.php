<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Chambre; // Assure-toi que ton modèle s'appelle Room ou Chambre
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Affiche le formulaire de création d'une chambre pour un hôtel précis
     */
    public function create()
    {
        // 1. On récupère TOUS les hôtels pour pouvoir les choisir dans le formulaire
        $hotels = Hotel::all();

        // 2. On envoie la variable $hotels à la vue
        return view('chambre.create', compact('hotels'));
        // 3. Dans la vue, on affichera un select avec tous les hôtels pour que l'utilisateur puisse choisir à quel hôtel il veut ajouter une chambre}
    }
    /**
     * Enregistre la nouvelle chambre dans la base de données
     */
    public function store(Request $request)
    {
        // 1. Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'bed_type' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Gestion de l'image de la chambre
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
        }

        // 3. Création de la chambre liée à l'hôtel
        $hotel->rooms()->create([
            'name' => $request->name,
            'number' => $request->number,
            'description' => $request->description,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'bed_type' => $request->bed_type,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('hotels.show', $hotel->id)
                         ->with('success', 'La chambre a été ajoutée avec succès !');
    }

    /**
     * Affiche les détails d'une chambre (pour la réservation par exemple)
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Supprimer une chambre
     */
    public function destroy(Room $room)
    {
        // Supprimer l'image du stockage si elle existe
        if ($room->image_url) {
            Storage::disk('public')->delete($room->image_url);
        }

        $hotelId = $room->hotel_id;
        $room->delete();

        return redirect()->route('hotels.show', $hotelId)
                         ->with('success', 'Chambre supprimée.');
    }
}