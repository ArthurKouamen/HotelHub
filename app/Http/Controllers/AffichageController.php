<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class AffichageController extends Controller
{
    public function show($id)
    {
        $hotel = Hotel::with('chambres')->findOrFail($id);
        return view('hotels.show', compact('hotel'));
    }
}
