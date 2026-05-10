<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Image;
use App\Models\chambre;
class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::select(
            "id",
            "name",
            "address",
            "city",
             "description",
            "numberetoile",
            "pixmax"
        ) -> with('images')->paginate(18);
        return view("hotels",compact("hotels"));
        
    }
    public function show($id){
        $hotel = Hotel::with('images') -> findOrFail($id);
        $chambre = Chambre::with('images')-> where('hotels_id', $id)->get();
        return view ("detailhotel", compact("hotel","chambre"));
    }
}
