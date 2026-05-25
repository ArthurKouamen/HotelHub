<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Afficher la liste des hôtels
     */
    public function index()
    {
        // Récupérer tous les hôtels
        $hotels = Hotel::all();

        // Retourner la vue avec les données
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Afficher les détails d’un hôtel
     */
    public function show($id)
    {
        // Rechercher l’hôtel par son ID
        $hotel = Hotel::findOrFail($id);

        // Retourner la vue des détails
        return view('hotels.show', compact('hotel'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Enregistrer un nouvel hôtel
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload image
        $imagePath = $request->file('image')->store('hotels', 'public');

        // Création hôtel
        Hotel::create([
            'name' => $request->name,
            'city' => $request->city,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        // Redirection
        return redirect()->route('hotels.index')
                         ->with('success', 'Hôtel ajouté avec succès.');
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Mettre à jour un hôtel
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Vérifier si une nouvelle image est envoyée
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('hotels', 'public');

            $hotel->image = $imagePath;
        }

        // Mise à jour
        $hotel->name = $request->name;
        $hotel->city = $request->city;
        $hotel->description = $request->description;

        $hotel->save();

        return redirect()->route('hotels.index')
                         ->with('success', 'Hôtel modifié avec succès.');
    }

    /**
     * Supprimer un hôtel
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel->delete();

        return redirect()->route('hotels.index')
                         ->with('success', 'Hôtel supprimé avec succès.');
    }
}