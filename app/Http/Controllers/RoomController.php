<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Chambre;
use App\Models\Image; // Assure-toi que ton modèle s'appelle Room ou Chambre
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index() 
    {
        $nbHotels = Hotel::count();
        $nbChambres = Chambre::count();
        $nbUser = User::count();
        $chambres = Chambre:: select([
            "number",
            "type",
            "price",
            "status",
            'id',
            'capacity',
            'hotels_id'
        ]) -> with('hotels') -> get();
        $nbHotels = Hotel::count();

        return view('admin.gestion-chambre', compact('chambres', 'nbHotels', 'nbChambres','nbUser'));

    }

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
            'type' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'discription' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg.|max:2048',
            'hotels_id'=>'required|numeric',
        ]);

        // 2. Gestion de l'image de la chambre

        // 3. Création de la chambre liée à l'hôtel
        $chambre = Chambre::create([
            'type' => $request->type,
            'number' => $request->number,
            'discription' => $request->discription,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'hotels_id' =>  $request->hotels_id,
        ]);
        if($request -> hasFile('image')){
               foreach ($request -> file('image') as $image){
                // genere le nom de l'image de facon unique avec time
                $file = time().'_'. uniqid().'.'.$image ->extension();
                // deplacer vers le dossier public
                $image -> move(public_path('images'), $file);
                //enregistrer l'image
                Image::create ([
                    'hotels_id' => null,
                    'url' => 'images/'. $file,
                    'chambres_id' => $chambre ->id,
                ]);
               }
           }

        return redirect()->route('hotels.show', $request->hotels_id)
                         ->with('success', 'La chambre a été ajoutée avec succès !');
    }

    /**
     * Affiche les détails d'une chambre (pour la réservation par exemple)
     */
    public function show($id)
    {
        $chambres = Chambre::with(['images', 'hotels']) -> findOrFail($id);
        return view('chambre.show', compact('chambres'));
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