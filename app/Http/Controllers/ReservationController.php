<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Chambre;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $chambre_id = Chambre::findOrFail($request ->id);
        return view('reservation.create', compact('chambre_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'arrival_date' => 'required|date|after_or_equal:today',
            'departure_date' => 'required|date|after:arrival_date',
            'chambre_id' => 'required|numeric|exists:chambres,id',
        ]);

        $exist = Reservation:: where('chambre_id', $request->chambre_id)
                            -> where('arrival_date', '<' , $request -> departure_date)
                            -> where('departure_date','>',$request -> arrival_date)
                            -> exists();
        
        if(!$exist){
            $reservation = Reservation::create([
                'arrival_date' => $request->arrival_date,
                'departure_date' => $request->departure_date,
                'chambre_id' => $request -> chambre_id,
                'users_id' => Auth::user() ->id,
                'status' => 'confirmée',
            ]);
            return redirect()->route('room.show',$request -> chambre_id )->with('success', 'Reservation created successfully.');
        }
        else{
        return redirect()->back()->with('success', 'date deja prise. veuillez choisir une autre date');
        }
    }

    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $request = Reservation::find($reservation);
        return view('reservation.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation = Reservation::find($reservation);
        $reservation->arrival_date = $request->arrival_date;
        $reservation->departure_date = $request->departure_date;
        $reservation->save();
        return redirect()->route('client.dashboard')->with('success', 'Reservation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation);
        $reservation->delete();
        return redirect()->route('client.dashboard')->with('success', 'Reservation deleted successfully.');
    }
}
