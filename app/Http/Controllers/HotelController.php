<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Chambre;


class HotelController extends Controller
{
    /**
     * Afficher la liste des hôtels
     */
    public function index()
    {
        $hotels = Hotel::select(
            "id",
            "name",
            "address",
            "city",
            "description",
            "numberetoile",
            "pixmax"
            
        ) -> with('images')->paginate(18);
         return view("hotels.index",compact("hotels"));
    }

    public function welcome(){
        // On récupère les 6 derniers hôtels pour la page d'accueil
        $featuredHotels = Hotel::with('images')->latest()->take(6)->get();

        return view('welcome', compact('featuredHotels'));
    }

    /**
     * Afficher les détails d’un hôtel
     */
    public function show($id)
    {
      
        $hotel = Hotel::with('images') -> findOrFail($id);
        $chambre = Chambre::with('images')-> where('hotels_id', $id)->get();
        return view ("hotels.show", compact("hotel","chambre"));
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
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'address' => 'required|string|',
            'phone'=> 'required|string',
            'pixmax' => 'required|numeric',
            'numberetoile' => 'required|integer',
            'email' => 'required|email'
        ]);

        // Upload image

        // Création hôtel
        $hotel = Hotel::create([
            'name' => $request->name,
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
            'phone'=> $request->phone,
            'pixmax' => $request->pixmax,
            'numberetoile' => $request->numberetoile,
            'email' =>  $request->email,
            'users_id' => auth() ->id(),
         ]);
         if($request -> hasFile('image')){
               foreach ($request -> file('image') as $image){
                // genere le nom de l'image de facon unique avec time
                $file = time().'_'. uniqid().'.'.$image ->extension();
                // deplacer vers le dossier public
                $image -> move(public_path('images'), $file);
                //enregistrer l'image
                Image::create ([
                    'hotels_id' => $hotel -> id,
                    'url' => 'images/'. $file,
                    'chambres_id' => null
                ]);
               }
           }

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
            'address' => 'required|string|max:255',
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
 
    public function search(Request $request){
        $hotel = Hotel:: with('images');

        if($request -> filled('name')){
             $hotel -> where('name', 'like','%'. $request -> name . '%');   
        }
         if($request -> filled('city')){
             $hotel -> where('city', 'like','%'. $request -> city . '%');   
        }
         if($request -> filled('pixmax')){
             $hotel -> where('pixmax' , $request -> pixmax);   
        }
        $hotels = $hotel -> get();
          return view("hotels.index",compact("hotels"));
    }

    public function allImages(Hotel $hotel) {
        // On charge l'hôtel avec toutes ses images
        $hotel->load('images');
    
        return view('hotels.images', compact('hotel'));
    }
}
